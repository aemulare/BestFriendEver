<?php

include 'common_functions.php';


$username = $nickname = $email = $password = $password_match = "";
// Receive and sanitize input
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST) )
{
    $username = test_input($_POST['username']);
    $nickname = test_input($_POST['nickname']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $password_match = test_input($_POST['password_match']);
    $date = date('Y-m-d H:i:s'); // set the date as now

    if($password === $password_match && isValidEmail($email))
    {
        $conn = OpenDBconnection();

        // encrypt password
        $pwd = sha1($password);

        // write to db
        $sql = "INSERT INTO users (username, nickname, email, password) VALUES ('$username', '$nickname', '$email', '$pwd')";
        $result = $conn->query($sql);

        CloseDBconnection($conn);
        RedirectTo('registration_success.php?nickname='.$nickname);
    }
}
else
RedirectTo('form_registration.php');

?>