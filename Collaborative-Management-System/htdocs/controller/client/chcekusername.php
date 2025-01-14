<?php
require_once('../../model/client/usermodel.php');

$conn = getConnection();


$query = "SELECT * FROM users WHERE Username ='" . $_POST["username"] . "'";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)>0) {
    echo "exists";
}

?>