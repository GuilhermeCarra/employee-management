
<?php
session_start();
include_once "config/constants.php";
require_once "libs/sessionHelper.php";


if (isset($_REQUEST["controller"])) {
   $controller = getControllerPath($_REQUEST["controller"]);
   if(!isset($_SESSION["logged"])){
      require_once(VIEWS . "main/main.php");
   }
   if (file_exists($controller)) {
      require_once $controller;
      if (function_exists($_REQUEST["action"])) {
         call_user_func($_REQUEST["action"], $_REQUEST);
      } else {
         call_user_func("error", "Action '" . $_REQUEST["action"] . "' not found");
      }
   } else {
        error("Controller '" . $_REQUEST['controller'] . "' not found!");
   }
} else {
   if(isset($_SESSION["logged"])){
      header("Location: index.php?controller=employee&action=getEmployeesCont");
   }else{
      require_once(VIEWS . "main/main.php");
   }

}
/**
 * Get absolute path of controller.
 * @param {String} $controller name of the controller
 * @return {String} Absolute path.
 */
function getControllerPath($controller)
{
   return CONTROLLERS . $controller . "Controller.php";
}

function error($errorMsg)
{
    require_once VIEWS . "error/error.php";
}

?> 