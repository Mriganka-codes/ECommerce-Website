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
  $description = $_POST['description'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $image = $_FILES['image']['name'];
  
  // File upload path
  $targetDir = "uploads/";
  $targetFilePath = $targetDir . $image;
  
  // Insert product data into database
  $sql = "INSERT INTO product (name, description, price, category, image) VALUES ('$name', '$description', '$price', '$category', '$image')";
  
  if (mysqli_query($conn, $sql)) {
    echo "Product uploaded successfully!";
    // Upload file to server
    move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath);
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Product Upload</title>
</head>
<body>
  <h2>Product Upload Form</h2>
  <form method="POST" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br><br>
    <label for="description">Description:</label>
    <textarea name="description" required></textarea><br><br>
    <label for="price">Price:</label>
    <input type="number" name="price" required><br><br>
    <label for="category">Category:</label>
    <input type="text" name="category" required><br><br>
    <label for="image">Image:</label>
    <input type="file" name="image" required><br><br>
    <input type="submit" name="submit" value="Upload">
  </form>
</body>
</html>
