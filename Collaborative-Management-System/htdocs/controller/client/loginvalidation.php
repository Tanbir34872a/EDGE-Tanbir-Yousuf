<?php

require_once('../../model/client/usermodel.php');

session_start();


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $userpassword = $_POST['userpassword'];


    if (empty($email)) {
        $emailerror = "email required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $invalidemail = "Invalid email format";
    }

    if (empty($userpassword)) {
        $passworderror = "password required";
    }

    include('../../view/client/login.php');


    if (empty($emailerror) &&  empty($invalidemail) &&  empty($passworderror)) {


        $conn = getConnection();
        $sql = "select * from users where email='$email' and userpassword='$userpassword'";
        $result = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $row = mysqli_fetch_array($result);
            if($row["usertype"] == "client") {

                $_SESSION['flag'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $username;
                $_SESSION['address'] = $address;
                $_SESSION['phone'] = $phone;
                $_SESSION['dob'] = $dob;
                $_SESSION['usertype'] = $usertype;
                setcookie('status', 'true', time() + 30000, '/');


                header("location: ../view/client/client.php");
            } 
           
           
        }
      

        else {
            header("Location: ../view/client/login.php?error=Incorect User name or password");
        }
    }
}
