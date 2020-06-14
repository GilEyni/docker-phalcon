<?php

use Phalcon\Mvc\Controller;

class InitController extends Controller {
    
	public function indexAction() {
				
		echo 'Alive';
    }
	
	public function schemaAction(){
		
		$env = new \Phalcon\Config\Adapter\Ini(BASE_PATH.'/env.ini');
		
		$db = new PDO('mysql:host=' . $env->mysql->host, $env->mysql->username, $env->mysql->password);
		$db->query('CREATE DATABASE IF NOT EXISTS tutorial');
		
		$db->query('CREATE TABLE IF NOT EXISTS tutorial.`users` (
					`id`    int(10)     unsigned NOT NULL AUTO_INCREMENT,
					`name`  varchar(70)          NOT NULL,
					`email` varchar(70)          NOT NULL,
					PRIMARY KEY (`id`))'
		);

		echo 'tutorial schema & users table created';
	}
}