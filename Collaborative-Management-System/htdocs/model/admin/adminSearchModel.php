<?php
require_once('../../model/db.php');

function searchUserInfo($username)  // return search user info
     {
        $con = getConnection();
        $sql = "select * from userInfo where username Like '$username'";
        $result = mysqli_query($con, $sql);
        
        $user = mysqli_fetch_assoc($result);
        return $user;

     }
     function displayProject($projectName) // fetch all current info and assign maanger
     {
        $con = getConnection();
        $sql = "SELECT p.projectName, p.projectType, p.projectDetails, username FROM adminproject AS p
        JOIN assignmanager AS am ON am.projectId = p.projectId WHERE p.projectName='$projectName'";
        $result = mysqli_query($con, $sql);
        
        $project = mysqli_fetch_assoc($result);
        return $project;
     }
   //search user or project both
   function searchData($searchValue)
   {
    $con = getConnection();

    // Search for user information
    $userSql = "SELECT * FROM userInfo WHERE username LIKE '$searchValue'";
    $userResult = mysqli_query($con, $userSql);
    $userData = mysqli_fetch_assoc($userResult);

    // Search for project information
    $projectSql = "SELECT p.projectName, p.projectType, p.projectDetails, username FROM adminproject AS p
                    JOIN assignmanager AS am ON am.projectId = p.projectId WHERE p.projectName='$searchValue'";
    $projectResult = mysqli_query($con, $projectSql);
    $projectData = mysqli_fetch_assoc($projectResult);

    // Return the first non-empty result
    if (!empty($userData)) {
        return $userData;
    } elseif (!empty($projectData)) {
        return $projectData;
    } else {
        // No data found
        return null;
    }
}
?>