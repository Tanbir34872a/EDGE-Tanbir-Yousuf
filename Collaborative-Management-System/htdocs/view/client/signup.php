<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <script src='../js/client/validation.js'></script>


</head>

<body>
    <center>
        <section >
            <h2>Signup</h2>
            <form name="" action="../../controller/client/signupvalidation.php" method="post" novalidate>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="enter username" onkeyup="checkUsername()" onblur="checkUsername()"> <br> <br>
                <span id="usernameErr"><?php echo $nameErr;?></span><br>
                <?php if (isset($usernameerror)) { ?><?php echo $usernameerror; ?> <br> <br>  <?php  } ?>



                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="enter email" onkeyup="checkEmail()" onblur="checkEmail()"> <br> <br>
                <?php if (isset($emailerror)) { ?><?php echo $emailerror; ?> <br> <br> <?php  } ?>
                <?php if (isset($invalidemail)) { ?><?php echo $invalidemail; ?> <br> <br> <?php  } ?>
                <span id="emailErr"><?php echo $emailErr;?></span><br>


                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" placeholder="enter phone number" onkeyup="checkPhone()" onblur="checkPhone()"> <br> <br>
                <?php if (isset($phoneerror)) { ?><?php echo $phoneerror; ?> <br> <br> <?php  } ?>


                <label for="dob">Date of birth</label>
                <input type="date" name="dob" id="dob" placeholder="enter date of birth" onchange="checkDob()"> <br> <br>
                <?php if (isset($doberror)) { ?><?php echo $doberror; ?> <br> <br> <?php  } ?>
                <span id="dobErr"> <?php echo $dobErr;?></span><br>

                <label for="usertype"> Usertype:</label>
                <select name="usertype" id="usertype" onchange="checkUsertype()">
                    <option value="NULL">Select user</option>
                    <option value="client">client</option>
                </select> <br> <br>
                <span id="phoneErr"> <?php echo $phoneErr;?></span><br>
                <span id="usertypeErr"> <?php echo $usertypeErr;?></span><br>


                <label for="address">Address</label>
                <input type="text" name="address" id="address" placeholder="enter address" onkeyup="checkAddress()" onblur="checkAddress()"> <br> <br>
                <?php if (isset($addresserror)) { ?><?php echo $addresserror; ?> <br> <br> <?php  } ?>
                <span id="addressErr"> <?php echo $addressErr;?></span><br>


                <label for="userpassword">Password</label>
                <input type="password" name="userpassword" id="userpassword" placeholder="enter password" onkeyup="checkPassword()" onblur="checkPassword()"> <br> <br>
                <?php if (isset($passworderror)) { ?><?php echo $passworderror; ?> <br> <br> <?php  } ?>
                <span id="passwordErr"><?php echo $passwordErr;?></span><br>

                <label for="confirmpassword">Confirm password</label>
                <input type="password" name="confirmpassword" id="confirmpassword" placeholder="confirm password" onkeyup="checkCpassword()" onblur="checkCpassword()"> <br> <br>
                <?php if (isset($passworderror)) { ?><?php echo $passworderror; ?> <br> <br> <?php  } ?> 
                <span id="cpasswordErr"><?php echo $cpasswordErr;?></span><br> 



                <input id="signup-button" type="submit" value="signup" name="signup">
                <br>
                <p>Already have an account? <a href="login.php">Login</a></p>       

            </form>
        </section>

    </center>

</body>

</html>