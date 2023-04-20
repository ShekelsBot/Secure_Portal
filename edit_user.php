<?php
session_start();

if(!isset($_SESSION['email'])) {
  header("Location: index.php");
}

if(isset($_GET['id'])) {
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

    // Get the ID of the user to edit from the GET parameter
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Query the customers table for the user with the specified ID
    $query = "SELECT * FROM customers WHERE ID = $id";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // If the form was submitted, update the user in the database
    if(isset($_POST['submit'])) {
        // Get the new values for the user from the form
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $login = mysqli_real_escape_string($conn, $_POST['login']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);

        // Update the user in the database
        $query = "UPDATE customers SET Name='$name', Gender='$gender', Email='$email', Login='$login', Phone='$phone', Address='$address', City='$city' WHERE ID = $id";
        mysqli_query($conn, $query);

        // Redirect to the dashboard
        header("Location: dashboard.php");
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // If no ID was specified, redirect to the dashboard
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
</head>
<body>
  <h1>Edit User</h1>
  <form method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo $user['Name']; ?>"><br><br>

    <label for="gender">Gender:</label><br>
    <input type="text" id="gender" name="gender" value="<?php echo $user['Gender']; ?>"><br><br>

    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email" value="<?php echo $user['Email']; ?>"><br><br>

    <label for="login">Login:</label><br>
    <input type="text" id="login" name="login" value="<?php echo $user['Login']; ?>"><br><br>

    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone" value="<?php echo $user['Phone']; ?>"><br><br>

    <label for="address">Address:</label><br>
    <input type="text" id="address
