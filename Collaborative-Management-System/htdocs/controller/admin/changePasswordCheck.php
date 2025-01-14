<?php
     session_start();
     require_once ("../../model/admin/adminInfoModel.php");

     $reqPass=$_REQUEST['userPass'];
     $adminReqPass=json_decode($reqPass,true);

     $password = $adminReqPass['password'];
     $nPassword = $adminReqPass['nPassword'];    // user new password
     $rPassword = $adminReqPass['rPassword'];


     $username = $_SESSION['user']['username'];   // current session pass
     $curPass = $_SESSION['user']['password']; 
     $passCharCheck= '!@#$%^&*()+=-[]{}|:;"\'<>,.?/~`';
     
     //validation
     //check the new pass and re-type pass equal
     if (empty($password)|| empty($nPassword)|| empty($rPassword))
    {
        echo json_encode(["error" => "Must fill all the fields"]);
    }
    else if ($password!=$curPass) // current pass check
    {
      echo json_encode(["error" => "Current password does not match!"]);
    }
     else if ($nPassword!=$rPassword)
     {
        echo json_encode(["error"=>"Re-Typed password does not match"]) ;
        
     }
     elseif (strlen($nPassword)<5){
      echo json_encode(["error"=>"Password should be atleast 5 character"]);
    }
      else if(strpbrk($nPassword, $passCharCheck)== false|| strpbrk($nPassword, '0123456789')==false){

      echo json_encode(["error"=>"password should have special character and number"]) ;
       }
     else
     {
      $updatePass= updatePassword($username,$nPassword);
         if ($updatePass){
               echo json_encode(["success" => true]);
            }
         else {
            echo json_encode(["error"=>"Password change unsuccessful!"]) ;
         }
     }
     
?>

