<?php
    
    session_start();
    require_once ("../../model/admin/adminInfoModel.php");
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $gender = $_REQUEST['gender'];
    $dob = $_REQUEST['dob'];

    if($name == '' || $email == '' ||$gender == '' || $dob == ''){

        echo "null value! fill all the fields";
    }
    else{

        $username = $_SESSION['user']['username']; //current session username

        $updateInfo= updateAdminInfo($name,$email,$gender,$dob,$username );

        if ($updateInfo)
        {
            header('location:../../view/admin/viewProfile.php');
        }
        else {
            echo "Does not update";
        }
    }
?>

