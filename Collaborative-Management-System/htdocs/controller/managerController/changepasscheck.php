<?php
session_start();
require_once('../../model/managerModel/usermodel.php');

    $password = $_POST['password'];
    $newPassword = $_POST['newPassword'];
    $retypePassword = $_POST['retypePassword'];


    $username = $_SESSION['user']['username'];
    $passwordCheck = '@#$&!0123456789abcdefghijkhmlopqrstuvwxyz';

    if ($newPassword != $retypePassword) {
        echo "Passwords do not match.";
    } elseif (strlen($newPassword) < 4) {
        echo "New password should be at least 4 characters.";
    } elseif (strpbrk($newPassword, $passwordCheck) === false) {
        echo "New password should have alphabets, special characters, and numbers.";
    } else {

    $updatepass = updatePassword($username, $newPassword);
        if ($updatepass) {
            header('location: ../../view/managerView/ManagerMenu.php');
            exit(); // ensuring no further output is sent
        } else {
            echo "Update unsuccessful.";
        }
    }

?>