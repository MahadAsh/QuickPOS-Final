<?php
// process_contact.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    if (empty($name) || empty($email) || empty($message)) {
        die("Error: All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: Invalid email format.");
    }

    // [POS-19] Redirect logic to a thank-you page
    header("Location: thank-you.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>