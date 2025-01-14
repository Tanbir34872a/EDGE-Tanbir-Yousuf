<?php
    include('../../model/managerModel/operationmodel.php');
    require_once('../../controller/admin/session.php');
    require_once('../../model/managerModel/usermodel.php');

    $user = getAllUser();
    $userSession = $_SESSION['user']['username'];

    $developerInfo = getDeveloperInfo();
    $memberInfo = getAllTeamMember();
?>

<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../../asset/managerCSS/removeMember.css" />
    <script src="../../asset/managerJs/removemembercheck.js"></script>
    <style>  
        td { vertical-align: top; }
    </style>
</head>
<body onload="showAddedMembers()">
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
            <h2><center>Remove Member</center></h2>
                    <b>Username:</b> <input type="text" name="username" id="username" value="" />
                    <input class="sidebar-button" type="button" name="search" value="Search" onclick="searchToRemove()" />
                    <hr>
                    <div id="h1"></div>
                    <hr>
                <center>
                    <form action="../../controller/managerController/removeMemberCheck.php" onsubmit="return remove()" method="POST">
                    </form>
                </center>
        
                <h4> <u> Added Members </u></h4>
                <center>
                <!-- <input type="button" name="click" value="Show members" onclick="showMembers()" /><br><br>
                <div id="members"></div> -->
                <div id="membersToShow"></div>
                </center>
                </div>

<div id="footer" align="center">
    Copyright © 2023
</div>
</body>
</html>