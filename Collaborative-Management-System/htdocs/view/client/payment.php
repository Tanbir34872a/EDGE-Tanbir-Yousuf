<?php
@include 'config.php';
session_start();
require_once('../../model/client/usermodel.php');
if (isset($_SESSION['flag'])) {

    // $conn = getConnection();
    // $username = $_SESSION['username'];
    // $sql = "select * from users where username='$username'";
    // $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_assoc($result);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment</title>
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
            input,select{
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
                width: 400px;
                padding: 10px;
                background: #A1BAE5;
                border: none;
                border-radius: 15px;
            }
            a{
                text-decoration: none;
                color: black;
            
            }
           
        </style>
    </head>

        <body>
                <div class="header">

                    <h3 >Collborative Management System </h3>
                </div>
        <br><br>
        <center>

            

            <h1> Please Pay</h1>

            <div class="container">

                <form action="../../controller/client/clientcontroller.php" method="post">

                    <label for="account">Account</label><br>
                    <input type="text" id="account" name="account" required> <br><br>

                    <label for="amount">Amount</label><br>
                    <input type="number" id="amount" name="amount" required> <br><br>

                    <label for="method">Method</label><br>
                    <select name="method" id="method" required>
                    <option value="NULL">Select method</option>
                    <option value="bkash">bkash</option>
                    <option value="mastercard">mastercard</option>
                    <option value="visa">visa</option>
                    </select> <br> <br>

                    <label for="pid">Bill ID</label><br>
                    <input type="text" id="pid" name="pid" required > <br><br>


                    <input type="submit" class="submit" name="pay" value="Submit">

                </form>
                <br>
                <button><a href="./invoice.php">My Invoice</a></button> <br><br>
            </div>
        </center>


    </body>

    </html>

<?php 
} 
?>