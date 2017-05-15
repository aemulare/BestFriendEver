<?php
include 'common_functions.php';
session_start();

$error='';
$id = $password = $email = "";


if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST) )
{
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);

    if(!(empty($email) || empty($password)))
    {
        $conn = OpenDBconnection();
        $sql = " SELECT id FROM users WHERE email = '$email' AND password = sha1($password) ";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        $id = $data['id'];
        if ($result !== false)
        {
            $_SESSION['time'] = time();
            $_SESSION['user_status'] = "authorized";

            $cookie_name = "user_id";
            $cookie_value = $id;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

            CloseDBconnection($conn);
            RedirectTo('profile.php');
        }
        else
        {
            CloseDBconnection($conn);
            $error = "Username or Password is invalid";
            RedirectTo('form_login.php?error='.$error);
        }

    }
}

?>