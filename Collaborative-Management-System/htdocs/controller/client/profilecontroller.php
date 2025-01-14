<?php
session_start();
@include '../../model/db.php';
$conn = getConnection();
if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];

if (isset($_POST['submit'])) {


    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    $query = "update users set username='$username',email='$email',phone='$phone',dob='$dob',address='$address' WHERE id = $edit_id ";

    $query_run=mysqli_query($conn,$query);


    if($query_run){
        header("location: ../../view/client/profile.php");
    }
    else{
        header("location: ../../view/client/login.php");
    }

}
}

?>