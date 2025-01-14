<?php
require_once('../../controller/admin/session.php');
require_once('../../model/managerModel/usermodel.php');

$user = getAllUser();
$userSession = $_SESSION['user']['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Collaborative Task Management</title>
    <link rel="stylesheet" href="../../asset/managerCSS/manageTeam.css" />
    <script src="../../asset/managerJs//setprioritycheck.js"></script>
</head>

<body>
        <div id="container">
            <div id="header">
                <h1>Collaborative task management</h1>
                <p>Logged in as <?php echo $userSession ?> | <a href="../../controller/managerController/logout.php">Logout</a></p>
            </div>

            <div id="sidebar">
                <h3>Accounts</h3>
                <hr>
                <ul>
                <li> <a href="./managerDashboard.php"> Dasboard </a> </li>
                 <li> <a href="./setTask.php"> Set task </a> </li>
          <li> <a href="./viewprojects.php"> View projects </a> </li>
          <!-- <li> <a href="./currentWork.php"> Current work </a> </li> -->
          <li> <a href="./manageTeam.php"> Manage team </a> </li>
          <div>
            <ul>
                <li> <a href="./addMember.php"> Add Member </a> </li>
                <li> <a href="./removeMember.php"> Remove Member </a> </li>
            </ul>
            </div>
          <li> <a href="./viewprof.php"> View profile </a> </li>
          <li> <a href="./editprof.php"> Edit profile </a> </li>
          <!-- <li> <a href="./changeprofpic.php"> Change profile photo </a> </li> -->
          <!-- <li> <a href="./changepass.php"> Change password </a> </li> </li>  -->
                <li> <a href="./changepass.php"> Change password </a> </li>
                </ul>
            </div>

            <div id="main-content">
                <h2>Add Member</h2>
                <button class="sidebar-button" onclick="window.location.href='./addMember.php'">
                     Add Member
                </button>
                <h2>Remove Member</h2>
                <button class="sidebar-button" onclick="window.location.href='./removeMember.php'">
                    Remove Member
                </button>
        </div>

        <div id="footer" align="center">
            Copyright © 2023
        </div>
</body>

</html>
