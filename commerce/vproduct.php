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

// Fetch products from database
$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Product List</title>
</head>
<body>
  <h2>Product List</h2>
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div>
      <h3><?php echo $row['name']; ?></h3>
      <p><?php echo $row['description']; ?></p>
      <p>Price: <?php echo $row['price']; ?></p>
      <p>Category: <?php echo $row['category']; ?></p>
      <img src="uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
    </div>
    <hr>
  <?php } ?>
</body>
</html>
