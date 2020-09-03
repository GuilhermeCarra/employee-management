<?php
if (isset($_SESSION['logged'])) {
   if (((time() - $_SESSION['logTime']) > 600) || isset($_POST['logout'])) {
      header("Location: ". BASE_URL ."/loginController/logout/");
   }
}
