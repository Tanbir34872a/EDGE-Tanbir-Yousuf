<?php
    
    session_start();
    require_once ("../../model/admin/adminOperationModel.php");
    if (isset($_REQUEST['username'],$_REQUEST['newRole']))
    {
        $developerUsername = $_REQUEST['username'];
        $newRole = $_REQUEST['newRole'];
    }

    if(empty($newRole))
    {
        echo "Empty Filled";
    }
    else{
        $updateRole= updateAssignRole($developerUsername,$newRole);

        if ($updateRole)
        {
            echo ("success");
        }
        else 
        {
            echo "assign role unsucessful";
        }
    }

?>

