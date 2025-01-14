<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>
    <header>
        <h3 style="text-align:left;">Collaborative Management System </h3>
        <section style="text-align: right;">
            <a href="../../index.html">Home</a>|
            <a href="signup.php">Signup</a>
        </section>  
    </header>
    <main>
 
        <div>
            <h3 style="text-align: center;">Sign up</h3>
        </div>
        <table width="100%">
            <tr>
                <td>
                    <form action="../../controller/Developer/signupCheck.php" method="post" id="signupForm" enctype="" style="justify-content: center; align-items: center; display: flex;">
                        <fieldset style="width: 35%;">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        Name 
                                    </td>
                                    <td>
                                        : <input type="text" name="name" id="name" value="" placeholder="Enter your name" onkeyup="validateName()">
                                        <label id="name-error" style="color: red;"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        UserName
                                    </td>
                                    <td>
                                        : <input type="text" name="username" id="username" value="" placeholder="Enter a username" onkeyup="validateUName()">
                                        <label id="username-error" style="color: red;"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Email
                                    </td>
                                    <td>
                                        : <input type="email" name="email" id="email" value="" placeholder="example@example.com" onkeyup="validateEmail()">
                                        <label id="email-error" style="color: red;"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Gender:
                                    </td>
                                    <td id= "gender">
                                        <input type="radio" name="gender" id="male" value="Male" onclick="validateGender()">Male
                                        <input type="radio" name="gender" id="female" value="Female"  onclick="validateGender()">Female
                                        <input type="radio" name="gender" id="other" value="Other"  onclick="validateGender()">Other
                                        <label id="gender-error" style="color: red;"> Please select a gender</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Date of Birth
                                    </td>
                                    <td>
                                        : <input type="date" name="dob" id="dob" value="" placeholder="Select your date of birth" onchange="validateDOB()">
                                        <label id="dob-error" style="color: red;"> Please select a Date of Birth</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Password
                                    </td>
                                    <td>
                                        : <input type="password" name="password" id="password" value="" placeholder="Enter your password" onkeyup="validatePass()">
                                        <label id="pass-error" style="color: red;"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Confirm Password
                                    </td>
                                    <td>
                                        : <input type="password" name="confirmPassword" id="confirmPassword" value="" placeholder="Confirm your password" onkeyup="validateCPass()">
                                        <label id="cpass-error" style="color: red;"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        User Type:
                                    </td>
                                    <td id ="type">
                                        <input type="radio" name="type" id="admin" value="Admin" onclick="validateType()">Admin
                                        <input type="radio" name="type" id="manager" value="Manager" onclick="validateType()">Manager
                                        <input type="radio" name="type" id="dev" value="Developer" onclick="validateType()">Developer
                                        <input type="radio" name="type" id="client" value="Client" onclick="validateType()">Client
                                        <label id="type-error" style="color: red;">Please select a User Type</label>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <section style="text-align: center;">
                                <input type="submit" name="submit" value="submit">
                                <input type="reset" name ="reset" value="reset">
                            </section>
                        </fieldset>
                    </form>
                </td>
            </tr>
        </table>
    </main>
    <footer>
        <h4 style="text-align: center;">Copyright©2023</h4>
    </footer>
    <script src="../../Asset/Developer/js/validation.js"></script>
</body>
</html>
