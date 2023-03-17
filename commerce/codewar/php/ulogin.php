<?php
$conn=new mysqli('localhost','root','','commerce');
if($conn->connect_error){
    die('connection failed:'.$conn->connect_error);
}
else  {
    if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];    

    $sql = "SELECT * FROM ureg WHERE email='$email' and password='$password'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
            // echo "logged in";
            // header("location: ./deshboard.html");
            echo "<script>alert('logged in');
            window.location = './admindesh.php';</script>";
            
    } else{
        echo "<script>alert('Invalid email or password');
        window.location = './admin.html';</script>";
        
    }
}
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Login</title>
</head>
<body>
  <h2>User Login Form</h2>
  <form method="POST">
    <label for="email">Email:</label>
    <input type="email" name="email" required><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br><br>
    <input type="submit" name="login" value="Login">
  </form>
</body>
</html>
