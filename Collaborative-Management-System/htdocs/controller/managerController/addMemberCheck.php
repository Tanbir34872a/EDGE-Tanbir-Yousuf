<?php
    // session_start();
    // require_once('../model/operationmodel.php');

    // $role = $_POST['Role'];
    // $username = $_POST['username'];

    // $result = addMember($username, $role);

    // if ($result) {
    //     header('Location: ../views/addMember.php');
    // } else {
    //     echo "Adding member unsuccessful";
    // }


    session_start();
    require_once('../../model/managerModel/operationmodel.php');
    
    // Add Member
    if (isset($_POST['Role']) && isset($_POST['username'])) {
        $role = $_POST['Role'];
        $username = $_POST['username'];
    
        // Check if the member already exists
        $existingMember = isMemberAdded($username);
    
        if (!$existingMember) {
            $result = addMember($username, $role);
    
            if ($result) {
                header('Location: ../../view/managerView/addMember.php');
            } else {
                echo "Adding member unsuccessful";
            }
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Member already added']);
        }
    } 
    
    // Check and Handle aaddMember
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    
        $result = aaddMember($username);
    
        if ($username === "Select user") {
            echo "empty field!";
        } elseif ($result) {
            echo "You can add this member";
            return true;
        } else {
            echo "Member already added";
            return false;
        }
    }

    // if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //     // Retrieve input parameters from the query string
    //     $developer_name = isset($_GET['developer_name']) ? $_GET['developer_name'] : '';
    
    //     // Validate input (you may want to add more validation based on your requirements)
    //     if (empty($developer_name)) {
    //         echo "Invalid input. Both username and developer_name are required.";
    //         exit;
    //     }
    
    //     // Call the checkDeveloper function
    //     $result = checkDeveloper($developer_name);
    
    //     // Output the result
    //     if ($result) {
    //         echo "Developer processed successfully.";
    //     } else {
    //         echo "Error processing developer.";
    //     }
    // }
?>

