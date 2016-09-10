<?

namespace App\FrontModule\Components;

use Nette\Application\UI,
	Nette,
	App;

class Tables extends UI\Control 
{

	protected $database;
	protected $model;

	public function __construct (Nette\Database\Context $database, App\Model\Table $model)
	{
		$this->database = $database;
		$this->model = $model;

		parent::__construct();
	}


	public function render($stageId) 
	{
		
		$this->template->rows = $this->model->recount($stageId);
		$this->template->setFile(__DIR__ . '/../templates/components/Tables/table.latte');
		$this->template->render();
	}	



}