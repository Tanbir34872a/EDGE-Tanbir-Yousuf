<?php

    session_start();
    require_once ("../../model/Developer/project_model.php");

    $NAME = $_REQUEST['name'];
    $summary = $_REQUEST['summary'];
    $github_link = $_REQUEST['github_link'];
    

    if($NAME==''||$summary==''||$github_link=='')
    {
        echo "null value";
    }
    else{

        $addProject = addProject($NAME, $summary,$github_link);

        if ($addProject)
        {
            header('location:../../view/Developer/code.php');
        }
        else 
        {
            echo "can not add Project";
        }
    }


?>