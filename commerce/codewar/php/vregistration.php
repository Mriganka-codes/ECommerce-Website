<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "commerce";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  // Insert user data into database
  $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
  
  if (mysqli_query($conn, $sql)) {
    echo "User registered successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Registration</title>
</head>
<body>
  <h2>User Registration Form</h2>
  <form method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br><br>
    <label for="email">Email:</label>
    <input type="email" name="email" required><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br><br>
    <input type="submit" name="submit" value="Register">
  </form>
</body>
</html>
