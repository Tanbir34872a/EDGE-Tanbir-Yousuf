<?php
session_start();
require_once('../../model/client/usermodel.php');

if (isset($_POST['signup'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $usertype = $_POST['usertype'];
    $address = $_POST['address'];
    $userpassword = $_POST['userpassword'];
    $confirmpassword = $_POST['confirmpassword'];



    if (empty($username)) {
        $usernameerror = "username required";
    }

     if (empty($email)) {
        $emailerror = "email required";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $invalidemail = "Invalid email format";
        
    }
    else {
        $conn = getConnection();
        $email = mysqli_real_escape_string($conn, $email); // Sanitize input to prevent SQL injection

        // Check if the email already exists in the database
        $checkEmailQuery = "SELECT * FROM users WHERE email='$email'";
        $resultEmailCheck = mysqli_query($conn, $checkEmailQuery);

        if (mysqli_num_rows($resultEmailCheck) > 0) {
            $emailerror = "Email is already taken";
        }
    }
    

    if (empty($phone)) {
        $phoneerror = "password required";
    }

    if (empty($dob)) {
        $doberror = "date of birth required";
    }

    if (empty($usertype)) {
        $usertypeerror = "usertype required";
    }

    if (empty($address)) {
        $addresserror = "address required";
    }

    if (empty($userpassword)) {
        $passworderror = "password required";
    }

    if (empty($confirmpassword)) {
        $passworderror = "password required";
    }


    include('../../view/client/signup.php');
    if (empty($emailerror) &&  empty($invalidemail) &&  empty($passworderror) &&  empty($usernameerror) &&  empty($phoneerror) &&  empty($doberror) &&  empty($usertypeerror) &&  empty($addresserror)) {
        
        $conn = getConnection();
        $userinfo = [

            'username'=> $username,
            'email'=> $email,
            'phone'=> $phone,
            'dob'=> $dob,
            'usertype'=> $usertype,
            'address'=> $address,
            'userpassword'=> $userpassword,
            'confirmpassword'=> $confirmpassword
        ];

        $status = insertUser($userinfo);
        if ($status) {

            header('location: ../../view/client/login.php');

        } 
        else {

            echo "failed to insert!";

        }
    }

}


?>

