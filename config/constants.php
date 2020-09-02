<?php

// ROOT
define("BASE_PATH", getcwd());

//CONTROLLERS
define("CONTROLLERS", BASE_PATH . '/controllers/');

//VIEWS
define("VIEWS", BASE_PATH . '/views/');

//MODELS
define("MODELS", BASE_PATH . '/models/');

//RESOURCES
define("RESOURCES", BASE_PATH . '/resources/');

//LIBS
define("LIBS", BASE_PATH . '/libs/');

//BASE URL -> FOR LINK CSS
$uri = $_SERVER['REQUEST_URI'];
if(isset($uri) && $uri !== null){
    $uri = substr($uri, 1);
    $uri = explode('/', $uri);
    $uri = "http://$_SERVER[HTTP_HOST]" . "/" . $uri[0];
}else{
    $uri = null;
}
define("BASE_URL", $uri);
//CSS
define('CSS', BASE_URL . '/assets/css');