<?php
    session_start();
    require_once ("../../model/admin/adminOperationModel.php");

    $CharCheck= '!@#$%^&*()+=-[]{}|:;"\'<>,.?/~`';

    // if (isset($_REQUEST['projectName'],$_REQUEST['projectType'],$_REQUEST['projectDetails']))
    // {
    //     $projectName = $_REQUEST['projectName'];
    //     $projectType = $_REQUEST['projectType'];
    //     $projectDetails = $_REQUEST['projectDetails'];
    // }
    //json data from js
    $project= $_REQUEST['projectData'];
    $projectData= json_decode($project,true);
    //hold json data
    $projectName=$projectData['projectName'];
    $projectType=$projectData['projectType'];
    $projectDetails=$projectData['projectDetails'];

    if (empty($projectName)|| empty($projectType)|| empty($projectDetails))
    {
        echo json_encode(["error" => "Must fill all the fields"]);
    }
    else if(strpbrk($projectType, $CharCheck)!== false|| strpbrk($projectType, '0123456789')!==false)
    {
        echo json_encode(["error" => "Project Type cannot contain special characters or numbers"]);
    }
    else{

        $createProject = createProject($projectName,$projectType,$projectDetails);

        if ($createProject)
        {
            echo json_encode(["success" => true]);
            //header('location:../views/projectManagement.php');
        }
        else 
        {
            echo json_encode(["error" => "Project Name Aready Taken"]);
        }
    }
    

    

?>

