<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$name = $_POST['name'];
$company = $_POST['company'];
$email = $_POST['email'];
$stakeholder = $_POST['stakeholder'];
$country = $_POST['country'];

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0; // Enable verbose debug output. Set to 0 for no output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'mail.ease.et'; // Specify your SMTP server
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'cees.wanrooij@ease.et'; // SMTP username
    $mail->Password = 'F3Mt@wFmvv=w'; // SMTP password
    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, or 'ssl' for SSL
    $mail->Port = 465; // TCP port to connect to

    //Recipients
    $mail->setFrom('cees.wanrooij@ease.et', 'Cees');
    $mail->addAddress('cees.wanrooij@ease.et', 'Cees'); // Add a recipient

    // Content
    $mail->isHTML(true); // Set email format to HTML
$mail->Subject = 'New Subscription from EASE Coming Soon Page';
$mail->Body    = "Name: {$name}<br>Company: {$company}<br>Email: {$email}<br>Ecosystem Role: {$stakeholder}<br>Country: {$country}";

    $mail->send();
    header('Location: success.html');
    exit;
} catch (Exception $e) {
    // Handle errors here, e.g., by showing an error message or logging the error
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
