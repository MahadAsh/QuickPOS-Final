<?php
// process_contact.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    // [POS-18] PHP backend validation logic
    if (empty($name) || empty($email) || empty($message)) {
        die("Error: All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: Invalid email format.");
    }

    // Validation passed! 
    echo "Validation successful!";
} else {
    die("Invalid request method.");
}
?>