<?php
    session_start();
    require_once ("../../model/admin/adminOperationModel.php");
    require_once ("../../model/admin/adminInfoModel.php");

    //check project Name
    $projectName = $_REQUEST['projectName'];
    $projectNameAvailability = availableProjectNameCheck($projectName);

    $username = $_REQUEST['username'];
    $userameAvailability = availableUserameCheck($username);

    if ($projectNameAvailability) {
        echo 'Project Name Taken.';
    } 
    else if($userameAvailability)
    {
        echo 'Username Aleady Taken.';
    }


?>