<?php
    require_once('../../controller/admin/session.php');
?>

<html>
<head>
    <title>Create Projects</title>
    <script src="../../Asset/admin/js/createProjectCheck.js"></script>
    <link rel="stylesheet" href="../../Asset/admin/css/createProjectStyle.css">
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
                <fieldset>
                    <div>
                    <h3 style="text-align: center;"> Create Project </h3>
                    </div>
                    <form action="../../controller/admin/createProjectCheck.php" method="POST" onsubmit="return createProjectVal()" style=" justify-content: center; align-items: center; display: flex; ">
                                <fieldset style= " width: 50%; height: auto; display: flex;">
                                    <table>
                                        <tr>
                                            <td>
                                                Project Name
                                            </td>
                                            <td>
                                                : <input type="text" name="projectName" id="projectName" value="" onblur="checkProjecName()">
                                                  <h6 id ="resultPN"></h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Project Type
                                            </td>
                                            <td>
                                                : <input type="text" name="projectType" id="projectType" value="">
                                                  <h6 id ="resultPT"></h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Project Details
                                            </td>
                                            <td>
                                                :<textarea name ="projectDetails" id="projectDetails" value=""> </textarea> <br>
                                                 <h6 id ="resultPD"></h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="btn">
                                                    <input type="submit" value="Create"/>
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