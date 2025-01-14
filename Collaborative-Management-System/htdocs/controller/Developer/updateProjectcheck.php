<?php

    session_start();
    require_once ("../../model//Developerproject_model.php");

    $NAME = $_REQUEST['name'];
    $summary = $_REQUEST['summary'];
    $github_link = $_REQUEST['github_link'];
    

    if($NAME==''||$summary==''||$github_link=='')
    {
        echo "null value";
    }
    else{

        $updateProject = updateProject($NAME,$summary,$github_link);

        if ($updateProject)
        {
            header('location:../../view/Developer/code.php');
        }
        else 
        {
            echo "can not update project";
        }
    }


?>