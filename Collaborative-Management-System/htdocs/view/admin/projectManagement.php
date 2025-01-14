<?php
    require_once('../../controller/admin/session.php');
    require_once('../../model/admin/adminOperationModel.php');
    $userInfo = displayAllCurrentProject(); // all current project info and assign manager
    //print_r($userInfo)
?>

<html>
<head>
    <title>project Management</title>
    <script src="../../Asset/admin/js/showProjectData.js"></script>
    <script src="../../Asset/admin/js/searchInfo.js"></script>
    <link rel="stylesheet" href="../../Asset/admin/css/projectManagementStyle.css">
</head>
<body>
    <header>
    <h3 style="text-align:left;">Collborative Management System </h3>
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
            <div id="mainArea" >
                <fieldset >
                    <div id="search">
                    <h3 style="text-align: center;"> project Management </h3>
                    <div style="text-align: right">
                                <input type="text" name="search" id="searchProjectName" placeholder="Search Project"/>
                                <input type="button" name="searchProjectName" value="Search" onclick="searchProject()"/>
                        </div>
                    </div>
                                    
                        <a href="./createProject.php"><b>Create Project</b></a> <br><br><hr><br>
                        <a href="./assignManager.php"><b>Assign Manager</a> </b><br><br><hr>
                        <div class="btn">
                            <input type="button" name ="loadProjects"id="loadProjects" value="Show all created Projects" onclick="getProjectInfo()"/>
                            <input type ="button" name ="loadProjectMan"id="loadProjectsMan" value="Show all Assigned Manager" onclick="getAssignManagerInfo()"/>
                        </div>
                        <p id= projectInfo></p>
                        <p id="searchResult"></p>

                    <!-- <div>
                        <h4><u> All running projects and assigned manager:</u></h4>
                        <table border ="1" width="100%"  align="center">
                            <tr>
                                <td>Project Name </td>
                                <td>Project Type</td>
                                <td>Project Details</td>
                                <td>Assigned Manager</td>
                            </tr>
                            <//?php for ($i=0; $i<count($userInfo);$i++) {?>
                                    <tr>
                                        <td><//?php echo $userInfo[$i]['projectName'];?> </td>
                                        <td><//?php echo $userInfo[$i]['projectType'];?> </td> 
                                        <td><//?php echo $userInfo[$i]['projectDetails'];?> </td>  
                                        <td><//?php echo $userInfo[$i]['username'];?> </td>  
                                        </tr>
                            <//?php } ?>

                                </table>
                        </div> -->
                </fieldset>
            </div >
        </section>        
    </main>
    <footer>
        <h4 style="text-align: center;">Copyright©2023</h4>
    </footer>

</body>
</html>