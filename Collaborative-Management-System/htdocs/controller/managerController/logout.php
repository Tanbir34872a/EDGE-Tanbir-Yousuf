<?php
    session_start();
    unset($_SESSION['flag']);
    setcookie('username', $username, time()-10, '/');
    setcookie('password', $password, time()-10, '/');
    header('location: ../../view/login.php');
?>