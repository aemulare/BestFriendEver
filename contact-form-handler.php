<?php


// SENDGRID ==============================================
require 'vendor/autoload.php';

// =======================================================


// Emails form data to you and the person submitting the form and adds it to a database
//include 'common_functions.php';

// Connect to db
$conn = OpenDBconnection();


$sql = "SELECT id FROM form_submissions";
$result = $conn->query($sql);


// Receive and sanitize input
$name = mysqli_real_escape_string($conn, $_POST['name']);
$contact_email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$message = mysqli_real_escape_string($conn, $_POST['message']);


// write to db
$sql = "INSERT INTO form_submissions (name,phone,email,message) VALUES ('$name', '$phone','$contact_email', '$message')";
$result = $conn->query($sql);


// Set email where form submissions will be send
$myemail = "maryikapro@gmail.com";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$info = "Thank you for your form submission. This is the copy of your message.\n\n
         Email:\t\t$contact_email\nName:\t\t$name\nPhone:\t\t$phone\n\n\nMessage:\t\t$message";


//SENDGRID ======================================================

// Initialize the SendGrid object with SendGrid credentials
$sendgrid = new SendGrid(getenv("SENDGRID_API_KEY"));

//Create a new SendGrid Email object
$email = new SendGrid\Email();
$email
    ->addTo($myemail)
    ->addTo($contact_email)
    ->setFrom($myemail)
    ->setSubject('New contact from submission')
    ->setText($message);

$sendgrid->send($email);
//SENDGRID ============================================================================

function msg()
{
    return $_POST['message'];
}


CloseDBconnection($conn);

?>
