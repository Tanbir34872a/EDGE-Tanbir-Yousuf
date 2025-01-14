<?php
require_once('../../model/db.php');

function displayAllProjectInfo($username) // Fetch all project information
{
    $con = getConnection();
    $sql = "SELECT am.projectName, am.projectType, am.projectDetails
    FROM adminproject AS am
    JOIN assignmanager AS p ON p.projectId = am.projectId
    WHERE p.username = '$username'";
    $result = mysqli_query($con, $sql);
    $projects = [];

    if ($result) {
        while ($row_data = mysqli_fetch_assoc($result)) {
            echo "Project Name: " . $row_data['projectName'] . "<br>";
            echo "Project Type: " . $row_data['projectType'] . "<br>";
            echo "Details     : " . $row_data['projectDetails'] . "<br><br>";
        }
        return $projects; // return the fetched projects
    } else {
        echo "Error: " . mysqli_error($con);
        return []; // return an empty array in case of an error
    }
}

function getProjectName($username) // Fetch project names for dropdown
{
    $con = getConnection();
    $sql = "SELECT am.projectName, am.projectType, am.projectDetails
    FROM adminproject AS am
    JOIN assignmanager AS p ON p.projectId = am.projectId
    WHERE p.username = '$username'";
    $result = mysqli_query($con, $sql);
    $projectNames = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $projectNames[] = $row['projectName'];
    }
    return $projectNames;
}

function getProjectType($username) { // Fetch project types for dropdown
    $con = getConnection();
    $sql = "SELECT am.projectName, am.projectType, am.projectDetails
    FROM adminproject AS am
    JOIN assignmanager AS p ON p.projectId = am.projectId
    WHERE p.username = '$username'";
    $result = mysqli_query($con, $sql);
    $projectTypes = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $projectTypes[] = $row['projectType'];
    }
    return $projectTypes;
}

function getAllTaskInfo() { // get deadline along with project name and type
    $con = getConnection();
    $sql = "SELECT * FROM setpriority ";
    $result = mysqli_query($con, $sql);
    $taskInfo = []; 

    if ($result) {
        while ($row_data = mysqli_fetch_assoc($result)) {

            array_push($taskInfo, $row_data);
        
        }
    return $taskInfo; 
    }else {
        echo "Error: " . mysqli_error($con);
        return []; 
    }
}

function searchProject($project_name) {
    $con = getConnection();
    $sql = "SELECT * FROM setpriority WHERE project_name = '$project_name'";
    $result = mysqli_query($con, $sql);
    $projectTaskInfo = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $projectTaskInfo[] = $row;
    }

    return $projectTaskInfo;
}


function insertTaskPriority($username,$projectName, $projectType, $priorityTask, $deadline)
{
    // $con = getConnection();
    // $insert_query = "INSERT INTO setpriority (assignManID, project_name, project_type, priority_task, deadline)
    //                 VALUES ('$projectName', '$projectType', '$priorityTask', '$deadline')";
    // $result = mysqli_query($con, $insert_query);

    // return $result;

    $con = getConnection();

    // Fetch the necessary data from adminproject and assignmanager based on username
    $select_query = "SELECT p.assignManID, am.projectName, am.projectType, am.projectDetails
                    FROM adminproject AS am
                    JOIN assignmanager AS p ON p.projectId = am.projectId
                    WHERE p.username = '$username'";

    $result = mysqli_query($con, $select_query);

    // Check if the query executed successfully
    if (!$result) {
        echo "Error: " . mysqli_error($con);
        return false;
    }

    // Fetch the row
    $row = mysqli_fetch_assoc($result);

    // Check if the row was fetched
    if (!$row) {
        echo "Error: No project details found for the given username.";
        return false;
    }

    // Extract the data from the fetched row
    $assignManID = $row['assignManID'];

    // Insert into setpriority table
    $insert_query = "INSERT INTO setpriority (assignManID, project_name, project_type, priority_task, deadline)
                     VALUES ('$assignManID', '$projectName', '$projectType', '$priorityTask', '$deadline')";

    $result = mysqli_query($con, $insert_query);

    // Check if the insertion was successful
    if ($result) {
        return true;
    } else {
        echo "Error: " . mysqli_error($con);
        return false;
    }
}

function updateDeadline($projectName ,$newDeadline)
{
    $con = getConnection();
    $sql = "UPDATE setpriority SET deadline = '$newDeadline' WHERE project_name = '$projectName'";
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
    function getDeveloperInfo(){
        $con = getConnection();
        $sql = "SELECT * FROM userinfo WHERE userType = 'Developer'";
        $result = mysqli_query($con, $sql);
        $users = [];
        
        while($user = mysqli_fetch_assoc($result)){
            array_push($users, $user);
        }
        return $users;
    }

    function isMemberAdded($username)
{
    $con = getConnection();
    $sql = "SELECT * FROM addmember WHERE username='{$username}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        return true; // Member already added
    } else {
        return false; // Member not added
    }
}

