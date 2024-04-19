<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to MFA Frontier</title>
  <style>
    body {
      font-family: sans-serif;
      background-image: url('mfa.jpg');
      background-size: cover;
      background-position: center;
      margin: 0; /* Remove default margin */
      padding: 0; /* Remove default padding */
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8); /* Add semi-transparent white background */
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
    label {
      display: block;
      margin-bottom: 10px;
    }
    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }
    button {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Security Questions</h2>
    <!-- Correct the action attribute to point to welcome.php -->
    <form action="welcome.php" method="post">
      <div>
        <label for="question1">Question 1: What is the length of your password?</label>
        <input type="text" id="question1" name="question1" required>
      </div>
      <div>
        <label for="question2">Question 2: What special character is in your password?</label>
        <input type="text" id="question2" name="question2" required>
      </div>
      <div>
        <label for="question3">Question 3: What is your gender?</label>
        <input type="text" id="question3" name="question3" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>
    <h2>Typing Speed Test</h2>
    <p>Type the following text as fast as you can:</p>
    <p id="typingText">The quick brown fox jumps over the lazy dog.</p>
    <input type="text" id="typingInput">
    <p id="typingSpeed"></p>
  </div>

  <script>
    var startTime, endTime;
    document.getElementById('typingInput').addEventListener('keydown', function(event) {
      if (!startTime) {
        startTime = new Date();
      }
    });
    document.getElementById('typingInput').addEventListener('keyup', function(event) {
      endTime = new Date();
      calculateTypingSpeed();
    });
    function calculateTypingSpeed() {
      var elapsedTime = (endTime - startTime) / 1000; // Convert milliseconds to seconds
      var typedText = document.getElementById('typingInput').value;
      var wordCount = typedText.trim().split(/\s+/).length; // Count words
      var typingSpeed = Math.round(wordCount / elapsedTime * 60); // Words per minute
      document.getElementById('typingSpeed').innerText = 'Typing speed: ' + typingSpeed + ' WPM';
    }
  </script>
</body>
</html>
