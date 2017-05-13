<?php

// determines path to picture for carousel and articles
// if null -> placeholder image
function imageSource($picture)
{
    return $picture ? "img/" . $picture : "img/placeholder.jpg";
}


// redirects to destination page
function RedirectTo($dest)
{
    // Redirect back to blog article page
    $host  = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$uri/$dest");
}


// sanitizes input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// displays word in plural if count > 1 (ex. 2 comments)
function pluralize($count, $singular, $plural = false)
{
    if (!$plural) $plural = $singular . 's';
    return ($count == 1 ? $singular : $plural) ;
}


// email validation
function isValidEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}



// last id from database table
function lasdID()
{
    $stmt = $this->conn->lastInsertId();
    return $stmt;
}



?>