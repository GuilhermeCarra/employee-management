<?php
require('loginManager.php');
session_start();

if(time() > $_SESSION['endTime']) {
    logOut("../");
}

?>