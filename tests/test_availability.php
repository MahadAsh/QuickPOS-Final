<?php
// tests/test_availability.php

$index_path = __DIR__ . '/../index.php';
$is_available = file_exists($index_path);
$has_content = false;

if ($is_available) {
    $content = file_get_contents($index_path);
    // Verify it contains standard HTML and the correct title
    if (strpos($content, '<!DOCTYPE html>') !== false && strpos($content, 'QuickPOS') !== false) {
        $has_content = true;
    }
}

// Test 5: Page Availability
run_test("Page Load: index.php is available and renders HTML skeleton", $is_available && $has_content);
?>