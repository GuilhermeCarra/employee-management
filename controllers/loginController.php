<?php

include_once MODELS . 'loginManager.php';

if (isset($_REQUEST["action"])) {
    if (function_exists($_REQUEST["action"])) {
        call_user_func($_REQUEST["action"]);
    } else {
        $errorMsg = "The requested action does not exist";
        include_once VIEWS . "error.php";
    }
} else {
    $errorMsg = "The requested controller does not exist";
    include_once VIEWS . "error.php";
}
