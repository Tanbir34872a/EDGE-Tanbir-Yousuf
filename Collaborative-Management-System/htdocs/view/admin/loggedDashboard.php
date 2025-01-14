<?php
  require_once('../../controller/admin/session.php'); 
  if (isset($_SESSION['flag']))
  {
  ?>
<html>
<head>
    <title>Dashboard</title>
    <script src="../../Asset/admin/js/showProjectData.js"></script>
    <script src="../../Asset/admin/js/searchInfo.js"></script>
    <link rel="stylesheet" href="../../Asset/admin/css/loggedDashboardStyle.css">
</head>
<body>
    <header>
    <h3>Collborative Management System </h3>
             <div id ="search">
                <input type="text" name="search" id="searchValue" placeholder="Search" onkeyup="searchInfo()"/>
            </div>
            <div id="loggedIn">
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
            <div id="mainArea">
                <fieldset style="width: 100%">
                    <h4 id="log"> Welcome <?php echo $_COOKIE['username']?> </h4>
                    <div class=" btn">
                        <input type="button" name="showUserInfo" value="Show all User Information" onclick="getAllUserInfo()"/>
                        <p id="userInfo"></p>
                        <hr>
                        <input type="button" name="showProjectInfo" value="Show all Projects Information" onclick="getProjectInfo()"/>
                        <p id="projectInfo"></p>
                        <hr>
                        <input type="button" name="showPAssignedManInfo" value="Show Project Assign Manager" onclick="getAssignManagerInfo()"/>
                        <p id="showPAssignedManInfo"></p>
                    </div>
                    <div>
                        <h6 id ="searchResult"></h6>
                    </div>
                </fieldset>
            </div >
        </section>        
    </main>
    <footer>
        <h4 style="text-align: center;">Copyright©2023</h4>
    </footer>

</body>
</html>

<?php
  }
    else{
        header('location: ./login.php');
    }
?>