<?php
require_once('../../model/managerModel/usermodel.php');
//print_r(getAllUser());
$userInfo = getAllUser();
?>

<html lang="en">
<head>
    <title> Menu </title>
    <style>  
    td { vertical-align:top;}
    .center-fieldset {
            margin: 0 auto;
            text-align: center;
    }
   </style>
</head>
<body>

<table border = "1" align="center" width="70%" height="30%">
    <tr>
        <th colspan="2" align="right"> <a href="managerSignUp.php"> Sign Up </pre></th>

    </tr>
     <tr>
     <td width="30%">
     <form method="" action="signupcheck.php" enctype="">
        <fieldset class="center-fieldset" style="width:50%;">
            <legend> Forget Password </legend>
            <pre>
<b>Email      :</b> <input type="text" name="name" value="" /> <br> <br>
<b>Password   :</b> <input type="password" name="password" value="" /> <br> <br>
<b>Re-password:</b> <input type="password" name="password" value="" /> <br> <br>
</pre>
<input type="submit" name="" value="Sign Up" />
<input type="reset" name="" value="Reset" /> <br> <br>

    </td></tr>
        </fieldset>
    </form> 
     </td>
    </tr>
   
</body>
</html>










