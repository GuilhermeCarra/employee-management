<?php

class App
{

    function __construct()
    {

        // Verify if user is not logged or a login form was not sent shows login page
        if (!isset($_SESSION["logged"]) && !isset($_POST['email'])) {
            require_once(VIEWS . "main/main.php");

            // If user is logged:
        } else {
            // Verify if a controller exists on URL, if there's no controller set controller to employee
            if (!isset($_GET['url'])) {
                header("Location: employeeController/getEmployeesCont");
            } else {
                // Divides url on a array to separate controller and action
                $url = $_GET['url'];
                $url = rtrim($url, '/');
                $url = explode('/', $url);
            }

            $controllerFile = CONTROLLERS . $url[0] . '.php';

            if (file_exists($controllerFile)) {

                // Require the controller file
                require_once $controllerFile;

                // Creating controller and model objects with URL information
                $controller = new $url[0];
                $controller->loadModel($url[0]);

                // Executing function action based on the URL
                if (isset($url[1])) {

                    if (method_exists($url[0], $url[1])) {
                        $controller->{$url[1]}();
                    } else {
                        $errorMsg = 'Method"' . $url[1] .  '" file does not exist';
                        require_once(VIEWS . "error/error.php");
                    }
                } else {
                    $errorMsg = 'Method"' . $url[1] .  '" file does not exist';
                    require_once(VIEWS . "error/error.php");
                    // Show error if requested function does not exist
                }
            } else {
                // Show error if requested controller does not exist
                $errorMsg = 'Controller "' . $url[0] .  '" file does not exist';
                require_once(VIEWS . "error/error.php");
            }
        }
    }
}
