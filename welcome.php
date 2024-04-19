<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if form data was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $question1 = $_POST['question1'] ?? '';
    $question2 = $_POST['question2'] ?? '';
    $question3 = $_POST['question3'] ?? '';

    // Process the form data as needed
    // For demonstration, just echo the received data
    echo "<h2>Welcome, Emmanuel!</h2>";
    echo "<p>Question 1: $question1</p>";
    echo "<p>Question 2: $question2</p>";
    echo "<p>Question 3: $question3</p>";
} else {
    // If the form was not submitted via POST method, redirect back to the homepage
    header("Location: homepage.php");
    exit;
}
?>
