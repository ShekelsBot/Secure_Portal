<link href="https://sleek.durrstudios.dev/style.css" rel="stylesheet" type="text/css" />
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

    // Get the ID of the user to remove from the GET parameter
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Delete the user from the customers table
    $query = "DELETE FROM customers WHERE ID = $id";
    mysqli_query($conn, $query);

    // Close the database connection
    mysqli_close($conn);

    // Redirect to the dashboard
    header("Location: dashboard.php");
} else {
    // If no ID was specified, redirect to the dashboard
    header("Location: dashboard.php");
}
?>
