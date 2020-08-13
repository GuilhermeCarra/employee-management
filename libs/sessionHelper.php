<?php

include_once MODELS . "loginManager.php";

session_start();

if (time() > $_SESSION['endTime']) {
    logOut("../");
}
