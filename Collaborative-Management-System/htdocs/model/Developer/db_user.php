<?php

function getConnection()
{
    $host = 'localhost';
    $username = 'root';
    $password = '';  
    $database = 'collaborative_management_system';

    $con = mysqli_connect($host, $username, $password, $database);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $con;
}

?>
