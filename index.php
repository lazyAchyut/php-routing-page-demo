<?php

// i have redirected all the url request to this page using .htaccess file.

// Valid url:>>>>>>>>>>   http://localhost/php-routing-page-demo/ram/shyam

	//get requested url	
	$url = $_SERVER['REQUEST_URI'];

	//parse the url using spliting delimmiter '/'
	$urlParse = explode("/", $url);

	//get class and method from url
	//here i have assume url structure as http://localhost/php-routing-page-demo/ram/shyam
	//accordingly class and method names are mapped
	$class =  $urlParse[2]; 
	$method = $urlParse[3];

	//convert class name to camel case as convention of class name camel case
	$class = ucwords($class);

	//include class
	// need to handle exception in better way
	require $class . '.php';
	
	//check wheather class exists or not
	if(!class_exists($class))
		die("Class " . $class . " does not exist.");

	//create class 
	$obj = new $class;


	if(!method_exists($obj,$method))
 		die("Method " . $method . "() doesnot exist.");

	//call method of class
	$obj->$method();

?>