<?php
session_start();
// Allow access if the session userID & userName has been succesfully set, and type is user. Else...
if (isset($_SESSION['userName'])) {

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Filmshelf</title>
</head>

<body>

<?php
    include 'include/header.php'; 
?>

<div class="custom-backdrop" style="
    background-image: linear-gradient(to bottom, rgba(255,0,0,0), rgb(0, 0, 0) 80%),
    url('http://image.tmdb.org/t/p/original/s4wRC37TUwxtghhFBaze0qO1278.jpg');
    ">
</div>
    
<div class="container custom-container">
  <form class="btn-container" action="logout.php">
    <button class="btn btn-outline-secondary">Some other button</button>
    <button class="btn btn-danger">Log out</button>
  </form>
  <h1 class="display-4 mb-4">Welcome <?php echo $_SESSION['userName']; ?></h1>
  <p class="lead mb-4">This is the shelf section where you can view any lists and movies you have added to your shelf.</p>

  <!-- The list table -->
  <div class="container my-5 d-flex justify-content-around table-container">

    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action list-group-item-dark">The first link item</a>
      <a href="#" class="list-group-item list-group-item-action list-group-item-dark">A second link item</a>
      <a href="#" class="list-group-item list-group-item-action list-group-item-dark">A third link item</a>
      <a href="#" class="list-group-item list-group-item-action list-group-item-dark">A fourth link item</a>
      <a href="#" class="list-group-item list-group-item-action list-group-item-dark">A disabled link item</a>
    </div>

    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action list-group-item-dark">The first link item</a>
      <a href="#" class="list-group-item list-group-item-action list-group-item-dark">A second link item</a>
      <a href="#" class="list-group-item list-group-item-action list-group-item-dark">A third link item</a>
      <a href="#" class="list-group-item list-group-item-action list-group-item-dark">A fourth link item</a>
      <a href="#" class="list-group-item list-group-item-action list-group-item-dark">A disabled link item</a>
    </div>
  </div>

  

</div>


<?php
    include 'include/footer.php';
?>

</body>
</html>

<?php
// Else if userID and userName has not been set -> redirect to login page.
} else {
  header("Location: login.php");
  exit();
}
?>