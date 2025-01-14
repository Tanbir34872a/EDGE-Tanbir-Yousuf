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
        <title>feedback</title>

        <style>
            table,
            th,
            td {
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>

    </head>

    <body>




        <div class="container">

            <center>
                <h1>My feedback's</h1> <br>
                <section class="display-product-table">

                    <table>

                        <thead>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Feedback</th>

                        </thead>

                        <tbody>
                            <?php

                            $select_products = mysqli_query(getConnection(), "SELECT * FROM `feedbacks`");
                            if (mysqli_num_rows($select_products) > 0) {
                                while ($row = mysqli_fetch_assoc($select_products)) {
                            ?>

                                    <tr>

                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['country']; ?> </td>
                                        <td><?php echo $row['opinion']; ?> </td>

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
<?php } ?>