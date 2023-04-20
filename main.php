<?php
session_start();

if(!isset($_SESSION['user_id'])) {
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Main Page</title>
</head>
<body>
  <h1>Main Page</h1>

  <a href="dashboard.php">Go to Dashboard</a>

  <form method="POST" action="logout.php">
    <button type="submit">Log Out</button>
  </form>
</body>
</html>
