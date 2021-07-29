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
    


<div class="browse-backdrop" style="
    background-image: linear-gradient(to bottom, rgba(255,0,0,0), rgb(10, 10, 10) 80%),
    url(http://image.tmdb.org/t/p/original/s4wRC37TUwxtghhFBaze0qO1278.jpg);
    ">
    <div class="container custom-container">
        <h1 class="display-4 mb-4">Browse</h1>
        <p class="lead mb-4">This is the browse section where you can search for movies.</p>

        <form class="input-group mb-3" method="GET" autocomplete="off">
          <input type="text" name="search" class="search-bar" placeholder="Search for a movie...">
          <input class="btn btn-secondary search-btn" type="submit" value="Search">
        </form>

        <span class="lead dblock">Popular searches: </span>
        <form class="d-inline" method="GET">
          <input class="btn btn-dark btn-pill" type="submit" name="action" value="Action">
          <input class="btn btn-dark btn-pill" type="submit" name="comedy" value="Comedy">
          <input class="btn btn-dark btn-pill" type="submit" name="drama" value="Drama">
          <input class="btn btn-dark btn-pill sm-hide" type="submit" name="thriller" value="Thriller">
        </form>
    </div>
</div>

<?php

    // Display top rated movies as standard when arriving at page
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.themoviedb.org/3/movie/top_rated?api_key=015e505574942200be6a335688e28ad2&language=en-US&page=1',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
          'Authorization: Bearer 015e505574942200be6a335688e28ad2'
        ),
    ));

    // Display different results depending on what inputs has been set
    if (isset($_GET['search'])) {
        $input = $_GET['search'];
        // Change spaces in search to '-' and convert capital letters to lowercase
        $input = str_replace(' ', '-', $input);      
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.themoviedb.org/3/search/movie?api_key=015e505574942200be6a335688e28ad2&language=en-US&query='.$input.'&page=1&include_adult=false',
        ));
    } else if (isset($_GET['action'])) {
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.themoviedb.org/3/genre/28/movies?api_key=015e505574942200be6a335688e28ad2&language=en-US',
        ));
    } else if (isset($_GET['comedy'])) {
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.themoviedb.org/3/genre/35/movies?api_key=015e505574942200be6a335688e28ad2&language=en-US',
        ));
    } else if (isset($_GET['drama'])) {
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.themoviedb.org/3/genre/18/movies?api_key=015e505574942200be6a335688e28ad2&language=en-US',
        ));
    } else if (isset($_GET['thriller'])) {
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.themoviedb.org/3/genre/53/movies?api_key=015e505574942200be6a335688e28ad2&language=en-US',
        ));
    }

    // excecute curl and save in variable
    $jsonResponse = curl_exec($curl);
    // decode json file retrieved
    $obj = json_decode($jsonResponse); 
    // variables to be used later, for jumbotron
    $movieResult = $obj->results;  
    curl_close($curl);
    
?>

<!-- Used for displaying movies from API from the different inputs set and queried above -->
<div class="container">
    <div class="card-container d-flex justify-content-start">
        <?php
        // Display each of the results from the query above
        foreach($movieResult as $result) {
            $movieId = $result->id;
            echo  '<a href="single.php?'.$movieId.'">'; 
            echo  '<div class="card">';
            echo  '<img class="card-img-top" src="http://image.tmdb.org/t/p/original'.$result->poster_path.'">';
            echo    '<div class="card-body">';
            echo      '<h5 class="card-title">'.$result->title.'</h5>';
            echo    '</div>';
            echo  '</div>';
            echo  '</a>';
        }        
        ?>
    </div>
</div>

<?php
    include 'include/footer.php';
?>

</body>
</html>