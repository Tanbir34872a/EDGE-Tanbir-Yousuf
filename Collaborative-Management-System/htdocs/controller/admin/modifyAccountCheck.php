<?php
    session_start();

    require_once ("../../model/admin/adminOperationModel.php");

    // $username= $_REQUEST['username'];
    // $name=$_REQUEST['name'];
    // $userType= $_REQUEST['userType'];

    $userInfo =  $_REQUEST['userInfo'];
    //decode the userInfo
    $userInfo = json_decode($userInfo, true);

    //hold data in the variable for DB operation
    $username=$userInfo['username'];
    $name=$userInfo['name'];
    $userType=$userInfo['userType'];

    $updateUserType = updateAccountUserType($username,$name,$userType);

    if ($updateUserType)
    {
        echo json_encode(["success" => true]);
        //header('Location: ../views/manageAccount.php');
    }
    else 
    {
        echo json_encode(["error" => "Unsuccessful"]);
    }
    

?>