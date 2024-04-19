<?php include'connection.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    body {
      background-image: url('sunset.jpg');
      background-size: cover; 
      background-position: center;
      font-family: sans-serif;
    }
    h2 {
      color: limegreen;
      background-color:#f0f0f0;
      padding: 10px; 
      border-radius: 5px;
      backdrop-filter: blur(40px);
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2>Registration Form</h2>
    <form action="otpsent.php" method="post">
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
      </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"required>
      </div>
      <div class="form-group">
        <label for="gender">Gender:</label>
        <select class="form-control" id="gender" name="gender" required>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password"required>
      </div>
      <div class="form-group">
        <label for="password">Confirm Password:</label>
        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm password"required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <p>Already have an account? <a href="otpsent.php">Sign In</a></p>
  </div>
  <!-- Bootstrap JS and jQuery (optional, for Bootstrap functionality) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
