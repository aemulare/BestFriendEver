<?php
include 'common_functions.php';

session_start();        // Starting Session
$error='';              // Variable To Store Error Message

if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['password']))
    {
        $error = "Username or Password is invalid";
    }
    else
    {
        $email=$_POST['email'];
        $password=$_POST['password'];

        $conn = OpenDBconnection();

        $sql = 'SELECT * FROM users WHERE email ='.$email.' AND password = '.$password;
        $result = $conn->query($sql);

        $rows =  $result->num_rows;
        if ($rows == 1)
        {
            $_SESSION['login_user'] = $email;       // Initializing Session
            RedirectTo('profile.php');
        }
        else
            {
            $error = "Username or Password is invalid";
        }
        CloseDBconnection($conn);
    }
}
?>