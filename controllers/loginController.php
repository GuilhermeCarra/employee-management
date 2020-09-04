<?php

require LIBS . 'classes/controller.php';

class loginController extends Controller {

   function __construct(){
      parent::__construct();
   }

   function loginValidation(){
      if($this->model->userLogin($_REQUEST)){
         header("Location: ../employeeController/getEmployeesCont/");
      }else{
         header("Location: ../index.php");
      }
   }

   function logout(){
      $this->model->userLogOut();
      header("Location: ../../");
   }
}

?>