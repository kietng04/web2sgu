<?php

require_once('./Backend/DB_driver.php');


	if (isset($_GET['controller'])) {

		$controller = $_GET['controller'];

		if (isset($_GET['action'])) {
			$action = $_GET['action'];
		} else {
			$action = 'index';
		}
	} else {
		$controller = 'ProductsController';
		$action = 'index';
	}
//  else {
// 	$controller = 'ProductsController';
// 	$action = 'index';pz
// }
require_once('routes.php');


// hahahahhahahaahhahahahahahahhaha
//hello my name is kiet dep trai 
// kiet hoc git 