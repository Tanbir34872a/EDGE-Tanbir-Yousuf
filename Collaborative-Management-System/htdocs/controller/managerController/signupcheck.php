<?php
   // session_start();
    require_once('../../model/managerModel/usermodel.php');
    $username = $_REQUEST['username'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $confirmPassword = $_REQUEST['confirmPassword'];
    $gender = $_REQUEST['gender'];
    $dob = $_REQUEST['dob'];
    $userType = $_REQUEST['userType'];

    $userCheck = 'abcdefghijkhmlopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $passwordCheck = '@#$&!0123456789abcdefghijkhmlopqrstuvwxyz';
 
    if ($username == '' || $name == '' || $email == '' || $password == '' || $confirmPassword == '' || $gender == '' || $dob == '' || $userType == '') {
        echo "Null value! Fill all the fields";
    } 

    // username validation
    else if (strpbrk($username, $userCheck) === false) {
        echo "Username should contain only alphabetic characters with mix of upper and lower case";
    }
    else if (strlen($username) < 4) {
        echo "Username should be at least 4 characters";
        }

    // password validation 
        else if ($password != $confirmPassword) {
            echo "Confirm password does not match";

        }elseif (strlen($password)< 4){
            echo "Password should be atleast 4 character"; 
        
        } else if (strpbrk($password, $passwordCheck) === false) {
            echo "Password should have alphabets special characters and numbers";
        }

    //name validation
         else if (strpos($name, ' ') === false) {
            echo "Name should contain two words separated by a space";
            }
            
            else {
            $status = signup($username, $name, $email, $password, $gender, $dob, $userType);
            if ($status) {    
                header('location: ../../view/managerView/managerLogin.php');
            } else {
                echo "Username already taken! Try another one"; 
            }
        }

?>