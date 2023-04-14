<head>
  <link rel="stylesheet" href="style.css">
</head>

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
  <ul>
      <li><a href="main.php">Go to Main Page</a></li>
      <li><a href="news.php">Go to News Page</a></li>
      <li>
        <div class="navigation">
        <a class="button" href="">
          <img src="https://static.vecteezy.com/system/resources/previews/000/581/808/original/lock-icon-vector-illustration.jpg"> 
        <div class="logout">LOGOUT</div>
        </a>
      </li>
  </ul>
  
  <p>Welcome to the dashboard, user <?php echo $_SESSION['user_id']; ?>.</p>

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
