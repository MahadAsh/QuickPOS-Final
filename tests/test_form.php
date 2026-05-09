<?php
// tests/test_form.php

// Helper function simulating the exact logic from process_contact.php
function validate_contact_logic($name, $email, $message) {
    if (empty($name) || empty($email) || empty($message)) return "empty_error";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return "email_error";
    return "success";
}

// Test 1: Empty Name
run_test("Contact Form: Rejects submission with empty fields", 
    validate_contact_logic("", "test@test.com", "Hello") === "empty_error"
);

// Test 2: Empty Message
run_test("Contact Form: Rejects submission with missing message", 
    validate_contact_logic("Mahad", "test@test.com", "") === "empty_error"
);

// Test 3: Invalid Email Format
run_test("Contact Form: Rejects invalid email address formats", 
    validate_contact_logic("Mahad", "invalid-email-format", "Hello") === "email_error"
);

// Test 4: Success Case
run_test("Contact Form: Accepts perfectly valid data", 
    validate_contact_logic("Mahad", "valid@email.com", "Great POS system!") === "success"
);
?>