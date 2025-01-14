<?php
    require_once('../../model/db.php');
    //session_start();

    function signup($username,$name,$email, $password,$gender,$dob,$userType)
    {
        $con= getConnection();
        $sql= "INSERT INTO userinfo (username, name, email, password, gender, dob, userType) VALUES('$username','$name','$email', '$password','$gender','$dob','$userType')";
        $result= mysqli_query($con, $sql);
        if($result)
        {
            return true;
        }
        else{
            return false; 
        }
     }

    function loginAdmin($username, $password)
    {
        $con = getConnection();
        $sql = "select * from userinfo where username='{$username}' and password='{$password}' and userType='Admin'";
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
    function loginManager($username, $password)
    {
        $con = getConnection();
        $sql = "select * from userinfo where username='{$username}' and password='{$password}' and userType='Manager'";
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
    function loginDeveloper($username, $password)
    {
        $con = getConnection();
        $sql = "select * from userinfo where username='{$username}' and password='{$password}' and userType='Developer'";
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
    function loginClient($username, $password)
    {
        $con = getConnection();
        $sql = "select * from userinfo where username='{$username}' and password='{$password}' and userType='Client'";
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

    function updateAdminInfo($name,$email,$gender,$dob,$username)
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
    }

    function updatePassword ($username, $nPassword)
    {
        $con = getConnection();
        $sql = "UPDATE userinfo SET password = '$nPassword' WHERE username = '$username'";
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
    //check project availability
    function availableUserameCheck($username)
     {
        $con = getConnection();
        $sql = "SELECT * FROM userinfo where username='{$username}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            return true;
        } else {
            return false;
        }
     }
?>