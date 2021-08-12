
<?php

	//.htaccess is used to redirect all the urls to index.php

	require_once "controllers/StringController.php";
	$default = 'string' . '/' . 'index';

	//Explode the url and get controller & function from the format: BASE_URL /CONTROLLER_NAME/METHOD_NAME

	// For Simplicity Parameters in functions are ignored for now

	$url = isset($_GET['url']) ? $_GET['url'] : $default;
	$url = rtrim($url, '/');
	$url = explode('/', $url);

	$control = $url[0].'Controller';
	if(!class_exists($control)){
		print_r("Class Not Found");
		exit(0);
	}
	else{
		$controller = new $control();
		$method = $url[1].'Action';
		if(!method_exists($controller, $method)){
			print_r("Method Not Found");
			exit(0);
		}
		else{
			//var_dump($_POST);

			//If such controller & function exists then call the specific method of the specific function in our case, it is the explode function of String Controller
			$controller->$method();
		}
	}
