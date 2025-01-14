<?php
require_once('../../model/db.php');

function isProjectNameExits($projectName) //check Project name availability
{
    $con = getConnection();
        $sql = "SELECT * FROM adminproject where projectName='{$projectName}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            return true;
        } else {
            return false;
        }
}
function createProject($projectName,$projectType,$projectDetails) // push project details into db
    {

        $con= getConnection();
        if(isProjectNameExits($projectName))
        {
            return false;
        }
        else{
            $sql= "INSERT INTO adminproject (projectName, projectType, projectDetails) VALUES('$projectName','$projectType','$projectDetails')";
            $result= mysqli_query($con, $sql);
            if($result)
            {
                return true;
            }
            else{
                return false;
            }
        }
        
     }

     function displayAllManagerInfo() // display all manager information
     {
        $con = getConnection();
        $sql = "select * from userinfo where userType = 'Manager'";
        $result = mysqli_query($con, $sql);
        $users = [];
        
        while($user = mysqli_fetch_assoc($result)){
            array_push($users, $user);
        }
        return $users;
     }

     function displayAllDeveloperInfo() // display all developer information
     {
        $con = getConnection();
        $sql = "select * from userinfo where userType = 'Developer'";
        $result = mysqli_query($con, $sql);
        $users = [];
        
        while($user = mysqli_fetch_assoc($result)){
            array_push($users, $user);
        }
        return $users;
     }

     function displayAllProjectInfo()  //all project info
     {
        $con = getConnection();
        $sql = "select * from adminproject";
        $result = mysqli_query($con, $sql);
        $projects = [];
        
        while($project = mysqli_fetch_assoc($result)){
            array_push($projects, $project);
        }
        return $projects;
     }

     function assignManager($projectName,$managerUsername)  //insert projet ifo and manager id into database
     {
        $con = getConnection();
        $sql = "INSERT INTO assignmanager (projectId, username) VALUES('$projectName','$managerUsername')";
        $result = mysqli_query($con, $sql);
        if($result)
        {
            return true;
        }
        else{
            return false;
        }
     }

     function updateAssignRole($username,$newRole) //update role for developer team member table
     {
        $con = getConnection();
        $sql = "UPDATE team_member SET role = '$newRole' WHERE username = '$username'";
        $result = mysqli_query($con, $sql);

        if ($result)
        {
            return true;
        }
        else 
        {
            return false;
        }
     }

     function displayAlluserInfo() // fetch all developer and manager info
     {
        $con = getConnection();
        $sql = "select * from userinfo where userType = 'Manager' or userType= 'Developer'";
        $result = mysqli_query($con, $sql);
        $projects = [];
        
        while($project = mysqli_fetch_assoc($result)){
            array_push($projects, $project);
        }
        return $projects;
     }

     function updateAccountUserType($username, $name, $userType) //Update userType
     {
        $con = getConnection();
        $sql = "UPDATE userinfo SET userType= '$userType',name='$name',username='$username' WHERE username = '$username'";
        $result = mysqli_query($con, $sql);

        if ($result)
        {
            return true;
        }
        else 
        {
            return false;
        }
     }
     function removeAccount($username) //remove user
     {
        $con = getConnection();
        $sql = "delete from userinfo where username = '$username'";
        $result = mysqli_query($con, $sql);

        if ($result)
        {
            return true;
        }
        else 
        {
            return false;
        }
     }

     function displayAllCurrentProject() // fetch all current info and assign maanger
     {
        $con = getConnection();
        $sql = "SELECT p.projectName, p.projectType, p.projectDetails, username FROM adminproject AS p
                JOIN assignmanager AS am ON am.projectId = p.projectId";
        $result = mysqli_query($con, $sql);
        $projects = [];
        
        while($project = mysqli_fetch_assoc($result)){
            array_push($projects, $project);
        }
        return $projects;
     }

     function displayAllDeveloperRole() // fetch all developer assigned Role
     {
        $con = getConnection();
        $sql = "select * from team_member";
        $result = mysqli_query($con, $sql);
        $roles = [];
        
        while($role = mysqli_fetch_assoc($result)){
            array_push($roles, $role);
        }
        return $roles;
     }
     //display all the created project info
     function getAllprojectInfo()
     {
        $con = getConnection();
        $sql = "select * from adminproject";
        $result = mysqli_query($con, $sql);
        $projects = [];
        
        while($project = mysqli_fetch_assoc($result)){
            array_push($projects, $project);
        }
        return $projects;
     }
     //check available project name
     function availableProjectNameCheck($projectName)
     {
        $con = getConnection();
        $sql = "SELECT * FROM adminproject where projectName='{$projectName}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            return true;
        } else {
            return false;
        }
     }

?>