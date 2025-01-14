<?php
    require_once('../../controller/admin/session.php');
    require_once('../../model/admin/adminOperationModel.php');
    $developerInfo= displayAllDeveloperInfo(); 
    $developerAssignRole= displayAllDeveloperRole();

?>

<html>
<head>
    <title>Role Assignment</title>
    <script src="../../Asset/admin/js/roleAssignmentCheck.js"></script>
    <link rel="stylesheet" href="../../Asset/admin/css/roleAssignStyle.css">
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
                    <h3 style="text-align: center;"> Assign Role </h3>
                    </div>
                    <form action="../../controller/admin/roleAssignmentCheck.php" method="POST" onsubmit="return roleAssign()" style=" justify-content: center; align-items: center; display: flex; ">
                                <fieldset style= " width: 50%; height: auto; display: flex;">
                                    <table>
                                        <tr>
                                            <td>
                                                Username
                                                <hr>
                                            </td>
                                            <td>
                                            <select name="username" id ="username">
                                                <option value=""> Select Developer </option>
                                                <?php for ($i = 0; $i < count($developerInfo); $i++) { ?>
                                                    <option value="<?php echo $developerInfo[$i]['username']; ?>"> <?php echo $developerInfo[$i]['username']; ?> </option>
                                                <?php } ?>
                                            </select> <hr>
                                            </td>
                                            <td>
                                                <h6 id="devUsername"></h6>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                New Role
                                                <hr>
                                            </td>
                                            <td>
                                                 <input type="text" name="newRole" id="newRole" value="">
                                                <hr>
                                            </td>
                                            <td>
                                                <h6 id="devNewRole"></h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class ="btn">
                                                    <input type="submit" value="Assign"/>
                                                    <input type="reset" value="reset"/>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                            
                                </fieldset>
                            </form>
                            <hr>

                            <h4><u> All Assigned role:</u></h4>
                            <table border="1" width="50%" align="center" >
                                 <tr>
                                    <td>
                                        Developer Username
                                    </td>
                                    <td>
                                        Assigned Role
                                    </td>
                                 </tr>
                                 <?php for ($i =0; $i<count ($developerAssignRole);$i++) { ?>
                                 <tr>
                                    <td>
                                        <?php echo $developerAssignRole[$i]['username']; ?>
                                    </td>
                                    <td>
                                        <?php echo $developerAssignRole[$i]['role']; ?>
                                    </td>
                                 </tr>
                                 <?php } ?>
                            </table>
                            <h5 id="h1"></h5>
                </fieldset>
            </div >
        </section>        
    </main>
    <footer>
        <h4 style="text-align: center;">Copyright©2023</h4>
    </footer>

</body>
</html>