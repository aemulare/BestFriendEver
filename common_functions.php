<?php

// opens db connection
function OpenDBconnection()
{
    $servername = "127.0.0.1:8889";
    $username = "root";
    $password = "root";
    $database = "bestfriendever";

//    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
//
//    $servername = $url["host"];
//    $username = $url["user"];
//    $password = $url["pass"];
//    $database = substr($url["path"], 1);

// Create connection
    $conn = new mysqli($servername, $username, $password, $database);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //else echo "Connected successfully";
    return $conn;
}


// closes db connection
function CloseDBconnection($conn)
{
    $conn->close();
}


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


// cleans input
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

// get article date
function article_date($date)
{
    $date = new DateTime($date);
    return $date->format('F d, Y');
}

?>