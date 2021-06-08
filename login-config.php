<?php
session_start();
include "include/config.php";

// If something is posted through login form
if (isset($_POST['username']) && isset($_POST['password'])) {

  // Make sure input can't contain harmful code
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
  }

  // Run the function to disarm any potential harmful code
  $username = validate($_POST['username']);
  $password = validate($_POST['password']);


  if (empty($username)) {
      header("Location: login.php?error=Username and password is required");
      exit();
  } else if (empty($password)) {
      header("Location: login.php?error=Password is required");
      exit();
  } else {

    // Query to retrieve row from database where it matches the users imput
    $sql = "SELECT * FROM users WHERE userName='$username' AND password='$password'";

    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['userName'] === $username && $row['password'] === $password) {
          $_SESSION['userName'] = $row['userName'];
          $_SESSION['userID'] = $row['userID'];
          header("Location: shelf.php");
          exit();
      } else {
        header("Location: login.php?error=Incorrect username or password");
        exit();
      }
    } else {
      header("Location: login.php?error=Incorrect username or password");
      exit();
    }
  }
} else {
  header("Location: ../login.php");
  exit();
}

?>