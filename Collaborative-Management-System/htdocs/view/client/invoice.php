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
        <title>invoice</title>

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
                <h1>Invoice</h1> <br>
                <table>

                    <thead>
                        <th>serial</th>
                        <th>Bill Id</th>
                        <th>Account</th>
                        <th>Method</th>
                        <th>Amount</th>

                    </thead>

                    <tbody>
                        <?php

                        $select_products = mysqli_query(getConnection(), "SELECT * FROM `payments`");
                        if (mysqli_num_rows($select_products) > 0) {
                            while ($row = mysqli_fetch_assoc($select_products)) {
                        ?>

                                <tr>

                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['pid']; ?></td>
                                    <td><?php echo $row['account']; ?> </td>
                                    <td><?php echo $row['method']; ?> </td>
                                    <td><?php echo $row['amount']; ?>Tk </td>

                                </tr>

                        <?php
                            };
                        }
                        ?>
                    </tbody>
                </table>


            </center>


    </body>

    </html>
<?php } ?>