<?php

namespace App;

use Nette,
	Nette\Application\Routers\RouteList,
	Nette\Application\Routers\Route,
	Nette\Application\Routers\SimpleRouter;


/**
 * Router factory.
 */
class RouterFactory
{
	
    public $database; 


    public function __construct(Nette\Database\Context $database)
    {
    	$this->database = $database;
    }

	/**
	 * @return \Nette\Application\IRouter
	 */
	public function createRouter()
	{
		$router = new RouteList();


		$router[] = $adminRouter = new RouteList('Admin');
		$adminRouter[] = new Route('admin/<presenter>/<action>[/<id>]', 'Default:default');		

		$router[] = $serviceRouter = new RouteList('Service');
		$serviceRouter[] = new Route('service/<presenter>/<action>[/<id>]', 'Default:default');

		$router[] = $frontRouter = new RouteList('Front');
		$frontRouter[] = new Route('storage/images/<folder>/<src>.<ext>', 'ImageResize:default');


		//$frontRouter[] = new Route('<action>', 'Page:default');
		$frontRouter[] = new Route('<presenter>[/<action>][/<id>]', 'Competition:default');
		
		return $router;
	}

}




function filterInFunc()
{
	return NULL;
}

function filterOutFunc()
{
	return NULL;
}