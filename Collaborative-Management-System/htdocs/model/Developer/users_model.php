<?php

require_once("../../model/db.php");

class UsersModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createUser($name, $username, $email, $gender, $dob, $password, $type) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (name, username, email, gender, dob, password, user_type) VALUES ('$name', '$username', '$email', '$gender', '$dob', '$hashedPassword', '$type')";

        $result = mysqli_query($this->conn, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserByUsername($username) {
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($this->conn, $query);
    
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }
    
        return null;
    }
}

?>
