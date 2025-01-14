<?php
require_once('../../model/managerModel/operationmodel.php');
//print_r(getAllTaskInfo());
//$projectTaskInfo = getAllTaskInfo();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Collaborative Task Management</title>
    <script src="../../asset//managerJs/viewproject.js"></script>
    <link rel="stylesheet" href="../../asset/managerCSS/viewProjects.css" />
    <style>
        td { vertical-align: top; }
    </style>
</head>
<body>
    <div id="container">
        <div id="header">
            <h1>Collaborative Task Management</h1>
            <a id="logout" href="../../controller/managerController/logout.php">Logout</a>
        </div>

        <div id="sidebar">
            <p>Accounts</p>
            <hr>
            <ul>
                <li><a href="./managerDashboard.php">Dashboard</a></li>
                <li><a href="./setTask.php">Set Task</a></li>
                <li><a href="./viewprojects.php">View Projects</a></li>
                <li><a href="./manageTeam.php">Manage Team</a></li>
                <li><a href="./viewprof.php">View Profile</a></li>
                <li><a href="./editprof.php">Edit Profile</a></li>
                <li><a href="./changepass.php">Change Password</a></li>
            </ul>
        </div>

        <div id="content">
            <div id="searchBox">
                <input type="text" name="project_name" id="project_name" placeholder="Write project name here" value="" />
                <input type="button" name="search" value="Search" onclick="search()" /><br>
                Search for: <div id="showproject"onkeyup="showHint(this.value)"></div>
                <p><span id="txthint"></span></p>
            </div>

            
            <div id="projects"></div>
            <script src="../../asset/managerJs/viewproject.js"></script>
           </div>

        <div id="footer">
            Copyright © 2023
        </div>
    </div>
</body>
</html>
