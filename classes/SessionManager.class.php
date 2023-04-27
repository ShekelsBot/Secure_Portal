<?php
/*
Andrew Bruckbauer
4/26/2023
CIS 411
Secure Portal Final
*/
// Start a session if one doesn't already exist
session_start();

// If the user has been inactive for more than 30 minutes, destroy their session and redirect them to the login page
if (time() - $_SESSION['last_activity'] > 1800) {
  session_unset(); // Unset all session variables
  session_destroy(); // Destroy all data registered to the session
  header("Location: logout.php"); // Redirect the user to the logout page
  exit(); // Stop executing any more code on this page
}

// If the user is not logged in, redirect them to the login page
if (!isset($_SESSION['email'])) {
  header("Location: logout.php"); // Redirect the user to the logout page
  exit(); // Stop executing any more code on this page
}
?>
