<?php

class App {

    function __construct(){

        // Verify if user is not logged or a login form was not sent shows login page
        if(!isset($_SESSION["logged"]) && !isset($_POST['email'])){
            require_once(VIEWS . "main/main.php");

        // If user is logged:
        } else {
            // Verify if a controller exists on URL, if there's no controller, set controller to employee
            if (!isset($_GET['url'])) {
                header("Location: employeeController/getEmployeesCont");
            } else {
                $url = $_GET['url'];
                $url = rtrim($url, '/');
                $url = explode('/', $url);
            }

            $controllerFile = CONTROLLERS . $url[0] . '.php';

            if(file_exists($controllerFile)){
                require_once $controllerFile;
                $controller = new $url[0];
                $controller->loadModel($url[0]);

                if(isset($url[1])){
                    $controller->{$url[1]}();
                } else {

                }
            } else {
                $errorMsg = 'Controller "' . $url[0] .  '" file does not exist';
                require_once(VIEWS . "error/error.php");
            }
        }

    }

}

?>