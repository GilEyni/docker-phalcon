<?php
//phpinfo();

use Phalcon\Loader;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Url;
use Phalcon\Mvc\Application;
use Phalcon\Db\Adapter\Pdo\Mysql;

// Define some absolute path constants to aid in locating resources
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

// Register an autoloader
$loader = new Loader();

$loader->registerDirs(
    [
        APP_PATH . '/controllers/',
        APP_PATH . '/models/',
    ]
);

$loader->register();

// Create a DI
$container = new FactoryDefault();

$container->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . '/views/');

        return $view;
    }
);

$container->set(
    'url',
    function () {
        $url = new Url();
        $url->setBaseUri('/');

        return $url;
    }
);

$container->set(
    'db',
    function () {
		
		// Load env.ini file
		$env = new \Phalcon\Config\Adapter\Ini(BASE_PATH.'/env.ini');
		
        return new Mysql(
            [
                'host'     => $env->mysql->host,
                'username' => $env->mysql->username,
                'password' => $env->mysql->password,
                'dbname'   => $env->mysql->schema,
            ]
        );
    }
);

$application = new Application($container);

try{
	// Handle the request
	$response = $application->handle(
		$_SERVER["REQUEST_URI"]
	);

	$response->send();
} catch (\Exception $e){
		echo 'Exception: ', $e->getMessage();
}