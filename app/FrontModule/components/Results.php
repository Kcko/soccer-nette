<?

namespace App\FrontModule\Components;

use Nette\Application\UI,
	Nette,
	App;

class Results extends UI\Control 
{

	protected $database;
	protected $modelResult;
	private $matchResultFactory;

	public function __construct (Nette\Database\Context $database, App\Model\Result $modelResult, App\FrontModule\Components\MatchResultFactory $matchResultFactory)
	{
		$this->database    = $database;
		$this->modelResult = $modelResult;
		$this->matchResultFactory = $matchResultFactory;
	
	}


	public function render($stageId) 
	{
		
		
		$this->template->setFile(__DIR__ . '/../templates/components/Results/list.latte');
		$this->template->stageId     = $stageId;
		$this->template->modelResult = $this->modelResult;
		$this->template->matches     = $this->database->table('match')->where('stage_list_id', $stageId)->order('id');



		foreach ($this->template->matches as $match)
		{
			$form = $this['editFormResults-'.$match->id];			
			$form->setDefaults($match);
		}


		$this->template->render();
	}	



	protected function createComponentMatchResult()
	{
	 	return $this->matchResultFactory->create();
	}



	protected function createComponentEditFormResults()
	{
		

		return new Nette\Application\UI\Multiplier(function ($itemId) {


			$form = new Nette\Application\UI\Form;
			$form->getElementPrototype()->class = 'ajax';

			$form->addText('goal_home_90', 'Góly domácí po 90 min.');
			
			$form->addText('goal_away_90', 'Góly hosté po 90 min.');
			$form->addText('goal_home_et', 'Góly domácí ET');
			$form->addText('goal_away_et', 'Góly hosté ET');
			
			$form->addText('goal_home_penalty', 'Góly domácí penalty');
			$form->addText('goal_away_penalty', 'Góly hosté penalty');

			$form->addCheckbox('played', 'Odehráno');
			$form->addHidden('id')->setValue($itemId);
		
			$form->addSubmit('btn', 'Uložit');

			$form->onSuccess[] = $this->submitEditForm;


			// $renderer = $form->getRenderer();
			// $renderer->wrappers['controls']['container'] = NULL;
			// $renderer->wrappers['pair']['container'] = 'div class=form-group';
			// $renderer->wrappers['pair']['.error'] = 'has-error';
			// $renderer->wrappers['control']['container'] = 'div class=col-sm-9';
			// $renderer->wrappers['label']['container'] = 'div class="col-sm-3 control-label"';
			// $renderer->wrappers['control']['description'] = 'span class=help-block';
			// $renderer->wrappers['control']['errorcontainer'] = 'span class=help-block';
			// // make form and controls compatible with Twitter Bootstrap
			// $form->getElementPrototype()->class('form-horizontal');
			// foreach ($form->getControls() as $control) {
			// 	if ($control instanceof Controls\Button) {
			// 		$control->getControlPrototype()->addClass(empty($usedPrimary) ? 'btn btn-primary' : 'btn btn-default');
			// 		$usedPrimary = TRUE;
			// 	} elseif ($control instanceof Controls\TextBase || $control instanceof Controls\SelectBox || $control instanceof Controls\MultiSelectBox) {
			// 		$control->getControlPrototype()->addClass('form-control');
			// 	} elseif ($control instanceof Controls\Checkbox || $control instanceof Controls\CheckboxList || $control instanceof Controls\RadioList) {
			// 		$control->getSeparatorPrototype()->setName('div')->addClass($control->getControlPrototype()->type);
			// 	}
			// }


			return $form;

		});
	}

	public function submitEditForm($form)
	{
		$values = $form->getValues();
		$id     = $values['id'];
		$match  = $this->database->table('match')->where('id', $id)->fetch();
		$match->update($values);

		$this->presenter->payload->message = 'Success';
		$this->presenter->redrawControl('competition');

		
		//$this->presenter->redirect("Competition:detail#match-$match->id", $match->competition_id);
	}



}