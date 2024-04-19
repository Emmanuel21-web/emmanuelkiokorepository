<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// After the user logs in successfully and you verify their credentials
$_SESSION['user_id'] = 8; // Assuming $user_id is the user's ID retrieved from the database

if (!isset($_SESSION['user_id'])) {
    echo "User ID is not set.";
    // You may redirect the user to a login page or display an error message
    exit;
}

// Step 1: Establish a connection to the database
$servername = "localhost"; // Change this to your database server name if different
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "authentication_app"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredOtp = $_POST['otp'];
    $storedOtp = $_SESSION['otp'];

    // Step 2: Retrieve the stored OTP for the user from the database
    $sql = "SELECT otp FROM users WHERE id = ?"; // Adjust the table and column names accordingly
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        // Error handling if prepare() fails
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        exit;
    }

    $stmt->bind_param("i", $_SESSION['user_id']); // Assuming you have a user ID stored in session

    if (!$stmt->execute()) {
        // Error handling if execute() fails
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        exit;
    }

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $storedOtpFromDB = $row['otp'];

    if ($enteredOtp === $storedOtpFromDB) {
        // Step 3: OTP verification successful
        // Send email using mail() function
        $to = 'kiokoemmanuel777@gmail.com'; // Recipient email address
        $subject = 'Your OTP Verification';
        $message = 'Your OTP verification was successful. You can now proceed with your tasks.';
        $headers = 'From: emmanuelkioko777@gmail.com' . "\r\n" .
            'Reply-To: emmanuelkioko777@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            echo 'Message has been sent';
            // Redirect to the user's dashboard or home page
            header('Location: homepage.php');
            exit;
        } else {
            echo 'Message could not be sent.';
        }
    } else {
        // Invalid OTP
        echo 'Invalid OTP. Please try again.';
    }

    // Close statement
    $stmt->close();
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
</head>
<body>
    <h2>Enter OTP</h2>
    <form action="homepage.php" method="post">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="otp" placeholder="Enter OTP" required>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>
