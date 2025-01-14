<?php
session_start();
require_once('../../model/managerModel/operationmodel.php');

if (isset($_SESSION['user']['username'])) {
    $username = $_SESSION['user']['username'];

    $projectInfo = displayAllProjectInfo($username);

    for ($i = 0; $i < count($projectInfo); $i++) {
        echo "Project Name: " . $projectInfo[$i]['projectName'] . "<br>";
        echo "Project Type: " . $projectInfo[$i]['projectType'] . "<br>";
        echo "Priority Task: " . $projectInfo[$i]['priorityTask'] . "<br>";
        echo "Deadline: " . $projectInfo[$i]['deadline'] . "<br><hr>";
    }
} else {
    echo "Username not found in the session.";
}
?>