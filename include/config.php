<?php

  // Active page variable
  $current_page = basename($_SERVER['PHP_SELF']);
  
  // Connection variables
  $host = "remotemysql.com";
  $user = "yQBM8TkWR3";
  $password = "XKmBQAKj56";
  $database = "yQBM8TkWR3";
  
  // Set connection query
  $db_connect = new mysqli($host, $user, $password, $database);
  
  // Check connection
  if ($db_connect -> connect_errno) {
    echo "Failed to connect to database: " . $db_connect -> connect_error;
    exit();
  }

?>