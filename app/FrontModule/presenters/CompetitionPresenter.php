<?php

namespace App\FrontModule\Presenters;

use Nette,
	App,
	App\Model,
	App\FrontModule\Components,
	Nette\Forms\Controls;

class CompetitionPresenter extends BasePresenter
{

	protected $model;
	protected $modelTable;
	protected $modelResult;



	/** @var Components\MatchResultFactory @inject */
	public $matchResultFactory;

	// protected function createComponentMatchResult()
	// {
	//     return $this->matchResultFactory->create();
	// }


	public function inject(Model\Competition $model, Model\Table $modelTable, Model\Result $modelResult)
	{
		$this->model       = $model;
		$this->modelTable  = $modelTable;
		$this->modelResult = $modelResult;
	}

	public function beforeRender()
	{
		$this->template->competitions = $this->database->table('competition_season');
	}

	
	public function renderDefault()
	{
	}	



	protected function createComponentTestForm()
	{
		

	    return new Nette\Application\UI\Multiplier(function ($itemId) {
	        $form = new Nette\Application\UI\Form;
	        $form->addText('zapas', 'Zápas')->setValue($itemId);

	        $form->addSubmit('send', 'Odeslat');
	        return $form;
	    });
	}


	public function renderDetail($id)
	{
		// info o soutezi
		$this->template->competition_season = $this->database->table('competition_season')
															 ->where('id', $id)->fetch();
		
		$this->template->stageList = $this->model->getStages(
			$this->template->competition_season->competition_id, 
			$this->template->competition_season->season_id
		);
	}


	protected function createComponentResults()
	{

		$control = new Components\Results($this->database, $this->modelResult, $this->matchResultFactory);
		//$control->addComponent($this->matchResultFactory->create(), 'matchResult');
		return $control;
	}	


	protected function createComponentTables()
	{

		$control = new Components\Tables($this->database, $this->modelTable);
		return $control;
	}	




	protected function createComponentEditForm()
	{
		
			$form = new Nette\Application\UI\Form;
			$form->addText('goal_home_90', 'Góly domácí po 90 min.');
			
			$form->addText('goal_away_90', 'Góly hosté po 90 min.');
			$form->addText('goal_home_et', 'Góly domácí ET');
			$form->addText('goal_away_et', 'Góly hosté ET');
			
			$form->addText('goal_home_penalty', 'Góly domácí penalty');
			$form->addText('goal_away_penalty', 'Góly hosté penalty');

			$form->addCheckbox('played', 'Odehráno');
			$form->addHidden('id');
		
			$form->addSubmit('btn', 'Uložit');

			$form->onSuccess[] = $this->submitEditForm;


			$renderer = $form->getRenderer();
			$renderer->wrappers['controls']['container'] = NULL;
			$renderer->wrappers['pair']['container'] = 'div class=form-group';
			$renderer->wrappers['pair']['.error'] = 'has-error';
			$renderer->wrappers['control']['container'] = 'div class=col-sm-9';
			$renderer->wrappers['label']['container'] = 'div class="col-sm-3 control-label"';
			$renderer->wrappers['control']['description'] = 'span class=help-block';
			$renderer->wrappers['control']['errorcontainer'] = 'span class=help-block';
			// make form and controls compatible with Twitter Bootstrap
			$form->getElementPrototype()->class('form-horizontal');
			foreach ($form->getControls() as $control) {
				if ($control instanceof Controls\Button) {
					$control->getControlPrototype()->addClass(empty($usedPrimary) ? 'btn btn-primary' : 'btn btn-default');
					$usedPrimary = TRUE;
				} elseif ($control instanceof Controls\TextBase || $control instanceof Controls\SelectBox || $control instanceof Controls\MultiSelectBox) {
					$control->getControlPrototype()->addClass('form-control');
				} elseif ($control instanceof Controls\Checkbox || $control instanceof Controls\CheckboxList || $control instanceof Controls\RadioList) {
					$control->getSeparatorPrototype()->setName('div')->addClass($control->getControlPrototype()->type);
				}
			}


			return $form;
	}		

	public function submitEditForm($form)
	{
		$id     = (int) $this->getParameter('id');
		$values = $form->getValues();
		$match  = $this->database->table('match')->where('id', $id)->fetch();
		$match->update($values);

		//\Nette\Diagnostics\Debugger::barDump($values);

		$this->redirect("Competition:detail#stage-$match->stage_list_id", $match->competition_id);
	}


	public function actionEditMatch($id)
	{
		$this->template->match = $this->database->table('match')->where('id', $id)->fetch();
		
		$form = $this['editForm'];

		if (!$form->isSubmitted()) 
		{

			$defaults = $this->database->table('match')->where('id', $id)->fetch();
			$form->setDefaults($defaults);
		}


	}

}
