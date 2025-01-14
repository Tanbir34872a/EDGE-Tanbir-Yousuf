<?php
require_once('../../model/db.php');

function insertUser($userinfo)
{
    $conn = getConnection();
    $sql = "insert into users values('','{$userinfo['username']}','{$userinfo['email']}','{$userinfo['phone']}','{$userinfo['dob']}','{$userinfo['address']}','{$userinfo['usertype']}','{$userinfo['userpassword']}','{$userinfo['confirmpassword']}')";
    $row = mysqli_query($conn, $sql);
    if ($row) {
        return true;
    } else {
        return false;
    }
}


function validateUser($email, $password)
{
    $conn = getConnection();
    $sql = "select * from users where email ='$email' and userpassword ='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (count($row) > 0) {
        return true;
    } else {
        return false;
    }
}

?>