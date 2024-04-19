<?php

function generateRandomPassword($length = 10) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_+=';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[rand(0, strlen($chars) - 1)];
    }

    return $password;
}

// Generate a random password
$random_password = generateRandomPassword(12);

// Recipient email address
$to = 'kiokoemmanuel777@gmail.com';

// Email subject
$subject = 'Your Random Password';

// Email message
$message = 'Your random password is: ' . $random_password;

// Sender email address
$from = 'emmanuelkioko777@gmail.com';

// Header for sender
$headers = "From: $from\r\n";
$headers .= "Content-type: text/html\r\n";

// Send email
$mail_sent = mail($to, $subject, $message, $headers);

if ($mail_sent) {
    echo "Email with random password sent successfully.";
} else {
    echo "Failed to send email.";
}

?>
