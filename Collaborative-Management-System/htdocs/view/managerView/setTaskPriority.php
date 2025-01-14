<?php
require_once('../../controller/admin/session.php');
require_once('../../model/managerModel/operationmodel.php');
require_once('../../model/managerModel/usermodel.php');

$user = getAllUser();
$userSession = $_SESSION['user']['username'];
$projectNames = getProjectName($userSession); 
$projectTypes = getProjectType($userSession); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Collaborative Task Management</title>
    <link rel="stylesheet" href="../../asset/managerCSS/setTaskPriority.css" />
    <script src="../../asset/managerJs//setprioritycheck.js"></script>
</head>

<body>
        <div id="container">
            <div id="header">
                <h1>Collaborative task management</h1>
                <p>Logged in as <?php $userSession ?> | <a href="../../controller/managerController/logout.php">Logout</a></p>
            </div>

            <div id="sidebar">
                <h3>Accounts</h3>
                <hr>
                <ul>
                <li> <a href="./managerDashboard.php"> Dasboard </a> </li>
                 <li> <a href="./setTask.php"> Set task </a> </li>
             <div>
              <ul>
                <li> <a href="./setTaskPriority.php"> Set task priority </a> </li>
                <li> <a href="./updateTaskDeadline.php"> Update task deadline </a> </li>
            </ul>
            </div>
          <li> <a href="./viewprojects.php"> View projects </a> </li>
          <!-- <li> <a href="./currentWork.php"> Current work </a> </li> -->
          <li> <a href="./manageTeam.php"> Manage team </a> </li>
          <li> <a href="./viewprof.php"> View profile </a> </li>
          <li> <a href="./editprof.php"> Edit profile </a> </li>
          <!-- <li> <a href="./changeprofpic.php"> Change profile photo </a> </li> -->
          <!-- <li> <a href="./changepass.php"> Change password </a> </li> </li>  -->
                <li> <a href="./changepass.php"> Change password </a> </li>
                </ul>
            </div>

            <div id="main-content">
                <h2>Set Task Priority</h2>
                <h3>All current tasks:</h3>
                <div id="projects"></div>
                <hr>

                <form method="POST" action="../../controller/managerController/setTaskPrioritycheck.php" onsubmit="return getPriority();">
                    <select name="project_name" id="project_name">
                        <option value="" disabled selected>Select Project Name</option>
                        <?php foreach ($projectNames as $projectName) : ?>
                            <option value="<?= $projectName ?>"><?= $projectName ?></option>
                        <?php endforeach; ?>
                    </select>

                    <select name="project_type" id="project_type">
                        <option value="" disabled selected>Select Project Type</option>
                        <?php foreach ($projectTypes as $projectType) : ?>
                            <option value="<?= $projectType ?>"><?= $projectType ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <b>Set Priority:</b> <input type="text" name="priority_task" id="priority_task" onkeyup="showHint(this.value)">
                    <p>Suggestions: <span id="txtHint"></span></p> <br><br>
                    <b>Set Deadline:</b> <input type="date" name="deadline" id="deadline" /><br><br>
                    <input type="reset" name="" value="Reset" /> <input type="submit" name="insert_project" value="Submit" /><br><br>
                </form>
            </div>
        </div>

        <div id="footer" align="center">
            Copyright © 2023
        </div>
</body>

</html>
