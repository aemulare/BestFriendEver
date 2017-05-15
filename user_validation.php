<?php


// user session validation
function is_logged()
{

    if(isset($_SESSION['user_status']) && $_SESSION['user_status'] === "authorized")
        return true;
}

?>