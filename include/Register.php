<?php

if(isset($_POST['submit'])) {
    $error = false;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Bitte eine gültige E-Mail-Adresse eingeben';
        $error = true;
    }
    if(strlen($password) == 0) {
        $_SESSION['error'] = 'Bitte ein Passwort angeben';
        $error = true;
    }
    if($password != $password2) {
        $_SESSION['error'] = 'Die Passwörter müssen übereinstimmen';
        $error = true;
    }

    if(!$error) {
        $result = $db_panel->getLogin($email);
        if($result != null) {
            $_SESSION['error'] = 'Diese E-Mail-Adresse ist bereits vergeben';
            $error = true;
        }
    }

    if(!$error) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $result = $db_panel->setLogin($email, $username, $password_hash);

        if($result) {
            echo 'Du wurdest erfolgreich registriert<br>';
            header('location: index.php?site=login');
        } else {
            $_SESSION['error'] = 'Beim Abspeichern ist leider ein Fehler aufgetreten';
            $error = true;
        }
    }
}