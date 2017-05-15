<?php

include 'common_functions.php';

$conn = OpenDBconnection();

$sql = "SELECT * FROM dogs order by breed";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {
        echo "<div class='col-lg-4 col-md-6 col-sm-6 text-center dog'>
                    <img class='img-responsive' src='" . imageSource($row["picture"]) . "' alt=''>
                    <h3>" . $row["breed"] . "</h3>
              </div>";
    }
}
else echo "0 results";

CloseDBconnection($conn);
?>
