<?php
session_start();
// include "dbconnect.php";
// $db = new newdb();
// $conn = $db->openConnection();
 echo "<script>alert('log out in progress...');</script>";

// remove all session variables
session_unset();

// destroy the session
session_destroy();

header('location:index.php');


?>