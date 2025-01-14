<?php
require_once('../../model/db.php');

function signup($username, $name, $email, $password, $gender, $dob, $userType)
{
    $con = getConnection();
    $sql = "INSERT INTO userinfo (username, name, email, password, gender, dob, userType) 
    VALUES ('$username', '$name', '$email','$password', '$gender', '$dob', '$userType')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}
function login($username, $password)
{
    $con = getConnection();
    $sql = "select * from userinfo where username='{$username}' and password='{$password}'";
    $result = mysqli_query($con, $sql);
    $cnt= mysqli_num_rows($result);

    if($result){
        $user = mysqli_fetch_assoc($result);
        if ($user)
        {
            return true;
        }         
    }
    else{
        return false;
    }
}
function getAllUser(){
    $con = getConnection();
    $sql = "select * from userinfo";
    $result = mysqli_query($con, $sql);
    $users = [];
    
    while($user = mysqli_fetch_assoc($result)){
        array_push($users, $user);
    }
    return $users;
}

function updateuserinfo($name,$email,$gender,$dob,$username) // edit prof
{
    $con = getConnection();
    $sql = "UPDATE userinfo SET name = '$name', email = '$email', gender = '$gender', dob = '$dob' WHERE username = '$username'";
    $result = mysqli_query($con, $sql);
    if($result)
    {
        return true;
    }
    else {
        return false;
    }

    
    function updatePassword ($username, $newPassword) // for change password 
    {
        $con = getConnection();
        $sql = "UPDATE userinfo SET password = '$newPassword' WHERE username = '$username'";
        $result = mysqli_query($con, $sql);

        if ($result)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

}
?> 

