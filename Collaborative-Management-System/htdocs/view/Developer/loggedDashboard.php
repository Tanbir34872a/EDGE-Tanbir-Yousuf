<?php
session_start();
require('../../controller/Developer/sessionCheck.php');
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Welcome, $username!";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="../../Asset/Developer/css/dashboard.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
<h3 style="text-align:left;">Collborative Management System </h3>
    <header>
        <h2><i>Current status</i></h2>
    </header>
    <main>
        <div>
            <ul>
                <li><a href="profile.php">View profile</a></li>
                <li><a href="history.php">View work history</a> </li>
                <li><a href="code.php">Code Repository</a></li>
            </ul>
        </div>
    </main>
    <footer>
        <h4 style="text-align: center;">Copyright©2023</h4>
    </footer>
    <a href="../../controller/Developer/logout.php">Logout</a>
</body>

</html>