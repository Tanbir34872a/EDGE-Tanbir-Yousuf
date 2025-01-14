<?php
    
    require_once('../../controller/admin/session.php');
    require_once('../../model/managerModel/usermodel.php');

    $user = getAllUser(); // all user data
    $userSession = $_SESSION['user']['username'];  // current session username
   // print_r($_SESSION['user']['username']);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Collaborative Task Management</title>
    <style>  
        td { vertical-align: top; }
        fieldset { width: 500px; height: 500px; }
    </style>
</head>
<body>
    <table border="1" align="center" width="70%" height="100%">
        <tr>
            <th colspan="2">
                <h1>Collaborative Task Management</h1>
                <p>Logged in as <?php echo $userSession; ?> | <a href="../../controller/managerController/logout.php">Logout</a></p>
            </th>
        </tr>
        <tr>
            <td width="30%">
            <b> <h3> Accounts </h3></b>
                <hr></hr>
                <ul>
                <li> <a href="./managerDashboard.php"> Dasboard </a> </li>
                <li> <a href="./setTask.php"> Set task </a> </li>
                <li> <a href="./viewprojects.php"> View projects </a> </li>
                <!-- <li> <a href="./currentWork.php"> Current work </a> </li> -->
                <li> <a href="./manageTeam.php"> Manage team </a> </li>
                <li> <a href="./viewprof.php"> View profile </a> </li>
                <li> <a href="./editprof.php"> Edit profile </a> </li>
                <!-- <li> <a href="./changeprofpic.php"> Change profile photo </a> </li> -->
                <li> <a href="./changepass.php"> Change password </a> </li>
                </ul>
            </td>
            <td align="center" width="70%" style="background-color: #F5F5F5;">
                
                    <fieldset>
                        <legend>Your Profile</legend>
                        <center>
                            <img src="me.jpg" width="100px" height="100px"><br>

                            <?php
                            foreach ($user as $userData) {
                                // echo "Checking user:" . $userData['username']."".$userSession." ". "<br>";
                                // echo $userData['username'];
                                // if (strcmp($userData['username'], $userSession) == 0) {
                                //     echo "true";
                                // } else {
                                //     echo 'false';
                                // }
                                  
                                if ($userData['username'] == $userSession."") {
                                    ?>
                                    Name: <?php echo $userData['name']; ?><br><hr>
                                    Email: <?php echo $userData['email']; ?><br><hr>
                                    Gender: <?php echo $userData['gender']; ?><br><hr>
                                    Date of Birth: <?php echo $userData['dob']; ?><br><hr>
                                    User Type: <?php echo $userData['userType']; ?>
                                    <?php
                                }
                            }
                            ?>
                        </center>
                        <br>
                        <center><a href="./editprof.php">Edit Profile</a></center>
                    </fieldset>
               
            </td>
        </tr>
        <tr align="center">
            <td colspan="2">Copyright c 2023</td>
        </tr>
    </table>
</body>
</html>
