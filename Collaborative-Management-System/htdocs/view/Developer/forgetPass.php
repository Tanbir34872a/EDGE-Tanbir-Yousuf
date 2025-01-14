<?php
require_once("../../model/Developer/users_model.php");
?>
<html lang="en">
<head>
    <title>Change Password</title>
</head>
<body>
    <form method="post" action="../../controller/Developer/passcheck.php">
        <fieldset>
            <legend>Change Password</legend>
            Current Password : <input type="password" name="current_password" value="" /><br>
            New Password : <input type="password" name="new_password" value="" /> <br>
            Retype New Password : <input type="password" name="retype_password" value="" />
            <hr>
            <input type="submit" name="submit" value="submit"/>
            <a href="login.php">Login</a>
            <a href="../,,/index.html">Home</a>|
        </fieldset>
    </form>
    
</body>
</html>