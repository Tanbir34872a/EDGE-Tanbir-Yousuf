<?php
session_start();
require('../../controller/Developer/sessionCheck.php');
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Welcome, $username!";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Work History</title>
</head>

<body>
    <header>
    <link rel="stylesheet" href="../../Asset/Developer/css/history.css">
        <h1 style="text-align: center;">Work History</h1>

    </header>
    <hr>
    <a href="loggedDashboard.php">Back</a>|
    <main>
        <h2>Project History</h2>
        <ul>
            <li>Project 1 - Started: Jan 1, 2023, Ended: Feb 15, 2023</li>
            <li>Project 2 - Started: Mar 10, 2023, Ended: Apr 30, 2023</li>
        </ul>
        <hr>
        <h2>Task History</h2>
        <ul>
            <li>Task 1 - Completed: Feb 5, 2023</li>
            <li>Task 2 - Completed: Mar 20, 2023</li>
        </ul>
        <hr>
        <h2>Project Updates</h2>
        <ul>
            <li>Project 1: Completed on schedule</li>
            <li>Project 2: Delayed due to unforeseen issues</li>
        </ul>
        <hr>
        <h2>Collaboration History</h2>
        <ul>
            <li>Collaborated with User A on Project 1</li>
            <li>Collaborated with User B on Task 2</li>
        </ul>
        <hr>

    </main>
    <a href="../../controller/Developer/logout.php">Logout</a>
</body>
<footer>
    <h4 style="text-align: center;">Copyright©2023</h4>
</footer>

</html>