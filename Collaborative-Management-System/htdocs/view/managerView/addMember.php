<?php
    include('../../model/managerModel/operationmodel.php');
    require_once('../../controller/admin/session.php');
    require_once('../../model/managerModel/usermodel.php');

    $user = getAllUser();
    $userSession = $_SESSION['user']['username'];

    $developerInfo = getDeveloperInfo();
    $memberInfo = getAllTeamMember();
    //print_r($memberInfo);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Collaborative Task Management</title>
    <link rel="stylesheet" href="../../Asset/managerCSS/addMember.css" />
    <script src="../../asset/managerJs/addmembercheck.js"></script>
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
            <h2><center>Add Member</center></h2>
            <!-- <p> -->

            <!-- <b> Users: <div id='users'></div><br> -->
           <!-- <b> Users: <div id='users' onchange="getDeveloper(this.value)"></div><br>
           <button onclick="show()">Show</button><br><br>
           <hr> -->
           <!-- <script src="../event(js)/addmembercheck.js"></script> -->

           <form action="../../controller/managerController/addMemberCheck.php" method="POST" onsubmit="return getmember()">           
            <b>Username:    <select name="username" id="username" onblur="return getUser()"> 
                            <option disabled selected>Select user</option>
                            <?php for ($i=0;$i<count($developerInfo);$i++){?>
                            <option value="<?php echo $developerInfo[$i]['username']?>"><?php echo $developerInfo[$i]['username']?></option>  
                            <?php } ?>  
                            </select>
                            <div id="h1"style="color:red" ></div>
                            <br>
            <b> Role:       
                <input type="radio" name="Role" id="QA" value="Quality Assurance" />Quality Assurance
                <input type="radio" name="Role" id="SM" value="Sofware Manager" /> Sofware Manager
                <input type="radio" name="Role" id="SA" value="Software Aechitect" /> Software Aechitect
                <br><br>
                <div id="h2"style="color:red" ></div>
                            <br><br>
              
            
                        
            <input type="reset" name="reset" value="cancel" /> <input type="submit" name="" value="submit" /> 
            <!-- <p> -->
            </form>
            <hr>
            
            <h4> <u> All current Team Member</u></h4>
            
            <?php for ($i=0;$i<count($memberInfo);$i++){?>

                Username: <?php echo $memberInfo[$i]['username'];?> <br>
                Role    : <?php echo $memberInfo[$i]['role'];?>
                <hr>
            <?php } ?>
            </div>

<div id="footer" align="center">
    Copyright © 2023
</div>
</body>
</html>