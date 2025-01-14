
<html>
<head>
    <title>Login</title>
</head>
<link rel="stylesheet" href="../../Asset/Developer/css/style.css">
<body>
    <header>
        <h3 style="text-align:left;">Collborative Management System </h3>
        <section style="text-align: right;">
            <div id="signup">
                <a href="../../index.html">Home</a>|
                <a href="signup.php">Signup</a>
            </div>
        </section>
    </header>
    <main>
        <div>
            <h3 style="text-align: center;">Login</h3>
        </div>
        <form action="../../controller/Developer/loginCheck.php" method="Post" enctype="" style=" justify-content: center; align-items: center; display: flex; ">
            <fieldset style="width: 25%;">
                <table style="width: 100%;">
                    <tr>
                        <td>
                            UserName: <br>
                            <input type="text" name="username" id="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password: <br>
                            <input type="password" name="password" id="">
                        </td>
                    </tr>
                </table>
                <input type="checkbox" name="remember" id="">Remember Me
                <hr>
                <input type="submit" value="Login">
                <a href="forgetPass.php">Forgot Password?</a>
                <a href="../../index.html">Home</a>
            </fieldset>
        </form>
    </main>
    <footer>
        <h4 style="text-align: center;">Copyright©2023</h4>
    </footer>

</body>

</html>