<?php
session_start();

if(!isset($_SESSION['email'])) {
  header("Location: index.php");
}

// Set database connection variables
$db_host = 'localhost';
$db_user = 'admin';
$db_pass = 'admin';
$db_name = 'portal';

// Try to connect to the database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check if connection failed
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $login = $_POST['login'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  
  // Insert data into the customers table
  $query = "INSERT INTO customers (Name, Gender, Email, Login, Phone, Address, City) VALUES ('$name', '$gender', '$email', '$login', '$phone', '$address', '$city')";
  $result = mysqli_query($conn, $query);

  // Check if the query was successful
  if($result) {
    echo "User added successfully!";
    header("Location: dashboard.php");
    exit;
  } else {
    echo "Error adding user: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add User</title>
</head>
<body>
  <h1>Add User</h1>
  <form method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="gender">Gender:</label>
    <select name="gender" required>
      <option value="">--Select--</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
    </select><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="login">Login:</label>
    <input type="text" name="login" required><br>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" required><br>

    <label for="address">Address:</label>
    <input type="text" name="address" required><br>

    <label for="city">City:</label>
    <input type="text" name="city" required><br>

    <input type="submit" value="Add User">

    <a href="dashboard.php">Cancel</a>
  </form>
</body>
</html>
