<?php include 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <style>
    /* Add your CSS styles here */
    body {
      font-family: Arial, sans-serif;
      background-image: url('land.jpg'); 
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      padding: 20px 0;
      font-family: sans-serif;
    }
    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8); /* Add a semi-transparent white background */
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
  </style>
</head>
<body>
<form action="send_otp.php" method="post"> <!-- Updated action to send_otp.php -->
  <div class="container">
    <h2>Sign In</h2>
    Email: <input type="email" name="email" required><br>
    <button type="submit">Send OTP</button>
  </div>
</form>
<p>Don't have an account? <a href="registration.php">Sign Up</a></p>
</body>
</html>
