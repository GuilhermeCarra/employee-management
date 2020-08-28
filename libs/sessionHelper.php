<?php

include_once MODELS . "loginManager.php";

if (time() > $_SESSION['endTime']) logout();
