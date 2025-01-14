<?php
// session_start();
// require_once('../model/operationmodel.php');

// $password = $_POST['password'];
// $addMemberId =$_REQUEST['addMemberId'];

// $result = removeMember($addMemberId);

//     if ($result)
//     {
//         header('Location: ../views/removemember.php');
//     }
//     else{

//         echo "Remove member unsecessful";
//     }

session_start();
require_once('../../model/managerModel/operationmodel.php');

$password = $_POST['password'];
$addMemberId = $_POST['addMemberId'];

// Validate the password against the user's stored password
if (!function_exists('isValidPassword')) {
    echo "Error: isValidPassword function not found";
    exit;
}

if (!isValidPassword($password)) {
    echo "Incorrect password";
    exit;
}

$result = removeMember($addMemberId);

if ($result) {
    echo "Member removed successfully";
    header('Location: ../../view/managerView/removeMember.php');
} else {
    echo "Remove member unsuccessful";
}
?>