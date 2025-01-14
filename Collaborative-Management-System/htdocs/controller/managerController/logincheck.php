<?php
require_once('../../model/managerModel/usermodel.php');
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "" || $password == "") {
        echo "null username or password!";
    } elseif (isset($_POST['rememberMe'])) {
        setcookie('username', $username, time() + 200 , '/');
        setcookie('password', $password, time() + 200, '/');
    }

    $user = ['username' => $username];
    $status = login($username, $password);

    if ($status) {
        $_SESSION['user'] = $user;
        $_SESSION['flag'] = 'true';
        header('location: ../../view/managerView/managerDashboard.php');
        exit(); // Make sure to exit after redirection
    } else {
        echo "invalid user!";
    }
}
?>
