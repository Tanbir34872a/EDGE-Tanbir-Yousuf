<?php
    session_start();
    if (!isset($_COOKIE['username'] ,$_COOKIE['password']))
    {
        $_COOKIE['username'] ="";
        $_COOKIE['password']="";
    }
?>
<html>
<head>
    <title>Login</title>
    <script src="../Asset/admin/js/authValidation.js"></script>
    <link rel="stylesheet" href="../Asset/admin/css/loginStyle.css">
</head>
<body>
        <header>
            <h3 style="text-align:left;">Collborative Management System </h3>
            <div id="loggedIn" style="text-align: right;">
                <a href="login.php">Login</a>|
                <a href="signup.php">Signup</a>
            </div>  
        </header>
        <main>
            <div>
                <h3 id="loginHeader">Login</h3>
            </div>
             <form action="../controller/admin/loginCheck.php" method="Post" onsubmit="return loginValidation()" enctype="" style=" justify-content: center; align-items: center; display: flex; ">
                <fieldset id="loginField"" >
                <table id="loginTable">
                    <tr>
                        <td>
                            UserName: <br>
                            <input type="text" name="username" id="username" value="<?php echo $_COOKIE['username'];?>" id="">
                            <h6 id="errorLogUsername"></h6>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password: <br>
                            <input type="password" name="password" id="password" value="<?php echo $_COOKIE['password'];?>" id="">
                            <h6 id="errorLogPass"></h6>
                        </td>
                    </tr>
                </table>

                        <div class="btn">
                        <input type="checkbox" name="remember" id="">Remember Me
                        <hr>
                        <input type="submit" value="Login">
                        <a href="signup.php">Signup</a>
                        </div>
                    </fieldset>
            </form>
        </main>
        <footer>
            <h4 style="text-align: center;">Copyright©2023</h4>
        </footer>

</body>
</html>
