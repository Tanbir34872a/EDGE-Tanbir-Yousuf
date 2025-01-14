<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Welcome, $username!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Profile</title>
    <link rel="stylesheet" href="../../Asset/Developer/css/profile.css">
</head>
<body>
    <header>
        <h1 style="text-align: center;">View Profile</h1>
    </header>
    <hr>
    <a href="loggedDashboard.php">Back</a>|
    <main>
        <h2>Profile Information</h2>
        <p>Name: John Doe</p>
        <p>Email: john.doe@example.com</p>
        <hr>

        <h2>Skills and Expertise</h2>
        <p>Skills: HTML, JavaScript, Python</p>
        <p>Expertise: Web Development, Data Analysis</p>
        <hr>

        <h2>Availability Status</h2>
        <p>Status: Available</p>
        <hr>

        <h2>Project Preferences</h2>
        <p>Preferred Projects: Web Development, Data Analysis</p>
        <p>Preferred Working Hours: Flexible</p>
        <p>Payment Preferences: PayPal</p>
        <hr>

        <h2>Project Recommendations</h2>
        <p>No project recommendations at the moment.</p>
    </main>
    <a href="../../controller/Developer/logout.php">Logout</a>
    <footer>
        <h4 style="text-align: center;">Copyright©2023</h4>
    </footer>
</body>
</html>