<?php
    require_once('../../controller/admin/session.php');
?>

<html>
<head>
    <title>Change Password</title>
    <script src="../../Asset/admin/js/changePasswordCheck.js"></script>
    <link rel="stylesheet" href="../../Asset/admin/css/changePassStyle.css">
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
                    <h3 style="text-align: center;" id="passChangeRR"> Change Password </h3>
                    </div>
                    <form action="../../controllers/admin/changePasswordCheck.php" method="POST" onsubmit="return changePasswordCheck()" style=" justify-content: center; align-items: center; display: flex; ">
                                <fieldset style= " width: 50%; height: auto; display: flex;">
                                    <table>
                                        <tr>
                                            <td>
                                                Current password
                                            </td>
                                            <td>
                                                : <input type="password" name="password" id="password" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                New Password
                                            </td>
                                            <td>
                                                : <input type="password" name="nPassword" id="nPassword" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Confirm Password
                                            </td>
                                            <td>
                                                : <input type="password" name="rpassword" id="rPassword" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="btn">
                                                <input type="submit" value="Change"/>
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