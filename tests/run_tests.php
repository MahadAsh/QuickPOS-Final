<?php
// tests/run_tests.php

$exit_code = 0;

function run_test($test_name, $condition) {
    global $exit_code;
    if ($condition) {
        echo "PASS: $test_name\n";
    } else {
        echo "FAIL: $test_name\n";
        $exit_code = 1;
    }
}

echo "Running QuickPOS Automated Test Suite...\n";
echo "----------------------------------------\n";

// Dynamically load all test files
$test_files = glob(__DIR__ . '/test_*.php');
foreach ($test_files as $file) {
    require_once $file;
}

echo "----------------------------------------\n";
if ($exit_code === 0) {
    echo "All tests passed successfully!\n";
} else {
    echo "Some tests failed. Pipeline merge will be blocked.\n";
}

// Crucial for GitHub Actions CI/CD to read the failure state
exit($exit_code);
?>