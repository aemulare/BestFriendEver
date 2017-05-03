<?php
function OpenDBconnection()
{
//    $servername = "127.0.0.1:8889";
//    $username = "root";
//    $password = "root";
//    $database = "bestfriendever";

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $servername = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $database = substr($url["path"], 1);

// Create connection
    $conn = new mysqli($servername, $username, $password, $database);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //else echo "Connected successfully";
    return $conn;
}



function CloseDBconnection($conn)
{
    $conn->close();
}
?>