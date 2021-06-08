<?php

// Active page variable
$current_page = basename($_SERVER['PHP_SELF']);

// Connection variables
$host = "localhost";
$user = "root";
$password = "";
$database = "filmshelf";

// Set connection query
$db = new mysqli($host, $user, $password, $database);

// Check connection
if ($db -> connect_errno) {
  echo "Failed to connect to database: " . $db -> connect_error;
  exit();
}

?>
