<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Sign Up</title>
    <script src = "../event(js)/signupcheck.js"></script>
    <style>  
        td { vertical-align: top; }
        .center-fieldset {
            margin: 0 auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <form method="post" action="../../controller/managerController/signupcheck.php">
        <table border="1" align="center" width="70%" height="30%">
            <tr>
                <th colspan="2" align="right"> <a href="managerLogin.php">Login</a></th>
            </tr>
            <tr>
                <td>
                    <fieldset style="width.30%;">
                        <legend>Sign Up</legend>
                        Username: <br>
                        <input type="text" name="username" value="" /> <br><br>
                        Name:<br>
                         <input type="text" name="name" value="" /> <br><br>
                        Email:<br>
                         <input type="email" name="email" value="" /> <input type="button" value="i" title="abc@gmail.com"><br><br>
                        Password:<br>
                         <input type="password" name="password" value="" /> <br><br>
                        Confirm password:<br>
                         <input type="password" name="confirmPassword" value="" /> <br><br>

                        <fieldset>
                            <legend>Gender</legend>
                            <input type="radio" name="gender" value="Male" /> Male
                            <input type="radio" name="gender" value="Female" /> Female
                            <input type="radio" name="gender" value="Other" /> Other <br><br>
                        </fieldset>

                        <fieldset>
                            <legend>Date of Birth</legend>
                            <input type="date" name="dob" value="" /> <br><br>
                        </fieldset>

                        <fieldset>
                            <legend>User Type</legend>
                            <input type="radio" name="userType" value="Admin" /> Admin
                            <input type="radio" name="userType" value="Manager" /> Manager 
                            <input type="radio" name="userType" value="Developer" /> Developer
                            <input type="radio" name="userType" value="Client" /> Client <br><br>
                        </fieldset>
                        <br>

                        <input type="submit" name="submit" value="Submit" />
                        <a href="managerLogin.php">Login</a>
                    </fieldset>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
