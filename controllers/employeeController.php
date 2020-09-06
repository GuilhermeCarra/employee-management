<?php
require_once LIBS . 'classes/controller.php';

class employeeController extends Controller {
   function __construct(){
      parent::__construct();
   }

   function getEmployeesCont() {

      $employees = $this->model->getEmployees();

      if($employees) require_once VIEWS . "employees/dashboard.php";

      return $employees;

   }

   function getEmployeeCont($request){
      $employee = $this->model->getEmployee($request["id"]);
      return $employee;
   }

   function addEmployeeAjax () {
      echo $this->model->addEmployee($_POST['newEmployee']);
   }

   function deleteEmployeeAjax () {
      parse_str(file_get_contents("php://input"), $_DELETE);
      $response = $this->model->deleteEmployee($_DELETE['deleteId']);
      echo $response;
   }

   function updateEmployeeCont() {
      $url = explode('/', $_GET['url']);
      $id = isset($url[2]) ? $url[2] : "";
      $_SESSION['response'] = $this->model->updateEmployee($id, $_REQUEST);
      header('Location: '.BASE_URL.'/employeeController/addEditEmployee');
   }

   function addEditEmployee(){
      $url = explode('/', $_GET['url']);
      $getId = isset($url[2]);
      $employee = false;
      if($getId){
         $employee = $this->model->getEmployee($url[2]);
      }
      require_once VIEWS . "employees/employee.php";
   }
}
?>