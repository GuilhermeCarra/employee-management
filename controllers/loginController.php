<?php

require MODELS . 'loginManager.php';

function loginValidation($request){
   if(userLogin($request)){
      header("Location: index.php?controller=employee&action=getEmployeesCont");
   }else{
      header("Location: index.php");
   }
}

function logout(){
   userLogOut();
   header("Location: index.php");
}