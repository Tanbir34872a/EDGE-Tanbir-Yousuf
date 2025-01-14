<?php
    require_once('../../controller/admin/session.php');
    $username= $_REQUEST['username']; // hyperlink username (manage account)
?>

<html>
<head>
    <title>Remove Account</title>
    <script src="../../Asset/admin/js/removeAccountCheck.js"></script>
    <link rel="stylesheet" href="../../Asset/admin/css/removeAccountStyle.css">
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
                    <h3 style="text-align: center;"> Remove Account </h3>
                    </div>
                    <form action="../../controller/admin/removeAccountCheck.php" method="POST" onsubmit="return removeAccount()" style=" justify-content: center; align-items: center; display: flex; ">
                                <fieldset style= " width: 50%; height: auto; display: flex;">
                                    <table>
                                        <tr>
                                            <td>
                                                Username
                                            </td>
                                            <td>
                                                : <input type="text" name="username" id="username" value="<?php echo $username;?>">
                                            </td>
                                            <td><h6 id="removeAccountUsername"></h6></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Password
                                            </td>
                                            <td>
                                                : <input type="password" name="password" id="password" value="">
                                            </td>
                                            <td><h6 id="removeAdminPassword"></h6></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="btn">
                                                <input type="submit" value="Remove"/>
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