<?php

namespace App\FrontModule\Presenters;

use Nette,
	App,
	App\Model,
	App\FrontModule\Components,
	Cardbook,
	WebLoader;


abstract class BasePresenter extends Nette\Application\UI\Presenter
{


    /** @inject @var Nette\Database\Context */
    public $database;     

    /** @inject @var Cardbook\Helpers\Helpers */
    public $helpers;



    public function startup()
    {
    	parent::startup();

    }


	protected function createTemplate($class = NULL)
	{
	    $template = parent::createTemplate($class);
	    $template->registerHelperLoader(array($this->helpers, 'loader'));
	    return $template;
	}


	public function createComponentBreadCrumbs()
	{
	    return new Components\BreadCrumbs;
	}

	public function createComponentCss() {
		$files = new WebLoader\FileCollection(WWW_DIR . '/assets/css');
		$files->addFiles(array(
			'bootstrap.css',
			'bootstrap-theme.css',
			));
		$compiler = WebLoader\Compiler::createCssCompiler($files, WWW_DIR . '/cache/css');
		$compiler->addFilter(function ($code) {
			return \CssMin::minify($code);
		});
		return new WebLoader\Nette\CssLoader($compiler, $this->template->basePath . '/cache/css');
	}



	public function createComponentJs() {
		$files = new WebLoader\FileCollection(WWW_DIR . '/assets/js');
		$files->addFiles(array(
            'head.min.js',
            'jquery-1.9.1.min.js',
			'nette.ajax.js',
			'netteForms.js',
			'bootstrap.min.js',
			'all.js',
			));
		$compiler = WebLoader\Compiler::createJsCompiler($files, WWW_DIR . '/cache/js');
		$compiler->addFilter(function ($code) {
			return \JSMin::minify($code);
		});
		return new Webloader\Nette\JavaScriptLoader($compiler, $this->template->basePath . '/cache/js');
	}


	public function beforeRender()
	{

	}






}
