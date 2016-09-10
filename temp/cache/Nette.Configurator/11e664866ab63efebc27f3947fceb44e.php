<?php
// source: C:\wamp64\www\private\w-e-b-s\2014\Soccer\app/config/config.neon 
// source: C:\wamp64\www\private\w-e-b-s\2014\Soccer\app/config/config.local.neon 

/**
 * @property Nette\Application\Application $application
 * @property App\Model\UserManager $authenticator
 * @property Nette\Security\IAuthorizator $authorizator
 * @property Nette\Caching\Storages\FileStorage $cacheStorage
 * @property Nette\DI\Container $container
 * @property Nette\Http\Request $httpRequest
 * @property Nette\Http\Response $httpResponse
 * @property Nette\Bridges\Framework\NetteAccessor $nette
 * @property Nette\Application\IRouter $router
 * @property Nette\Http\Session $session
 * @property Nette\Security\User $user
 */
class SystemContainer extends Nette\DI\Container
{

	protected $meta = array(
		'types' => array(
			'nette\\object' => array(
				'nette',
				'nette.cacheJournal',
				'cacheStorage',
				'nette.httpRequestFactory',
				'httpRequest',
				'httpResponse',
				'nette.httpContext',
				'session',
				'nette.userStorage',
				'user',
				'application',
				'nette.presenterFactory',
				'nette.mailer',
				'nette.templateFactory',
				'database.default',
				'database.default.context',
				'25_App_Model_Competition',
				'26_App_Model_Result',
				'27_App_Model_Table',
				'authenticator',
				'container',
			),
			'nette\\bridges\\framework\\netteaccessor' => array('nette'),
			'nette\\caching\\storages\\ijournal' => array('nette.cacheJournal'),
			'nette\\caching\\storages\\filejournal' => array('nette.cacheJournal'),
			'nette\\caching\\istorage' => array('cacheStorage'),
			'nette\\caching\\storages\\filestorage' => array('cacheStorage'),
			'nette\\http\\requestfactory' => array('nette.httpRequestFactory'),
			'nette\\http\\irequest' => array('httpRequest'),
			'nette\\http\\request' => array('httpRequest'),
			'nette\\http\\iresponse' => array('httpResponse'),
			'nette\\http\\response' => array('httpResponse'),
			'nette\\http\\context' => array('nette.httpContext'),
			'nette\\http\\session' => array('session'),
			'nette\\security\\iuserstorage' => array('nette.userStorage'),
			'nette\\http\\userstorage' => array('nette.userStorage'),
			'nette\\security\\user' => array('user'),
			'nette\\application\\application' => array('application'),
			'nette\\application\\ipresenterfactory' => array('nette.presenterFactory'),
			'nette\\application\\presenterfactory' => array('nette.presenterFactory'),
			'nette\\application\\irouter' => array('router'),
			'nette\\mail\\imailer' => array('nette.mailer'),
			'nette\\mail\\sendmailmailer' => array('nette.mailer'),
			'nette\\bridges\\applicationlatte\\ilattefactory' => array('nette.latteFactory'),
			'nette\\application\\ui\\itemplatefactory' => array('nette.templateFactory'),
			'nette\\bridges\\applicationlatte\\templatefactory' => array('nette.templateFactory'),
			'nette\\database\\connection' => array('database.default'),
			'nette\\database\\context' => array('database.default.context'),
			'nette\\security\\iauthorizator' => array('authorizator'),
			'app\\aclfactory' => array('23_App_AclFactory'),
			'app\\frontmodule\\components\\matchresultfactory' => array(
				'24_App_FrontModule_Components_MatchResultFactory',
			),
			'app\\model\\basemodel' => array(
				'25_App_Model_Competition',
				'26_App_Model_Result',
				'27_App_Model_Table',
			),
			'app\\model\\competition' => array('25_App_Model_Competition'),
			'app\\model\\result' => array('26_App_Model_Result'),
			'app\\model\\table' => array('27_App_Model_Table'),
			'nette\\security\\iauthenticator' => array('authenticator'),
			'app\\model\\usermanager' => array('authenticator'),
			'app\\routerfactory' => array('29_App_RouterFactory'),
			'cardbook\\helpers\\helpers' => array('30_Cardbook_Helpers_Helpers'),
			'nette\\di\\container' => array('container'),
		),
	);


