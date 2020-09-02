<?php

require LIBS . 'classes/controller.php';
require MODELS . 'loginManager.php';

class loginController extends Controller {

   function __construct(){
      parent::__construct();
   }

   function loginValidation(){
      if(userLogin($_REQUEST)){
         header("Location: ../employeeController/getEmployeesCont/");
      }else{
         header("Location: ../index.php");
      }
   }

   function logout(){
      userLogOut();
      header("Location: ../../");
   }
}


?>