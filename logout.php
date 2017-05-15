<?php
session_start();
include 'common_functions.php';

session_destroy();

RedirectTo('index.php');

?>