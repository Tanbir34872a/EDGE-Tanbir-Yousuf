<?php
@include 'config.php';
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
        
        <title>Feedback</title>
        <style>
            table,
            th,
            td {
                border: 1px solid black;
                border-collapse: collapse;
            }

            body{
                margin: 0px;
                background:#F7F7F7;
            }
            .header{
                background: #333;
                color: #fff;
                height: 50px;
                display: flex;
                justify-content: center;
            }
            .container form{
                border-radius: 10px;
                width: 400px;
                padding: 5%;
                box-shadow: 0px 10px 45px -3px rgba(0,0,0,0.1);
                
            }
            input{
                width: 250px;
                height: 30px;
            }
            textarea{
                width: 250px;
            }
            .submit{
                background: #C8E5A1;
                border: none;
            }
            button{
                width: 250px;
                padding: 5PX;
                background: #A1BAE5;
                border: none;
            }
            a{
                text-decoration: none;
                color: black;
            
            }
        </style>
    </head>

    <body class="bg">
        <div class="header">

                <h3 >Collborative Management System </h3>
        </div>
        <center>
            
            

            <h1> Send Your Feedback</h1>

            <div class="container">

                <form action="../../controller/client/clientcontroller.php" method="post">

                    <label for="fname">Username</label><br>
                    <input type="text" id="name" name="name" value="<?= $row['username'] ?>" required> <br><br>

                    <label for="lname">Email</label><br>
                    <input type="text" id="email" name="email" value="<?= $row['email'] ?>" required> <br><br>

                    <label for="country">Country</label><br>
                    <input type="text" id="country" name="country" required><br><br>


                    <label for="subject">Opinion</label><br>
                    <textarea id="opinion" name="opinion" placeholder="Write something.." style="height:50px" required></textarea> <br><br>

                    <input type="submit" class="submit" name="feedback" value="Submit">
                    <br><br>
                    <p>click <b>My feedback</b> to see your feedbacks</p>
                    <button><a href="./feedbackview.php">My feedbacks</a></button> <br><br>
                </form>
                
            </div>
        </center>


    </body>

    </html>

<?php 
} 
?>