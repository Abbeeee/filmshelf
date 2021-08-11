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
    background-image: linear-gradient(to bottom, rgba(255,0,0,0), rgb(10, 10, 10) 80%),
    url('http://image.tmdb.org/t/p/original/s4wRC37TUwxtghhFBaze0qO1278.jpg');
    ">

    
  <div class="container custom-container">
    <form class="btn-container" action="logout.php">
      <button class="btn btn-danger">Log out</button>
    </form>
    <h1 class="display-4 mb-4">Welcome <?php echo $_SESSION['userName']; ?></h1>
    <p class="lead mb-4">This is the shelf section where you can view any lists and movies you have added to your shelf.</p>

    <?php
        // Save userID from session from whatever user is currently logged in
        $current_userID = $_SESSION['userID'];
        // Display the lists the current user has
    		$query = "SELECT lists.*
      		        FROM lists
                  WHERE lists.userID = $current_userID";
    
    		// Prepare query as above, and save as variable $stmt
    		$stmt = $db_connect->prepare($query);
    		// Execute query
    		$stmt->execute();
    		// Get the result of query
    		$result = $stmt->get_result();
    ?>

    <!-- The list table -->
    <div class="container my-5 d-flex justify-content-center table-container">

      <!-- When remove button is clicked, go into remove.php -->
      <div class="list-group">
        <?php
          // Display the lists the current user has
  		    $query = "SELECT *
  		              FROM movies
                    JOIN movies_lists
                    ON movies.movieID = movies_lists.movieID
                    JOIN lists
                    on lists.listID = movies_lists.listID
                    WHERE lists.userID = $current_userID";  
  		    // Prepare query as above, and save as variable $stmt
  		    $stmt = $db_connect->prepare($query);
  		    // Execute query
  		    $stmt->execute();
  		    // Get the result of query
  		    $result = $stmt->get_result();

          foreach ($result as $item) {
              echo   '<div>';
              echo   '<a href="single.php?'.$item['movieID'].'" class="d-inline-block list-movie">'.$item['title'].'</a>'; 
              echo   '<a class="list-btn" href="remove.php?'.$item['movieID'].'">Remove</a>';  
              echo   '</div>';         
          }

          // free results
  				$stmt->free_result();
     			// close statement
     			$stmt->close();
          // close connection
  				$db_connect->close(); 
        ?>
      </div>
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