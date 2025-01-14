<?php
//include('../controller/updateDeadlinecheck.php');
require_once('../../controller/admin/session.php');
require_once('../../model/managerModel/operationmodel.php');
//print_r(getAllTaskInfo());
$userSession = $_SESSION['user']['username'];
$projectTaskInfo = getTaskPrioritiesByUsername($userSession);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Collaborative Task Management</title>
    <link rel="stylesheet" href="../../asset/managerCSS/setTaskPriority.css" />
    <script src="../../asset/managerJs/setprioritycheck.js"></script>
</head>

<body>
    <?php if (isset($_SESSION['flag'])) : ?>
        <div id="container">
            <div id="header">
                <h1>Collaborative task management</h1>
                <p>Logged in as <?php echo $_SESSION['user']['username'] ?> | <a href="../../controller/managerController/logout.php">Logout</a></p>
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
            <form action="../../controller/managerController/updateDeadlinecheck.php" method="POST" onsubmit="return updateDeadline()" enctype="">
    <div>
        <center> <h2> Update Task Deadline </h2> </center> 
    </div>
            <h3> All current tasks : </h3>

                        <table border="1">
                        <tr>
                            <th>Project Name</th>
                            <th>Project Type</th>
                            <th>Priority Task</th>
                            <th>Deadline</th>
                        </tr>

                        <?php
                        for ($i = 0; $i < count($projectTaskInfo); $i++) {
                        ?>
                            <tr>
                                <td><?php echo $projectTaskInfo[$i]['project_name']; ?></td>
                                <td><?php echo $projectTaskInfo[$i]['project_type']; ?></td>
                                <td><?php echo $projectTaskInfo[$i]['priority_task']; ?></td>
                                <td><?php echo $projectTaskInfo[$i]['deadline']; ?></td>
                                </tr>
                        <?php
                        }
                        ?>
                        </table>
                     <br>
                     <select name="project_name" id="project_name">
                         <option value="">Select Project Name</option>
                         <?php for ($i = 0; $i < count($projectTaskInfo); $i++) { ?>
                             <option value="<?php echo $projectTaskInfo[$i]['project_name']; ?>"><?php echo $projectTaskInfo[$i]['project_name']; ?></option>
                         <?php } ?>
                     </select>
                        <br>
                     <b>Set Deadline:</b> <input type="date" name="deadline" id="deadline" value="" /><p><span id="h1" style="color:red"><span></p><br><br>
                     <input type="reset" name="" value="Reset" /> 
                     <input type="submit" name="submit" value="Update" />

                     </form>   
            </div>
        </div>

        <div id="footer" align="center">
            Copyright © 2023
        </div>
    <?php else : ?>
        <?php header('location: ./managerLogin.php'); ?>
    <?php endif; ?>
</body>

</html>
