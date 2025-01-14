<?php
session_start();
//require_once('../../model/client/usermodel.php');
require_once('../../model/db.php');

if (isset($_SESSION['flag'])) {

    $conn = getConnection();
    $username = $_COOKIE['username'];
    $sql = "select * from users where username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>profile</title>
    </head>

    <body>

        <div class="card">

            <div class="profile">

                <center>
                    <h1>Profile</h1>
                </center><br>
                <h2>Username : <?= $row['username'] ?></h2>
                <h2>Email : <?= $row['email'] ?></h2>
                <h2>Phone : <?= $row['phone'] ?></h2>
                <h2>Date of birth:  <?= $row['dob'] ?></h2>
                <h2>Address: <?= $row['address'] ?></h2>
                <h2>Usertype : <?= $row['usertype'] ?></h2>
                <br><br>

                <center><button><a href="./updateprofile.php?edit=<?php echo $row['id']; ?>">Update</a></button></center>

            </div>

        </div>
    </body>

    </html>

<?php
}
?>