	public function __construct()
	{
		parent::__construct(array(
			'appDir' => 'C:\\wamp64\\www\\private\\w-e-b-s\\2014\\Soccer\\app',
			'wwwDir' => 'C:\\wamp64\\www\\private\\w-e-b-s\\2014\\Soccer\\www',
			'debugMode' => TRUE,
			'productionMode' => FALSE,
			'environment' => 'development',
			'consoleMode' => FALSE,
			'container' => array(
				'class' => 'SystemContainer',
				'parent' => 'Nette\\DI\\Container',
				'accessors' => TRUE,
			),
			'tempDir' => 'C:\\wamp64\\www\\private\\w-e-b-s\\2014\\Soccer\\app/../temp',
		));
	}


	/**
	 * @return App\AclFactory
	 */
	public function createService__23_App_AclFactory()
	{
		$service = new App\AclFactory;
		return $service;
	}


	/**
	 * @return App\FrontModule\Components\MatchResultFactory
	 */
	public function createService__24_App_FrontModule_Components_MatchResultFactory()
	{
		return new SystemContainer_App_FrontModule_Components_MatchResultFactoryImpl_24_App_FrontModule_Components_MatchResultFactory($this);
	}


	/**
	 * @return App\Model\Competition
	 */
	public function createService__25_App_Model_Competition()
	{
		$service = new App\Model\Competition($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\Result
	 */
	public function createService__26_App_Model_Result()
	{
		$service = new App\Model\Result($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\Table
	 */
	public function createService__27_App_Model_Table()
	{
		$service = new App\Model\Table($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\RouterFactory
	 */
	public function createService__29_App_RouterFactory()
	{
		$service = new App\RouterFactory($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return Cardbook\Helpers\Helpers
	 */
	public function createService__30_Cardbook_Helpers_Helpers()
	{
		$service = new Cardbook\Helpers\Helpers;
		return $service;
	}


	/**
	 * @return Nette\Application\Application
	 */
	public function createServiceApplication()
	{
		$service = new Nette\Application\Application($this->getService('nette.presenterFactory'), $this->getService('router'), $this->getService('httpRequest'), $this->getService('httpResponse'));
		$service->catchExceptions = FALSE;
		$service->errorPresenter = 'Front:Error';
		Nette\Bridges\ApplicationTracy\RoutingPanel::initializePanel($service);
		Tracy\Debugger::getBar()->addPanel(new Nette\Bridges\ApplicationTracy\RoutingPanel($this->getService('router'), $this->getService('httpRequest'), $this->getService('nette.presenterFactory')));
		return $service;
	}


	/**
	 * @return App\Model\UserManager
	 */
	public function createServiceAuthenticator()
	{
		$service = new App\Model\UserManager($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return Nette\Security\IAuthorizator
	 */
	public function createServiceAuthorizator()
	{
		$service = $this->getService('23_App_AclFactory')->createAcl();
		if (!$service instanceof Nette\Security\IAuthorizator) {
			throw new Nette\UnexpectedValueException('Unable to create service \'authorizator\', value returned by factory is not Nette\\Security\\IAuthorizator type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\FileStorage
	 */
	public function createServiceCacheStorage()
	{
		$service = new Nette\Caching\Storages\FileStorage('C:\\wamp64\\www\\private\\w-e-b-s\\2014\\Soccer\\app/../temp/cache', $this->getService('nette.cacheJournal'));
		return $service;
	}


	/**
	 * @return Nette\DI\Container
	 */
	public function createServiceContainer()
	{
		return $this;
	}


	/**
	 * @return Nette\Database\Connection
	 */
	public function createServiceDatabase__default()
	{
		$service = new Nette\Database\Connection('mysql:host=localhost;dbname=soccer', 'root', NULL, array('lazy' => TRUE));
		Tracy\Debugger::getBlueScreen()->addPanel('Nette\\Bridges\\DatabaseTracy\\ConnectionPanel::renderException');
		Nette\Database\Helpers::createDebugPanel($service, TRUE, 'default');
		return $service;
	}


	/**
	 * @return Nette\Database\Context
	 */
	public function createServiceDatabase__default__context()
	{
		$service = new Nette\Database\Context($this->getService('database.default'), new Nette\Database\Reflection\ConventionalReflection, $this->getService('cacheStorage'));
		return $service;
	}


	/**
	 * @return Nette\Http\Request
	 */
	public function createServiceHttpRequest()
	{
		$service = $this->getService('nette.httpRequestFactory')->createHttpRequest();
		if (!$service instanceof Nette\Http\Request) {
			throw new Nette\UnexpectedValueException('Unable to create service \'httpRequest\', value returned by factory is not Nette\\Http\\Request type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Http\Response
	 */
	public function createServiceHttpResponse()
	{
		$service = new Nette\Http\Response;
		return $service;
	}


	/**
	 * @return Nette\Bridges\Framework\NetteAccessor
	 */
	public function createServiceNette()
	{
		$service = new Nette\Bridges\Framework\NetteAccessor($this);
		return $service;
	}


	/**
	 * @return Nette\Caching\Cache
	 */
	public function createServiceNette__cache($namespace = NULL)
	{
		$service = new Nette\Caching\Cache($this->getService('cacheStorage'), $namespace);
		trigger_error('Service cache is deprecated.', 16384);
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\FileJournal
	 */
	public function createServiceNette__cacheJournal()
	{
		$service = new Nette\Caching\Storages\FileJournal('C:\\wamp64\\www\\private\\w-e-b-s\\2014\\Soccer\\app/../temp');
		return $service;
	}


	/**
	 * @return Nette\Http\Context
	 */
	public function createServiceNette__httpContext()
	{
		$service = new Nette\Http\Context($this->getService('httpRequest'), $this->getService('httpResponse'));
		return $service;
	}


	/**
	 * @return Nette\Http\RequestFactory
	 */
	public function createServiceNette__httpRequestFactory()
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy(array());
		return $service;
	}


	/**
	 * @return Latte\Engine
	 */
	public function createServiceNette__latte()
	{
		$service = new Latte\Engine;
		$service->setTempDirectory('C:\\wamp64\\www\\private\\w-e-b-s\\2014\\Soccer\\app/../temp/cache/latte');
		$service->setAutoRefresh(TRUE);
		$service->setContentType('html');
		return $service;
	}


	/**
	 * @return Nette\Bridges\ApplicationLatte\ILatteFactory
	 */
	public function createServiceNette__latteFactory()
	{
		return new SystemContainer_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_nette_latteFactory($this);
	}


	/**
	 * @return Nette\Mail\SendmailMailer
	 */
	public function createServiceNette__mailer()
	{
		$service = new Nette\Mail\SendmailMailer;
		return $service;
	}


	/**
	 * @return Nette\Application\PresenterFactory
	 */
	public function createServiceNette__presenterFactory()
	{
		$service = new Nette\Application\PresenterFactory('C:\\wamp64\\www\\private\\w-e-b-s\\2014\\Soccer\\app', $this);
		$service->setMapping(array(
			'*' => 'App\\*Module\\Presenters\\*Presenter',
		));
		return $service;
	}


	/**
	 * @return Nette\Templating\FileTemplate
	 */
	public function createServiceNette__template()
	{
		$service = new Nette\Templating\FileTemplate;
		$service->registerFilter($this->getService('nette.latteFactory')->create());
		$service->registerHelperLoader('Nette\\Templating\\Helpers::loader');
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\PhpFileStorage
	 */
	public function createServiceNette__templateCacheStorage()
	{
		$service = new Nette\Caching\Storages\PhpFileStorage('C:\\wamp64\\www\\private\\w-e-b-s\\2014\\Soccer\\app/../temp/cache', $this->getService('nette.cacheJournal'));
		trigger_error('Service templateCacheStorage is deprecated.', 16384);
		return $service;
	}


	/**
	 * @return Nette\Bridges\ApplicationLatte\TemplateFactory
	 */
	public function createServiceNette__templateFactory()
	{
		$service = new Nette\Bridges\ApplicationLatte\TemplateFactory($this->getService('nette.latteFactory'), $this->getService('httpRequest'), $this->getService('httpResponse'), $this->getService('user'), $this->getService('cacheStorage'));
		return $service;
	}


	/**
	 * @return Nette\Http\UserStorage
	 */
	public function createServiceNette__userStorage()
	{
		$service = new Nette\Http\UserStorage($this->getService('session'));
		return $service;
	}


	/**
	 * @return Nette\Application\IRouter
	 */
	public function createServiceRouter()
	{
		$service = $this->getService('29_App_RouterFactory')->createRouter();
		if (!$service instanceof Nette\Application\IRouter) {
			throw new Nette\UnexpectedValueException('Unable to create service \'router\', value returned by factory is not Nette\\Application\\IRouter type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Http\Session
	 */
	public function createServiceSession()
	{
		$service = new Nette\Http\Session($this->getService('httpRequest'), $this->getService('httpResponse'));
		$service->setExpiration('7 day');
		$service->setOptions(array(
			'save_path' => 'C:\\wamp64\\www\\private\\w-e-b-s\\2014\\Soccer\\app/../temp/sessions',
		));
		return $service;
	}


	/**
	 * @return Nette\Security\User
	 */
	public function createServiceUser()
	{
		$service = new Nette\Security\User($this->getService('nette.userStorage'), $this->getService('authenticator'), $this->getService('authorizator'));
		Tracy\Debugger::getBar()->addPanel(new Nette\Bridges\SecurityTracy\UserPanel($service));
		return $service;
	}


	public function initialize()
	{
		date_default_timezone_set('Europe/Prague');
		Nette\Bridges\Framework\TracyBridge::initialize();
		Nette\Caching\Storages\FileStorage::$useDirectories = TRUE;
		$this->getByType("Nette\Http\Session")->exists() && $this->getByType("Nette\Http\Session")->start();
		header('X-Frame-Options: SAMEORIGIN');
		header('X-Powered-By: Nette Framework');
		header('Content-Type: text/html; charset=utf-8');
		Nette\Utils\SafeStream::register();
		Nette\Reflection\AnnotationsParser::setCacheStorage($this->getByType("Nette\Caching\IStorage"));
		Nette\Reflection\AnnotationsParser::$autoRefresh = TRUE;
	}

}



final class SystemContainer_App_FrontModule_Components_MatchResultFactoryImpl_24_App_FrontModule_Components_MatchResultFactory implements App\FrontModule\Components\MatchResultFactory
{

	private $container;


	public function __construct(Nette\DI\Container $container)
	{
		$this->container = $container;
	}


	public function create()
	{
		$service = new App\FrontModule\Components\MatchResult;
		return $service;
	}

}



final class SystemContainer_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_nette_latteFactory implements Nette\Bridges\ApplicationLatte\ILatteFactory
{

	private $container;


	public function __construct(Nette\DI\Container $container)
	{
		$this->container = $container;
	}


	public function create()
	{
		$service = new Latte\Engine;
		$service->setTempDirectory('C:\\wamp64\\www\\private\\w-e-b-s\\2014\\Soccer\\app/../temp/cache/latte');
		$service->setAutoRefresh(TRUE);
		$service->setContentType('html');
		return $service;
	}

}
