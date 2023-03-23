<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $stakeholder = trim($_POST["stakeholder"]);

    // Perform validation
    if (empty($name) || empty($email) || empty($stakeholder)) {
        die("Error: All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: Invalid email address.");
    }

    // Sanitize input
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $stakeholder = filter_var($stakeholder, FILTER_SANITIZE_STRING);

    // Process the form data (e.g. send an email)
    $to = "cees.wanrooij@ease.et";
    $subject = "New subscriber from EASE coming soon page";
    $message = "Name: {$name}\nEmail: {$email}\nStakeholder: {$stakeholder}";
    $headers = "From: no-reply@ease.et";

    if (mail($to, $subject, $message, $headers)) {
        header("Location: success.html");
        exit;
    } else {
        die("Error: Failed to send email.");
    }
} else {
    header("Location: index.html");
    exit;
}

?>
