<?php
    require_once('../../controller/admin/session.php');
    require_once('../../model/admin/adminOperationModel.php');

    $managerInfo= displayAllManagerInfo();// fetch all the manager info
    $projectInfo= displayAllProjectInfo(); // fetch all the project info

?>
<html>
<head>
    <title>Assign Manager</title>
    <script src="../../Asset/admin/js/assignManagerCheck.js"></script>
    <link rel="stylesheet" href="../../Asset/admin/css/assignManagerStyle.css">
    
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
            <div id="AdminMenu">
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
            <div id="mainArea">
                <fieldset >
                    <div>
                    <h3 style="text-align: center;"> Assign Manager </h3>
                    </div>
                    <form action="../../controller/admin/assignManagerCheck.php" method="POST" onsubmit="return asssignManagerVal()" style=" justify-content: center; align-items: center; display: flex; ">
                                <fieldset style= " width: 50%; height: auto; display: flex;">
                                    <table>
                                        <tr>
                                            <td>
                                                Username
                                                <hr>
                                            </td>
                                            <td>
                                            <select name="username" id ="username">
                                                <option value=""> Select </option>
                                                <?php for ($i = 0; $i < count($managerInfo); $i++) { ?>
                                                    <option value="<?php echo $managerInfo[$i]['username']; ?>"> <?php echo $managerInfo[$i]['username']; ?> </option>
                                                <?php } ?>
                                            </select> <hr>
                                            </td>
                                            <td><h6 id="resultUsername"> </h6></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Project Name
                                                <hr>
                                            </td>
                                            <td>
                                            <select name="projectName" id="projectName">
                                                <option value=""> Select </option>
                                                <?php for ($i = 0; $i < count($projectInfo); $i++) { ?>
                                                    <option value="<?php echo $projectInfo[$i]['projectId']; ?>"> <?php echo $projectInfo[$i]['projectName']; ?> </option>
                                                <?php } ?>
                                            </select> <hr>
                                            </td>
                                            <td> <h6 id="resultProjectName"> </h6></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Project Type
                                                <hr>
                                            </td>
                                            <td>
                                            <select name="projectType" id="projectType">
                                                <option value=""> Select</option>
                                                <?php for ($i = 0; $i < count($projectInfo); $i++) { ?>
                                                    <option value="<?php echo $projectInfo[$i]['projectType']; ?>"> <?php echo $projectInfo[$i]['projectType']; ?> </option>
                                                <?php } ?>
                                            </select><hr>
                                            </td>
                                            <td><h6 id="resultProjectType"> </h6></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="btn">
                                                <input type="submit" value="Assign"/>
                                                <input type="reset" value="reset"/>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </fieldset>
                            </form>
                </fieldset>
            </div >
        </section>        
    </main>
    <footer>
        <h4 style="text-align: center;">Copyright©2023</h4>
    </footer>

</body>
</html>

