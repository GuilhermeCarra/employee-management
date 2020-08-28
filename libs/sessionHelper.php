<?php
if (isset($_SESSION['logged'])) {
   if (((time() - $_SESSION['logTime']) > 600) || isset($_POST['logout'])) {
      require_once getControllerPath("login");
      logout();
   }
}
