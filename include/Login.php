<?php

if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $_SESSION['error'] = 'Email oder Passwort falsch';
    }
    else
    {
        $email=$_POST['email'];
        $password=$_POST['password'];

        $result = $db_panel->getLogin($email);

        if ($result != null && password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id']; // Initializing Session

            if(isset($_POST['save'])) {
                $identifier = random_string();
                $securitytoken = random_string();

                $db_panel->setToken($result['id'], $identifier, sha1($securitytoken));
                setcookie("identifier",$identifier,time()+(3600*24*365)); //Valid for 1 year
                setcookie("securitytoken",$securitytoken,time()+(3600*24*365)); //Valid for 1 year
            }

            header("location: " . ROOT_PATH . "index.php"); // Redirecting To Other Page
        } else {
            $_SESSION['error'] = 'Email oder Passwort falsch';
        }
    }
}
