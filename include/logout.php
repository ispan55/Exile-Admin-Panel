<?php
session_start();
session_destroy();
unset($_SESSION['user_id']);
//Remove Cookies
setcookie("identifier","",time()-(3600*24*365));
setcookie("securitytoken","",time()-(3600*24*365));

require_once('class/functions.php');
?>

    <div class="container main-container">
        Der Logout war erfolgreich. <a href="../sites/dashboard.php">Zurück zum Login</a>.
    </div>