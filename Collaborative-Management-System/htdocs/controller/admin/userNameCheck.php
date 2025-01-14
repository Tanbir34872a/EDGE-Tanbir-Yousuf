<?php
    session_start();
    require_once ("../../model/admin/adminOperationModel.php");
    require_once ("../../model/admin/adminInfoModel.php");

    //check project Name

    $username = $_REQUEST['username'];
    $userameAvailability = availableUserameCheck($username);

    if($userameAvailability)
    {
        echo 'Username Aleady Taken.';
    }


?>