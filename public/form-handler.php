<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $stakeholder = $_POST["stakeholder"];
    
    $to = "info@ease.et";
    $subject = "New Subscription from EASE Coming Soon Page";
    $message = "Name: " . $name . "\n" . "Email: " . $email . "\n" . "Stakeholder: " . $stakeholder;
    $headers = "From: no-reply@ease.et\r\n";

    if (mail($to, $subject, $message, $headers)) {
        header("Location: thank-you.html");
    } else {
        header("Location: error.html");
    }
} else {
    header("Location: index.html");
}
?>
