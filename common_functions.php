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


function pluralize($count, $singular, $plural = false)
{
    if (!$plural) $plural = $singular . 's';
    return ($count == 1 ? $singular : $plural) ;
}
?>