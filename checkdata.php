<?php
include 'common_functions.php';

$nickname = $email = "";
// Receive and sanitize input
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST) )
{
    if(isset($_POST['nickname']))
    {
        $conn = OpenDBconnection();
        $nickname = test_input($_POST['nickname']);

        $sql=" SELECT COUNT(*) FROM users WHERE nickname='$nickname' ";
        $result = $conn->query($sql);
        $x = $result->fetch_assoc();
        $num = array_shift($x);
        if($num > 0)
        {
            echo "<div class='text-danger'>Nickname is already taken.</div>";
        }

        CloseDBconnection($conn);
        exit();
    }

    if(isset($_POST['email']))
    {
        $conn = OpenDBconnection();
        $email = test_input($_POST['email']);
        $sql=" SELECT COUNT(*) FROM users WHERE email='$email' ";
        $result = $conn->query($sql);
        $x = $result->fetch_assoc();
        $num = array_shift($x);
        if($num > 0)
        {
            echo "<div class='text-danger'>Email already exist.</div>";

        }

        CloseDBconnection($conn);
        exit();
    }
}

?>