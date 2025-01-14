<?php
session_start();
@include '../../model/db.php';
if (isset($_SESSION['flag'])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Overview</title>
        <style>
            table,
            th,
            td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 10px;
                width: 700px;
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
            th{
                background: #C8E5A1;
            }
        </style>

    </head>

    <body>

        <div class="header">

            <h3 >Collborative Management System </h3>
        </div>



        <div class="container">



            <center>

                <h1>Project Overview</h1> <br><br><br>

                <section class="">

                    <table>

                        <thead>
                            <th>Project name</th>
                            <th>Progress</th>
                            <th>Completed work</th>
                            <th>Remaining work</th>
                        </thead>

                        <tbody>
                            <?php

                            $select_products = mysqli_query(getConnection(), "SELECT * FROM `overviews`");
                            if (mysqli_num_rows($select_products) > 0) {
                                while ($row = mysqli_fetch_assoc($select_products)) {
                            ?>

                                    <tr>

                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['percent']; ?> %</td>
                                        <td><?php echo $row['complete']; ?></td>
                                        <td><?php echo $row['remain']; ?></td>

                                    </tr>

                            <?php
                                };
                            }
                            ?>
                        </tbody>
                    </table>

                </section>
            </center>


    </body>

    </html>
<?php 
} 
?>