<?php
session_start();

require_once('../../model/Developer/db_user.php');
require_once('../../model/Developer/users_model.php');

$conn = getConnection();

$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';

if ($username == '' || $password == '') {
    echo "Null value! <br> Please fill in the credentials";
} else {
    $usersModel = new UsersModel($conn);
    $user = $usersModel->getUserByUsername($username);

    if ($user) {
        echo "Stored Password: " . $user['password'] . "<br>";
        echo "Entered Password: " . $password . "<br>";

        if (password_verify($password, $user['password'])) {
            
            $_SESSION['user'] = $user;
            $_SESSION['flag'] = true;
            header('location: ../../view/Developer/loggedDashboard.php');
            exit();
            setcookie('flag', 'true', time()+3600, '/');
        } else {
            
            echo "Invalid password";
        }
    } else {
        
        echo "User not found";
    }
}

$conn->close();
?>
