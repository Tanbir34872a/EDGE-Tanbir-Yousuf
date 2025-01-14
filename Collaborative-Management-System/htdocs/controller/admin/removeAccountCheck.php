<?php
    //session_start();
    require_once ("../../model/admin/adminOperationModel.php");
    require_once('./session.php'); 

    $account =  $_REQUEST['account'];
    $accountInfo = json_decode($account, true);

    $username=$accountInfo['username'];
    $password=$accountInfo['password'];
    $currentAdminPass = $_SESSION['user']['password']; //admin Passwrd from session 

    // if (isset($_REQUEST['username'],$_REQUEST['password']))
    // {
    //     $username= $_REQUEST['username']; // user username
    //     $password=$_REQUEST['password']; // admin password
    // }
    if($password=='')
    {
        echo json_encode(["error" => "Please provide a password to remove the user"]);
    }
    else{

        if ($password==$currentAdminPass)
        {
            $removeuser = removeAccount($username);
    
            if ($removeuser)
            {
                //header('Location: ../views/manageAccount.php');
                //echo "success";
                echo json_encode(["success" => true]);
            }
            else 
            {
                echo json_encode(["error" => "Unsuccessful"]);
            }
        }
        else{
            echo json_encode(["error" => "Provided password does not match the admin's password"]);
        }
    }

?>