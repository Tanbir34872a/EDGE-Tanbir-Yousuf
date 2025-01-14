<?php
        require_once("../../model/Developer/users_model.php");
        $currentPassword = $_POST["current_password"];
        $newPassword = $_POST["new_password"];
        $retypePassword = $_POST["retype_password"];
        
        if ($currentPassword === $newPassword) {
            echo "New Password should not be the same as the Current Password.";
        }

        if ($newPassword !== $retypePassword) {
            echo "New Password does not match with the Retyped Password.";
        }
        else {
            echo "Password change successful!";
        }

    ?>