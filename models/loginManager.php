<?php

function login()
{
    function getUser($users, $email)
    {
        foreach ($users as $user) {
            if ($email === $user->email) return $user;
        }
        return false;
    }

    session_start();

    $users = json_decode(file_get_contents('resources/users.json'))->users;
    $user = getUser($users, $_REQUEST['email']);

    if (!$user) {
        $_SESSION['error'] = 'email';
        header("Location: index.php");
        return;
    }

    if (!password_verify($_REQUEST['password'], $user->password)) {
        $_SESSION['error'] = 'password';
        header("Location: index.php");
        return;
    }

    $_SESSION['name'] = $user->name;
    $_SESSION['id'] = $user->userId;
    $_SESSION['endTime'] = time() + 600;
    header("Location: index.php?controller=employee&action=getEmployees");
}


function logout()
{
    session_start();
    session_destroy();
    session_unset();
    header("Location: index.php");
}
