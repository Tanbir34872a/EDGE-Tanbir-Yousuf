<?php
session_start();
require_once('../../model/client/usermodel.php');

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
        <title>Client</title>

        <style>
            a {
                text-decoration: none;
            }
        </style>


    </head>

    <body>
        <center>
            <div class="welcome">
                <h1>Welcome <?php $row['username'] ?></h1>
            </div>

            <div class="profile">
                <button> <a href="./profile.php">My Profile</a> </button>
                <button> <a href="../../controller/client/logout.php">Logout</a> </button>
            </div>
        </center>


        <section class="main">


            <div class="card">
                <h1>Project overview</h1>
                <button> <a href="./overview.php">GO</a> </button>
            </div>

            <div class="card">
                <h1>Feedback</h1>
                <button> <a href="./feedback.php">GO</a> </button>
            </div>

            <div class="card">
                <h1>Customer payment details</h1>
                <button> <a href="payment.php">GO</a> </button>
            </div>



        </section><br><br><br><br>


        <!-- jquery ajax -->
    </body>



    </html>

<?php 
} 
?>