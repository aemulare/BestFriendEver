<?php
// SENDGRID ==============================================
require 'vendor/autoload.php';
//Set SendGrid Credentials


$sendgrid = new SendGrid('SENDGRID_API_KEY');


//Create a new SendGrid Email object

$mail = new SendGrid\Email();
// =======================================================


// Emails form data to you and the person submitting the form and adds it to a database
include "db_connection.php";

// Connect to db
$conn = OpenDBconnection();


$sql = "SELECT id FROM form_submissions";
$result = $conn->query($sql);

// Set email where form submissions will be send
$myemail = "maryika@ymail.com";


// Receive and sanitize input
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

if (!mysqli_query($conn,$sql)) {
    die('Error: ' . mysqli_error($conn));
}
//echo "1 record added";

// write to db
$sql = "INSERT INTO form_submissions (name,phone,email,message) VALUES ('$name', '$phone','$email', '$message')";
$result = $conn->query($sql);

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$info = "Thank you for your form submission. This is the copy of your message.\n\n
         Email:\t\t$email\nName:\t\t$name\nPhone:\t\t$phone\n\n\nMessage:\t\t$message";


//SENDGRID ======================================================
$subject = "New contact form submission";
$senderid = "<webmaster@bestfriendever.com>";
$email1 = new SendGrid\Email();
$email1
    ->addTo($email)
    ->addBcc($myemail)
    ->setFrom($senderid)
    ->setSubject($subject)
    ->setText($info);


$sendgrid->send($email1);
//SENDGRID ============================================================================

function msg()
{
    return $_POST['message'];
}

//include "info.php";


//// More headers
//$headers .= 'From: <webmaster@bestfriendever.com>' . "\r\n";
////$headers .= 'Cc: myboss@example.com' . "\r\n";
//
//mail($to,$subject,$messg,$headers);
//mail($email,"Thank you for your form submission. This is the copy of your message.",$messg,$headers);

CloseDBconnection($conn);

?>
