<?php
session_start();
require_once('../../model/managerModel/operationmodel.php');

// Check if the required parameters are set and not empty
if (isset($_POST['project_name'], $_POST['deadline']) && !empty($_POST['project_name']) && !empty($_POST['deadline'])) {
    $projectName = $_POST['project_name'];
    $newDeadline = $_POST['deadline'];

    $updatedeadline = updateDeadline($projectName, $newDeadline);

   // $response = array();

    if ($updatedeadline) {
        echo json_encode(["success" => true]);
    } else {
        // $response['success'] = false;
        // $response['message'] = "Update unsuccessful";
        echo json_encode(["error" => "Error: Update unsuccessful"]);
    }
} else {
    // $response['success'] = false;
    // $response['message'] = "Invalid or missing parameters";
    echo json_encode(["error" => "Error: invalid or missing parameters "]);
}

// Send the JSON response back to the client
//header('Content-Type: application/json');
//echo json_encode($response);
exit; 
?>
