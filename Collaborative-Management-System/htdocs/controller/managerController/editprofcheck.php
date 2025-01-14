<?php
    
    session_start();
    require_once('../../model/managerModel/usermodel.php');
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $gender = $_REQUEST['gender'];
    $dob = $_REQUEST['dob'];

    $username = $_SESSION['user']['username'];

    $updateInfo= updateuserinfo($name,$email,$gender,$dob, $username);

    if ($updateInfo)
    {
        header('location:../../view/managerView/viewprof.php');
    }
    else {
        echo "Update unsuccesful";
    }


?>