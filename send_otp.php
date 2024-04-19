<?php
// Include PHPMailer autoload file
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Generate random OTP of 8 characters
$otp = '';
for ($i = 0; $i < 8; $i++) {
    $otp .= chr(rand(97, 122)); // Random lowercase alphabetic character
}

// Create a new PHPMailer instance
$mail = new PHPMailer();

// SMTP configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;           // Enable SMTP authentication
$mail->Username = 'emmanuelkioko777@gmail.com'; // SMTP username (your Gmail address)
$mail->Password = 'ikokwxsxsclsbzkl'; // SMTP password (your Gmail password)
$mail->SMTPSecure = 'tls';        // Enable TLS encryption
$mail->Port = 587;                // TCP port to connect to

// Sender and recipient details
$mail->setFrom('emmanuelkioko777@gmail.com', 'Emmanuel kioko');
$mail->addAddress('kiokoemmanuel777@gmail.com');        // Add recipient email

// Additional recipient
$mail->addAddress('sallyjanice716@gmail.com'); // Add additional recipient email

// Email content
$mail->isHTML(true);              // Set email format to HTML
$mail->Subject = 'Your OTP for Login';
$mail->Body    = "Your OTP is: $otp";

// Send email
if(!$mail->send()) {
    echo 'Error sending email: ' . $mail->ErrorInfo;
} else {
    // Redirect to otpsent.php
    header('Location: verify_otp.php');
    exit;
}
?>
