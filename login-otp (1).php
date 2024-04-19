<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "authentication_app";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted and if email is provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

    // Check if the email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Check if the user exists
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows < 1) {
            echo '<script>
                    window.location.href = "signin.php";
                    alert("User not found!");
                  </script>';
            exit; // Exit the script after redirecting
        }

        // Generate and send an OTP
        $otp = mt_rand(100000, 999999);

        // Send the OTP to the user
        send_otp($email, $otp);

        // Store the OTP in the database
        $otp_expiry = date('Y-m-d H:i:s', strtotime('+5 minutes'));
        $stmt = $conn->prepare("INSERT INTO otp (user_email, otp, expiry_time) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $otp, $otp_expiry);
        $stmt->execute();
        $otp_id = $stmt->insert_id;
        $stmt->close();

        // Redirect user to OTP verification page
        echo "<script>
                alert('An OTP has been sent to your email address. Please check your inbox.');
                window.location.href = 'verify-otp.php?otp_id=$otp_id&user_email=$email';
              </script>";
        exit; // Exit the script after redirecting
    } else {
        // Invalid email address
        echo '<script>
                window.location.href = "signin.php";
                alert("Email is invalid or not provided!");
              </script>';
        exit; // Exit the script after redirecting
    }
} else {
    // If the form is not submitted or email is not provided, redirect to signin.php
    echo '<script>
            window.location.href = "signin.php";
          </script>';
    exit; // Exit the script after redirecting
}

// Close the connection
mysqli_close($conn);

// Function to send OTP
function send_otp($email, $otp)
{
    // Send OTP to the user's email address
    $to = $email;
    $subject = "OTP for Sign-In";
    $message = "Your OTP for sign-in is: $otp.";
    $headers = "From: your_email@example.com\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "OTP sent to email address.<br>";
    } else {
        echo "Error: OTP not sent to email address.<br>";
    }
}

if ($stmt->execute()) {
    echo  '<script>
            window.location.href = "homepage.php";
            window.alert("user registered")
        </script>';
}
?>
