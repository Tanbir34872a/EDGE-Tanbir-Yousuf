<?php
    session_start();
    require_once ("../../model/admin/adminOperationModel.php");

    $managerUsername = $_REQUEST['username'];
    $projectName = $_REQUEST['projectName'];

    //json data
    $assignMan=$_REQUEST['assignManData'];
    $assignManData= json_decode($assignMan,true);
    //hold json data
    $managerUsername=$assignManData['username'];
    $projectName=$assignManData['projectName'];


    if ($managerUsername==""||$projectName=="")
    {
        echo json_encode(["error" => "Must fill all the fields"]);
    }
    else
    {
        $assignMan= assignManager($projectName,$managerUsername);
        if ($assignMan)
        {
            //echo "assign manager successfully";
            //header('location:../views/projectManagement.php');
            echo json_encode(["success"=>true]);
        }
        else 
        {
            echo json_encode(["error"=>"Unsucessful attempt. please select value"]);
        }
    }
    
   

?>