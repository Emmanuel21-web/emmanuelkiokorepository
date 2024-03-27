<?php
// Function to execute SQL query and fetch data
function fetchDataFromDatabase($sql) {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "authentication_app";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement (for security)
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    // Execute SQL query
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if query execution was successful
    if (!$result) {
        die("Error executing query: " . $conn->error);
    }

    // Fetch data from the result set
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Return fetched data
    return $data;
}

// Example usage:
$sql = "SELECT * FROM security_questions";
$result = fetchDataFromDatabase($sql);

// Output fetched data
foreach ($result as $row) {
    echo "Column1: " . $row["question1"] . ", Column2: " . $row["question2"] . ", Column3: " . $row["question3"] . "<br>";
}
?>
