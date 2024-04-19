<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize the entered OTP
    $enteredOtp = $_POST['otp'];

    // Retrieve the stored OTP and user email from the session
    $storedOtp = isset($_SESSION['otp']) ? $_SESSION['otp'] : null;
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;

    // Database connection parameters
    $servername = "localhost";
    $username = "root"; // Replace 'your_username' with your actual MySQL username
    $password = ""; // Replace 'your_password' with your actual MySQL password
    $dbname = "authentication_app";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute a parameterized query to verify the entered OTP
    $sql = "SELECT * FROM otp_table WHERE email = ? AND otp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $enteredOtp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // OTP verification successful
        // Redirect to the user's dashboard or home page
        header('Location: dashboard.php');
        exit;
    } else {
        // Invalid OTP
        echo 'Invalid OTP. Please try again.';
    }

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $conn->close();
}
?>
