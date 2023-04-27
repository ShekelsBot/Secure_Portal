<?php
/*
Andrew Bruckbauer
4/26/2023
CIS 411
Secure Portal Final
*/
session_start();

session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');

header('Location: index.php');
?>