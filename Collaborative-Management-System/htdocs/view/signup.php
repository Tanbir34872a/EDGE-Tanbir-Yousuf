<html>
<head>
    <title>Signup</title>
    <script src="../Asset/admin/js/authValidation.js"></script>
    <link rel="stylesheet" href="../Asset/admin/css/signUpStyle.css">
</head>
    <body>
        <header>
            <h3 style="text-align:left;">Collborative Management System </h3>
            <div id="loggedIn" style="text-align: right;">
            <a href="login.php">Login</a>|
            <a href="signup.php">Signup</a>
            </>  
        </header>
        <main>
            <div>
                <h3 id="signUpHeader" style="text-align: center;">Sign up to continue</h3>
            </div>
            <table id="signUptable">
                <tr>
                    <td>
                        <form action="../controller/admin/signupCheck.php" method="Post" onsubmit="return signValidation()" enctype="" style=" justify-content: center; align-items: center; display: flex; ">
                            <fieldset >
                                <table id="signTabElement">
                                    <tr >
                                        <td>
                                            Name 
                                        </td>
                                        <td>
                                            <input type="text" name="name" id="name" value="">
                                            <h6 id="errorName"></h6>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            Username
                                        </td>
                                        <td>
                                            <input type="text" name="username" id="username" value="" onblur="checkUsername()">
                                            <h6 id="errorUsername"></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Email
                                        </td>
                                        <td>
                                            <input type="text" name="email" id="email" value="">
                                            <h6 id="errorEmail"></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Gender
                                        </td>
                                        <td>
                                            <input type="radio" name="gender" id="gender" value="Male">Male
                                            <input type="radio" name="gender" id="gender" value="Female">Female
                                            <input type="radio" name="gender" id="gender" value="Other">Other
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Date of Birth
                                        </td>
                                        <td>
                                            <input type="date" name="dob" id="dob" value=""> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Password
                                        </td>
                                        <td>
                                            <input type="password" name="password" id="password" value="">
                                            <h6 id="errorPass"></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Confirm Password
                                        </td>
                                        <td>
                                            <input type="password" name="confirmPassword" id="confirmPassword" value="">
                                            <h6 id="errorCPass"></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            User Type
                                        </td>
                                        <td>
                                            <input type="radio" name="userType" id="userType" value="Admin">Admin
                                            <input type="radio" name="userType" id="userType"  value="Manager">Manager
                                            <input type="radio" name="userType" id="userType" value="Developer">Developer
                                            <input type="radio" name="userType" id="userType" value="Client">Client
                                        </td>
                                    </tr>

                                </table>
                                <hr>
                                <div class ="btn">
                                    <input type="submit" name="submit" value="Signup">
                                    <input type="reset" name ="reset" value="reset">
                               </div>
                            </fieldset>
                        </form>
                    </td>
                </tr>
                </table>
        </main>

        <footer>
            <h4 style="text-align: center;">Copyright©2023</h4>
        </footer>


    </body>
</html>