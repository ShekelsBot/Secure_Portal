<?php
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

    // Query the users table to check if the email and password match
    $query = "SELECT * FROM users WHERE Email='$email' AND Password='$password'";
    $result = mysqli_query($conn, $query);

    // Check if any rows were returned
    if(mysqli_num_rows($result) > 0){

        // Login successful, set session variables and redirect to dashboard page
        $_SESSION['email'] = $email;
        header("Location: dashboard.php");
        ob_end_flush();
        exit();

    } else {

        // Login failed, show error message
        $error = "Invalid email or password";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

    <h1>Login</h1>

    <?php if(isset($error)){ ?>
        <p><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST" action="index.php">
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>

</body>
</html>
