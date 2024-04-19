<?php
session_start();

// Check if the session variable for the recognized person is set
if (isset($_SESSION['recognized_person'])) {
    $recognized_person = $_SESSION['recognized_person'];
} else {
    // If not set, set a default value
    $recognized_person = "emmanuel";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to MFA Frontier</title>
  <style>
    body {
      font-family: sans-serif;
      background-color: #f0f0f0;
      text-align: center;
    }
    .container {
      margin-top: 100px;
    }
    h2 {
      color: #007bff;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Welcome <?php echo $recognized_person; ?>!</h2>
    <!-- You can customize this page further as needed -->
  </div>
</body>
</html>
