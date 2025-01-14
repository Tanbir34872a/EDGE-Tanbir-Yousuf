<?php
    require_once ("../../model/admin/adminInfoModel.php");
    
    $username = $_REQUEST['username'];

    if(isset($_REQUEST['name'],$_REQUEST['email'],$_REQUEST['username'],$_REQUEST['password'],$_REQUEST['confirmPassword'],
             $_REQUEST['gender'],$_REQUEST['gender'],$_REQUEST['dob'],$_REQUEST['userType']))
    {
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $confirmPassword = $_REQUEST['confirmPassword'];
        $gender = $_REQUEST['gender'];
        $dob = $_REQUEST['dob'];
        $userType=$_REQUEST['userType'];
    }
    
    $ucharCheck= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()+=-[]{}|:;"\'<>,.?/~`';
    $passCharCheck= '!@#$%^&*()+=-[]{}|:;"\'<>,.?/~`';

    // username validation
    if($username == '' || $name == '' || $email == '' || $password == ''|| $confirmPassword == ''|| $gender == '' || $dob == ''|| $userType==''){

        echo "null value! fill all the fields";
    }
    else if ($password!=$confirmPassword)
    {
        echo "confirm password do not match";
    }
    else if (!ctype_alpha($username)) // will check wheather the username is alphabetic or not
    {
        echo "Username contain only alphabetic character";
    }
    elseif (strlen($username)<5){
        echo "username should be atleast 5 character"; 
    }
    else if (strpbrk($username, $ucharCheck)!== false||strpbrk($username, ' ') !== false)
    {
        echo "username contain only lowercase";
    }
    //password validation
    elseif (strlen($password)<5){
        echo "Password should be atleast 5 character"; 
    }
    else if(strpbrk($password, $passCharCheck)== false|| strpbrk($password, '0123456789')==false){
        echo "password should have special character and number";
    }
    else{

        //$user = ['name' => $name, 'password' => $password, 'username' => $username, 'email' => $email, 'gender' => $gender, 'dob' => $dob,'userType'=> $userType];
        
        $status= signup($username,$name,$email, $password,$gender,$dob,$userType);
        if($status){
           // $_SESSION['user'] = true;
            header('location: ../../view/login.php');
        }
        else{
            echo "username already taken! try another one";
        }
        
    }
?>