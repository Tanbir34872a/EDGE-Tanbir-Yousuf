<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once("../../model/Developer/users_model.php");

  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];
  $dob = $_POST["dob"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirmPassword"];
  $type = $_POST["type"];

  if (isEmpty($username)) {
    echo "Username is required.";
  } else if (isEmpty($password)) {
    echo "Password is required.";
  } else if (isEmpty($email)) {
    echo "Email is required.";
  } else if (strlen($password) < 8) {
    echo "Password must be at least 8 characters.";
  } else if (!preg_match("/[@#\$%]/", $password)) {
    echo "Password must contain at least one special character (@, #, $, %)";
  } else if ($password !== $confirmPassword) {
    echo "Passwords do not match.";
  } else if (isEmpty($gender)) {
    echo "Gender is required.";
  } else if (isEmpty($dob)) {
    echo "Date of Birth is required.";
  } else if (isEmpty($type)) {
    echo "User Type is required.";
  } else {
    require_once("../../model/Developer/db_user.php");
    $conn = getConnection();

    $usersModel = new UsersModel($conn);

    $existingUser = $usersModel->getUserByUsername($username);
    if ($existingUser) {
      echo "Username already exists.";
    } else {
      $result = $usersModel->createUser($name, $username, $email, $gender, $dob, $password, $type);

      if ($result) {
        header("Location: ../../view/Developer/login.php?signup=success");
        exit();
      } else {
        echo "Error creating user. Please try again.";
      }
    }

    closeConnection();
  }
} else {
  header("Location: ../../view/Developer/login.php");
  exit();
}

function isEmpty($value) {
  return empty($value) || trim($value) === "";
}

?>

