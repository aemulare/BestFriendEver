<?php
// user session validation
function is_logged()
{
    if(isset($_COOKIE['user_status']) && $_COOKIE['user_status'] === "authorized")
    {
        return true;
    }
}

?>