function addMember($username, $role)
{
    $con = getConnection();
    
    if (isMemberAdded($username)) {
        return false; // Member already added
    }

    $insert_query = "INSERT INTO addmember (username, role) VALUES ('$username', '$role')";
    $result = mysqli_query($con, $insert_query);

    return $result;
}

function aaddMember($username)
{
    // $con = getConnection();

    // // Check if the member with the same username already exists
    // $check_query = "SELECT * FROM addmember WHERE username = '$username'";
    // $check_result = mysqli_query($con, $check_query);

    // if (mysqli_num_rows($check_result) > 0) {
    //     // Member with the same username already exists
    //     return "Member with the username '$username' is already added.";
    // }

    // // If not, proceed to add the member
    // $insert_query = "INSERT INTO addmember (username, role ) VALUES ('$username', '$role')";
    // $result = mysqli_query($con, $insert_query);

    // if ($result) {
    //     return true;
    // } else {
    //     return false;
    // }
    {
        $con = getConnection();
        $sql = "SELECT * FROM addmember where username='{$username}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            return false;
        } else {
            return true;
        }
    }
}

function getaddedmember($username) {
    $con = getConnection();
    $sql = "SELECT * FROM addmember WHERE username = '$username'";
    $result = mysqli_query($con, $sql);
    $addedmember = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $addedmember[] = $row;
    }

    return $addedmember;
}


    function getAllTeamMember()
    {
        $con = getConnection();
        $sql = "SELECT * FROM addmember";
        $result = mysqli_query($con, $sql);
        $users = [];
        
        while($user = mysqli_fetch_assoc($result)){
            array_push($users, $user);
        }
        return $users;
    }

    function removeMember($addMemberId)
    {
        $con = getConnection();
        $insert_query = "delete from addmember where addMemberId = '$addMemberId'";
        $result = mysqli_query($con, $insert_query);
        if ($result)
        {
            return true;
        }
        else{
            return false;
        }
    }

    function getUserToRemove($username)
{
    $con = getConnection();
    $sql = "SELECT * FROM userinfo WHERE username = '$username'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $user = mysqli_fetch_assoc($result);
        return $user;
    } else {
        return false;
    }
}

function getSuggestions($q)
{
    $con = getConnection();
    $sql = "SELECT q FROM suggestion WHERE q LIKE '$q%'";
    $result = mysqli_query($con, $sql);
    $suggestions = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $suggestions[] = $row['q'];
    }

    return $suggestions;
}

function getDevelopers(){

    $con = getConnection();
    $sql = "SELECT * FROM developers";
    $result = mysqli_query($con, $sql);
    $users = [];
    
    while($user = mysqli_fetch_assoc($result)){
        array_push($users, $user);
    }
    return $users;
}

function newDeveloper($developer_name){

    $con = getConnection();
    $sql = "SELECT * FROM developers WHERE developer_name = '$developer_name'";
    $result = mysqli_query($con, $sql);
    $users = [];
    
    while($user = mysqli_fetch_assoc($result)){
        array_push($users, $user);
    }
    return $users;
}
function checkDeveloper($developer_name)
{
    $con = getConnection();

    // Check if the developer with the same name exists
    $check_query = "SELECT * FROM developers WHERE developer_name = '$developer_name'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Developer with the same name exists, remove from developers table
        $delete_query = "DELETE FROM developers WHERE developer_name = '$developer_name'";
        $delete_result = mysqli_query($con, $delete_query);

        if (!$delete_result) {
            return false; // Deletion failed
        }

        // Proceed to add the member to addmember table
        $insert_query = "INSERT INTO addmember (username, role) VALUES ('$username', 'developer')";
        $insert_result = mysqli_query($con, $insert_query);

        return $insert_result;
    }

    return true; // Developer found and processed
}

function isValidPassword($password)
{
    $con = getConnection();
    $sql = "SELECT password FROM userinfo WHERE password = '$password'";
    $result = mysqli_query($con, $sql);

    return $result && mysqli_num_rows($result) > 0;
}


function getTaskPrioritiesByUsername($username) {
    $con = getConnection();

    $query = "SELECT sp.project_name, sp.project_type, sp.priority_task, sp.deadline
              FROM setpriority sp
              JOIN assignmanager am ON sp.assignManID = am.assignManID
              WHERE am.username = '$username'";

    $result = mysqli_query($con, $query);

    if (!$result) {
        echo "Error: " . mysqli_error($con);
        return false;
    }

    $tasks = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $tasks[] = $row;
    }

    return $tasks;
}

 ?>  

