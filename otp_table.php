<?php
include 'connection.php'; // Include your database connection file

// SQL query to create otp_table
$sql = "CREATE TABLE otp_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    otp VARCHAR(6) NOT NULL,
    otp_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table otp_table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
