<?php

define(WWW_DIR, __DIR__ . '/../www');

require __DIR__ . '/../vendor/autoload.php';

$configurator = new Nette\Configurator;



//$configurator->setDebugMode(array('78.45.105.29', '127.0.0.1'));  // debug mode MUST NOT be enabled on production server
$configurator->enableDebugger(__DIR__ . '/../log', "admin@rjwebdesign.cz");

$configurator->setDebugMode(TRUE);	
$configurator->setTempDirectory(__DIR__ . '/../temp');

$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->addDirectory(__DIR__ . '/../libs')
	->register();


$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->addConfig(__DIR__ . '/config/config.local.neon');

$container = $configurator->createContainer();

return $container;
