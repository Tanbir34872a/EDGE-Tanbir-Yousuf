<?php
session_start();
require_once('../../model/managerModel/operationmodel.php');

if (isset($_GET['q'])) {
    $q = $_GET['q'];
    $suggestions = getSuggestions($q);
    $suggestionsJson = json_encode($suggestions);
    echo $suggestionsJson;
}

if (isset($_POST['project_name']) && isset($_POST['project_type']) && isset($_POST['priority_task']) && isset($_POST['deadline'])) {
    $projectName = $_POST['project_name'];
    $projectType = $_POST['project_type'];
    $priorityTask = $_POST['priority_task'];
    $deadline = $_POST['deadline'];

    $alph = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    if ($projectName === '' || $projectType === '' || $priorityTask == '' || $deadline == '') {
        echo json_encode(["error" => "Null value! Fill all the fields"]);
    } else if (strpbrk($priorityTask, $alph) === false) {
        echo json_encode(["error" => "Task priority should contain only alphabetic characters with a mix of upper and lower case"]);
    } else {
        $username = $_SESSION['user']['username'];
        $inserted = insertTaskPriority($username, $projectName, $projectType, $priorityTask, $deadline);

        if ($inserted) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Error: Failed to insert task priority"]);
        }
    }
}
?>
