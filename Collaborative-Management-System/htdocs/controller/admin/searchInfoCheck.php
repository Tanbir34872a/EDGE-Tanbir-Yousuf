<?php
    session_start();
    require_once('../../model/admin/adminSearchModel.php');

    //user search data
    $username1 =  $_REQUEST['searchUsername']; // json obj from js
    $searchUsername = json_decode($username1,true);
    $username=$searchUsername['username'];

    //project search
    $projectName1=  $_REQUEST['searchProject']; // json obj from js
    $searchProject = json_decode($projectName1,true);
    $projectName=$searchProject['projectName'];

    //for project and user both
    $searchData1=  $_REQUEST['searchData']; // json obj from js
    $searchedInfo = json_decode($searchData1,true);
    $searchValue=$searchedInfo['searchValue'];

    if ($searchUsername)//search user info
    {
        $showInfo= searchUserInfo($username);
        echo json_encode($showInfo);
    } 
    else if($searchProject) //search project info
    {
        $showInfo= displayProject($projectName);
        echo json_encode($showInfo);
    }
    else if ($searchedInfo)
    {
        $showInfo= searchData($searchValue);
        echo json_encode($showInfo);
    }

?>