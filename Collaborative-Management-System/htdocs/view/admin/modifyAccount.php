<?php

    require_once('../../controller/admin/session.php');
    //bring data from manageAccount through hyperlink
    $username = $_REQUEST['username'];
    $name = $_REQUEST['name'];
    $userType= $_REQUEST['userType'];
    
?>

<html>
<head>
    <title>modify Account</title>
    <script src="../../Asset/admin/js/modifyAccountCheck.js"></script>
    <link rel="stylesheet" href="../../Asset/admin/css/modifyAccountStyle.css">

</head>
<body>
    <header>
    <h3 style="text-align:left;">Collborative Management System </h3>
            <div id="loggedIn" style="text-align: right;">
                Logged in as <?php echo $_COOKIE['username']?> |   
                <a href="../../controller/admin/logout.php">Logout</a>
                </section>
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
                    <h3 id="resultModify" style="text-align: center;"> Modify Account </h3>
                    </div>
                    <form action="../../controller/admin/modifyAccountCheck.php" method="POST" onsubmit="return modifyAccountInfo()" style=" justify-content: center; align-items: center; display: flex;">
                                <fieldset style= " width: 50%; height: auto; display: flex;">
                                    <table>
                                        <tr>
                                            <td>
                                                Username
                                            </td>
                                            <td>
                                                :<input type="text" name="username" id="username" value="<?php echo $username; ?>">
                                                <h6 id="resultUsername"></h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Name
                                            </td>
                                            <td>
                                                :<input type="text" name="name" id="name" value="<?php echo $name; ?>">
                                                <h6 id="resultName"></h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                UserType
                                            </td>
                                            <td>
                                                <input type="radio" name="userType" id="userType" value="Manager"<?php if ($userType ==='Manager') echo 'checked';?>>Manager
                                                <input type="radio" name="userType" id="userType" value="Developer"<?php if ($userType ==='Developer') echo 'checked';?> >Developer

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="btn">
                                                <input type="submit" value="Modify"/>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    
                                </fieldset>
                            </form>
                            <h6 id="showUpdatedData"></h6>
                </fieldset>
            </div >
        </section>        
    </main>
    <footer>
        <h4 style="text-align: center;">Copyright©2023</h4>
    </footer>

</body>
</html>