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
    

<div class="container browse-container">
  <h1 class="display-4 mb-4">Browse</h1>
  <p class="lead mb-4">This is the browse section where you can search for movies which are retreived from the API.</p>

  <form class="input-group mb-3" method="GET">
    <input type="text" class="search-bar" placeholder="Search for a movie...">
    <input class="btn btn-outline-secondary search-btn" type="submit" value="Search">
  </form>

  <span class="lead">Popular searches: </span>
  <a href="#" class="badge badge-light">Action</a>
  <a href="#" class="badge badge-light">Comedy</a>
  <a href="#" class="badge badge-light">Drama</a>
  <a href="#" class="badge badge-light">Thriller</a>
</div>


<!-- Will be used for displaying movies from API -->
<div class="container">
    <div class="card-container d-flex justify-content-center">
        <div class="card">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1585951237313-1979e4df7385?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80">
            <div class="card-body">
                <h5 class="card-title">Title</h5>
                <a class="btn btn-light" href="#">Movie details</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1585951237313-1979e4df7385?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80">
            <div class="card-body">
                <h5 class="card-title">Title</h5>
                <a class="btn btn-light" href="#">Movie details</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1585951237313-1979e4df7385?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80">
            <div class="card-body">
                <h5 class="card-title">Title</h5>
                <a class="btn btn-light" href="#">Movie details</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1585951237313-1979e4df7385?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80">
            <div class="card-body">
                <h5 class="card-title">Title</h5>
                <a class="btn btn-light" href="#">Movie details</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1585951237313-1979e4df7385?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80">
            <div class="card-body">
                <h5 class="card-title">Title</h5>
                <a class="btn btn-light" href="#">Movie details</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1585951237313-1979e4df7385?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80">
            <div class="card-body">
                <h5 class="card-title">Title</h5>
                <a class="btn btn-light" href="#">Movie details</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1585951237313-1979e4df7385?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80">
            <div class="card-body">
                <h5 class="card-title">Title</h5>
                <a class="btn btn-light" href="#">Movie details</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1585951237313-1979e4df7385?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80">
            <div class="card-body">
                <h5 class="card-title">Title</h5>
                <a class="btn btn-light" href="#">Movie details</a>
            </div>
        </div>
    </div>
</div>



<?php
    include 'include/footer.php';
?>

</body>
</html>
