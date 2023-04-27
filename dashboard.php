<head>
  <link rel="stylesheet" href="styles.css">
</head>
<?php
/*
Andrew Bruckbauer
4/26/2023
CIS 411
Secure Portal Final
*/
class SessionManager {
    private $maxIdleTime = 30;
    public function __construct() {
        session_start();
        $this->checkSession();
    }
    private function checkSession() {
        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $this->maxIdleTime)) {
            session_unset();
            session_destroy();
            header("Location: logout.php");
            exit();
        } else {
            $_SESSION['last_activity'] = time();
        }
        if (!isset($_SESSION['email'])) {
            header("Location: index.php");
            exit();
        }
    }
}

$session = new SessionManager();

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
      <li><a class="navigation-button" href="news.php">News Page</a></li>
      <li>
        <form method="POST" action="logout.php">
          <button class="navigation-button logout-button" type="submit">Logout</button>
        </form>
      </li>
    </ul>
  <p>Welcome to the dashboard, user <?php echo $_SESSION['email']; ?>.</p>
  <?php if (isset($_SESSION['remaining_time'])): ?>
  <p>Your session will expire in <?php echo $_SESSION['remaining_time']; ?> seconds.</p>
  <?php endif; ?>
  <h2>Customers Table</h2>
  <ul>
      <li><a href="add_user.php">Add User</a></li>
  </ul>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Login</th>
        <th>Phone</th>
        <th>Address</th>
        <th>City</th>
        <th>Edit/Remove</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
        <td><?php printf('%04d', $row['ID']); ?></td>
          <td><?php echo $row['Name']; ?></td>
          <td><?php echo $row['Gender']; ?></td>
          <td><?php echo $row['Email']; ?></td>
          <td><?php echo $row['Login']; ?></td>
          <td><?php echo $row['Phone']; ?></td>
          <td><?php echo $row['Address']; ?></td>
          <td><?php echo $row['City']; ?></td>
          <td>
            <a href="edit_user.php?id=<?php echo $row['ID']; ?>">Edit</a>
            <a href="remove_user.php?id=<?php echo $row['ID']; ?>">Remove</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <style>
  th:hover {
    background-color: #111;
    cursor: pointer;
  }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
  // Sort by the ID column first
    $('tbody tr').sort(function(a, b) {
      return parseInt($('td', a).eq(0).text()) - parseInt($('td', b).eq(0).text());
    }).appendTo('tbody');

    $('th').each(function(col) {
      $(this).click(function() {
        if ($(this).hasClass('asc')) {
          $('tbody tr').sort(function(a, b) {
            return $('td', a).eq(col).text().localeCompare($('td', b).eq(col).text());
          }).appendTo('tbody');
          $(this).removeClass('asc');
          $(this).addClass('desc');
        } else {
          $('tbody tr').sort(function(a, b) {
            return $('td', b).eq(col).text().localeCompare($('td', a).eq(col).text());
          }).appendTo('tbody');
          $(this).removeClass('desc');
          $(this).addClass('asc');
        }
      });
    });
  });
</script>

</body>
</html>