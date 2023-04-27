<?php
/*
Andrew Bruckbauer
4/26/2023
CIS 411
Secure Portal Final
*/
session_start();
ob_start();

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

// Check if login form was submitted
if(isset($_POST['login'])){

    // Get email and password input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the users table to get the Base64-encoded password for the given email
    $query = "SELECT Password FROM users WHERE Email='$email'";
    $result = mysqli_query($conn, $query);

    // Check if any rows were returned
    if(mysqli_num_rows($result) > 0){

        // Get the Base64-encoded password from the database
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['Password'];

        // Encode the entered password using Base64
        $encoded_password = base64_encode($password);

        // Verify the entered password against the Base64-encoded password
        if($hashed_password === $encoded_password){

            // Login successful, set session variables and redirect to dashboard page
            $_SESSION['email'] = $email;
            header("Location: dashboard.php");
            ob_end_flush();
            exit();
        }
    }

    // Login failed, show error message
    header("Location: index.php?error=Invalid email or password");
    ob_end_flush();
    exit();
}
?>
