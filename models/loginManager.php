<?php

require_once LIBS . 'classes/model.php';

class loginModel extends Model {

   function __construct(){
         parent::__construct();
   }

   function userLogin($request) {
      $email = $request["email"];
      $pwd = $request["pwd"];

      require_once 'libs/database.php';

      $conn = connectDatabase();
      $query = "SELECT * FROM user WHERE email='$email' LIMIT 1;";
      $stmt = $conn->prepare($query);
      $stmt->execute();

      if ($stmt->rowCount()) {
         $result = $stmt->fetch(PDO::FETCH_OBJ);
         if (password_verify($pwd, $result->password)) {
            $_SESSION['logged'] = true;
            $_SESSION['userId'] = $user->userId;
            $_SESSION['username'] = $user->name;
            $_SESSION['email'] = $user->email;
            $_SESSION['logTime'] = time();
            return true;
         } else {
            $_SESSION['wrong-pwd'] = true;
            if (isset($_SESSION['wrong-email'])) unset($_SESSION['wrong-email']);
            return false;
         }
      } else {
         $_SESSION['wrong-email'] = true;
         if (isset($_SESSION['wrong-pwd'])) unset($_SESSION['wrong-pwd']);
         return false;
      }
   }

   function userLogOut() {
      session_destroy();
      session_unset();
   }
}