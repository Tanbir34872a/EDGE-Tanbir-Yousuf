<?php
session_start();
//require_once('../../model/client/usermodel.php');
require_once('../../model/db.php');
?>

<?php
if (isset($_SESSION['flag'])) {

$conn = getConnection();
$username = $_COOKIE['username'];
$sql = "select * from users where username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>


<html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile</title>
</head>



<body>
    <br><br><br>
    <div>
        <?php

        if (isset($_GET['edit'])) {
            $edit_id = $_GET['edit'];
            $edit_query = mysqli_query($conn, "SELECT * FROM `users` WHERE id = $edit_id");
            if (mysqli_num_rows($edit_query) > 0) {
                while ($fetch_edit = mysqli_fetch_assoc($edit_query)) {
        ?>


                    <form action="../../controller/client/profilecontroller.php?edit=<?php echo $row['id']; ?>" method="POST">



                        <label for="name">Name</label>
                        <input type="text" name="username" value="<?php echo $fetch_edit['username']; ?>" placeholder="" required>


                        <label for="email">email</label>
                        <input type="text" name="email" value="<?php echo $fetch_edit['email']; ?>" placeholder="" required>


                        <label for="phone">phone</label>
                        <input type="text" name="phone" value="<?php echo $fetch_edit['phone']; ?>" placeholder="" required>


                        <label for="dob">dob</label>
                        <input type="text" name="dob" value="<?php echo $fetch_edit['dob']; ?>" placeholder="" required>


                        <label for="address">address</label>
                        <input type="text" name="address" value="<?php echo $fetch_edit['address']; ?>" placeholder="" required>


                       



                        <input type="submit" name="submit" value="Update" required>


                    </form>
        <?php
                };
            };
        };
        ?>

    </div>

</body>

<?php } ?>