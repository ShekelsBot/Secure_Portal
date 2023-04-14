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

// Query the customers table
$query = "SELECT * FROM customers";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
</head>
<body>
  <h1>Dashboard</h1>

  <p>Welcome to the dashboard, user <?php echo $_SESSION['user_id']; ?>.</p>

  <a href="main.php">Go to Main Page</a>
  <a href="news.php">Go to News Page</a>

  <form method="POST" action="logout.php">
    <button type="submit">Log Out</button>
  </form>

  <h2>Customers Table</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Gender</th>
      <th>Email</th>
      <th>Login</th>
      <th>Phone</th>
      <th>Address</th>
      <th>City</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)){ ?>
    <tr>
      <td><?php echo $row['ID']; ?></td>
      <td><?php echo $row['Name']; ?></td>
      <td><?php echo $row['Gender']; ?></td>
      <td><?php echo $row['Email']; ?></td>
      <td><?php echo $row['Login']; ?></td>
      <td><?php echo $row['Phone']; ?></td>
      <td><?php echo $row['Address']; ?></td>
      <td><?php echo $row['City']; ?></td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
