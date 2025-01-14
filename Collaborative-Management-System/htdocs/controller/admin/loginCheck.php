<?php
    session_start();
    require_once ("../../model/admin/adminInfoModel.php");
    
    // $username=$_REQUEST['username'];
    // $password = $_REQUEST['password'];

    //json data
    $loginDataObj=$_REQUEST['loginData'];
    $loginData= json_decode($loginDataObj,true);
    //hold value
    $username=$loginData['username'];
    $password=$loginData['password'];

    if($username==''||$password=='')
    {
        //echo "null value! <br> please fill the credential"; 
        echo json_encode(["error" => "please fill the credential"]);
    }
    else {
        $user = ['username'=>$username, 'password'=>$password];
        $status1 = loginAdmin($username,$password);
        $status2 = loginManager($username,$password);
        $status3 = loginDeveloper($username,$password);
        $status4 = loginClient($username,$password);
       
        if($status1){
            $_SESSION['user']=$user;
            $_SESSION['flag']=true;

            //set Cookie
            setcookie('username', $username, time()+30000, '/');
            setcookie('password', $password, time()+30000, '/');

            if (isset($_REQUEST['remember']))
            {
                //setcookie('flag', 'true', time()+300, '/');
                setcookie('username', $username, time()+3000, '/');
                setcookie('password', $password, time()+3000, '/');
            }

            //header('location: ../views/loggedDashboard.php');
            echo json_encode(["success"=>true]);
        }
        else if($status2)
        {
            $_SESSION['user']=$user;
            $_SESSION['flag']=true;

            //set Cookie
            setcookie('username', $username, time()+30000, '/');
            setcookie('password', $password, time()+30000, '/');

            if (isset($_REQUEST['remember']))
            {
                //setcookie('flag', 'true', time()+300, '/');
                setcookie('username', $username, time()+3000, '/');
                setcookie('password', $password, time()+3000, '/');
            }
            echo json_encode(["success1"=>true]);
        }
        else if($status3)
        {
            $_SESSION['user']=$user;
            $_SESSION['flag']=true;

            //set Cookie
            setcookie('username', $username, time()+30000, '/');
            setcookie('password', $password, time()+30000, '/');

            if (isset($_REQUEST['remember']))
            {
                //setcookie('flag', 'true', time()+300, '/');
                setcookie('username', $username, time()+3000, '/');
                setcookie('password', $password, time()+3000, '/');
            }
            echo json_encode(["success2"=>true]);
        }
        else if($status4)
        {
            $_SESSION['user']=$user;
            $_SESSION['flag']=true;

            //set Cookie
            setcookie('username', $username, time()+30000, '/');
            setcookie('password', $password, time()+30000, '/');

            if (isset($_REQUEST['remember']))
            {
                setcookie('username', $username, time()+3000, '/');
                setcookie('password', $password, time()+3000, '/');
            }

            echo json_encode(["success3"=>true]);
        }
        else{
            //echo "invalid username or password";
            echo json_encode(["error" => "invalid username or password"]);
        }
    }
    
    
?>

