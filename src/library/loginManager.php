<?php
    function validateLogin($email,$password) {
        $foundUser = false;
        $usersJSON = json_decode(file_get_contents('../../resources/users.json'));
        foreach($usersJSON->users as $user) {
            if ($user->email == $email && (password_verify($password, $user->password))){
                session_start();
                $_SESSION['name'] = $user->name;
                $_SESSION['id'] = $user->userId;
                $_SESSION['endTime'] = time()+600;
                $foundUser = true;
                return "success";
            }
        }
        if ($foundUser == false) {
            return "unauthorized";
        }
    }

    function logOut($location) {
        session_start();
        session_destroy();
        header('Location: '.$location);
    }
?>