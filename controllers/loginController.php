<?php

require MODELS . 'loginManager.php';

if (isset($_REQUEST["action"]) && function_exists($_REQUEST["action"])) {
    call_user_func($_REQUEST["action"]);
}
