<?php

include "db_connection.php";
include 'common_functions.php';
$conn = OpenDBconnection();

// Receive and sanitize input
$username = mysqli_real_escape_string($conn, $_POST['username']);
$nickname = mysqli_real_escape_string($conn, $_POST['nickname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password_match = mysqli_real_escape_string($conn, $_POST['password_match']);
$date = date('Y-m-d H:i:s');

if($password !== $password_match)
    echo "The password doesn't match";

if(!isValidEmail($email))
    echo "Email is not valid";



// write to db
$sql = "INSERT INTO users (username, nickname, email, password) VALUES ('$username', '$nickname', '$email', '$password')";
$result = $conn->query($sql);


CloseDBconnection($conn);


RedirectTo('registration_success.php');

?>