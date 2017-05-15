<?php
include 'common_functions.php';

$cookie_name = "user_status";
$cookie_value = null;
setcookie($cookie_name, $cookie_value);

session_unset();
RedirectTo('index.php');

?>