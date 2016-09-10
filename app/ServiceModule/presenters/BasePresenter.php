<?php

namespace App\ServiceModule\Presenters;

use Nette,
	Cardbook,
	App\Model;



abstract class BasePresenter extends Nette\Application\UI\Presenter
{


    /** @inject @var Nette\Database\Context */
    public $database;     

    /** @inject @var Cardbook\Helpers\Helpers */
    public $helpers;

}
