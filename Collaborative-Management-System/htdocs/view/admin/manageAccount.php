<?php

    require_once('../../controller/admin/session.php');
    require_once('../../model/admin/adminOperationModel.php');
    require_once('../../model/admin/adminSearchModel.php');
    
    $userInfo = displayAlluserInfo(); // all manager and develper info
?>

<html>
<head>
    <title>User Management</title>
    <script src="../../Asset/admin/js/searchInfo.js"></script>
    <link rel="stylesheet" href="../../Asset/admin/css/manageAccountStyle.css">
</head>
<body>
    <header>
    <h3 style="text-align:left;">Collaborative Management System </h3>
            <div id="loggedIn" style="text-align: right;">
                Logged in as <?php echo $_COOKIE['username']?> |   
                <a href="../../controller/admin/logout.php">Logout</a>
            </div>
    </header>
    <main>
        <section style="width: 100%; height: auto;display: flex;">
            <div id ="AdminMenu">
             <fieldset>
             <h4>Admin</h4>
            <hr>
            <ul>
                <li><a href="./loggedDashboard.php">Dashboard</a></li>
                <li><a href="./viewProfile.php">View Profile</a></li>
                <li><a href="./editProfile.php">Edit Profile</a></li>
                <li><a href="./manageAccount.php">User Management</a></li>
                <li><a href="./roleAssignment.php">Role Assignment</a></li>
                <li><a href="./projectManagement.php">Project Management</a></li>
                <li><a href="./changePassword.php">Change Password</a></li>
                <li><a href="../../controller/admin/logout.php">Logout</a></li>
            </ul>  
            </fieldset>
            </div>
            <div id="mainArea" style=" width: 80%; height: auto;display: flex;">
                <fieldset style="width: 100%">
                   
                    <h3 style="text-align: center;"> User Management </h3>
                    <h4><u> All Current User:</u></h4>
                        <div id="search" style="text-align: right">
                                <input type="text" name="search" id="searchUsername" placeholder="Search user"/>
                                <input type="button" name="searchUser" value="Search" onclick="searchUser()"/>
                        </div>

                    <br> 
                    <div>
                        <table border ="1" width="100%"  align="center">
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>User Type</th>
                                <th>Option</th>
                            </tr>
                            <?php for ($i=0; $i<count($userInfo);$i++) {?>
                                    <tr>
                                        <td><?php echo $userInfo[$i]['username'];?> </td>
                                        <td><?php echo $userInfo[$i]['name'];?> </td> 
                                        <td><?php echo $userInfo[$i]['email'];?> </td>  
                                        <td><?php echo $userInfo[$i]['gender'];?> </td>  
                                        <td><?php echo $userInfo[$i]['dob'];?> </td>
                                        <td><?php echo $userInfo[$i]['userType'];?> </td>
                                        <td>
                                            <a href='./modifyAccount.php?username=<?=$userInfo[$i]['username'];?>&name=<?=$userInfo[$i]['name']?>&userType=<?=$userInfo[$i]['userType']?>'> Modify </a> |
                                            <a href='./removeAccount.php?username=<?=$userInfo[$i]['username'];?>'> Remove </a> 
                                        </td>
                                        </tr>
                            <?php } ?>

                                </table>
                            <!-- </div> -->
                            <br>
                            <p id="searchResult"></p>
                            
                </fieldset>
            </div >
        </section>        
    </main>
    <footer>
        <h4 style="text-align: center;">Copyright©2023</h4>
    </footer>

</body>
</html>

