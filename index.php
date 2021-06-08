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

<!-- Run javascript function for the image slideshow -->
<body onload="slideShow()">

<?php
    include 'include/header.php'; 
?>
    
<?php

    // initiate curl 
    $curl = curl_init();

    // set curl options
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.themoviedb.org/3/movie/popular?api_key=015e505574942200be6a335688e28ad2&language=en-US&page=1',
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

    // excecute curl and save in variable
    $jsonResponse = curl_exec($curl);

    // decode json file retrieved
    $obj = json_decode($jsonResponse);

    // Save the results within the json file above as $movieResult
    $movieResult = $obj->results;

    curl_close($curl);

?>

<?php
//print_r($movieResult);
        // Display each of the results from the query above
        for ($i = 0; $i < 4; $i++) {
            $movieId = $movieResult[$i]->id;
                    // Has style to allow for API image to be set as background image
            echo   '<div class="jumbotron jumbotron-fluid jumbotron-custom fade" style="
                         background-image: linear-gradient(220deg, rgba(255,0,0,0), rgb(0, 0, 0) 75%),
                         url(http://image.tmdb.org/t/p/original'.$movieResult[$i]->backdrop_path.');
                         ">';
            echo     '<div class="container jumbotron-text-container">';
                       // Display from API using the php
            echo       '<h1 class="display-2 mb-4">'.$movieResult[$i]->title.'</h1>';
            echo       '<p class="lead mb-4">'.mb_strimwidth($movieResult[$i]->overview, 0, 150, "...").'</p>';
            echo       '<a class="btn btn-light" href="single.php?'.$movieId.'">Go to movie</a>';
            echo     '</div>';
            echo   '</div>';
        }
?>

<!-- Used for displaying movies from API from the different inputs set and queried above -->
<div class="container">
  <h1 class="display-4">Popular movies</h1>
    <div class="card-container d-flex justify-content-start">
      <?php
        // Display each of the results from the query above
        for ($i = 3; $i < 7; $i++) {
            $movieId = $movieResult[$i]->id;
            echo  '<a href="single.php?'.$movieId.'">'; 
            echo  '<div class="card">';
            echo  '<img class="card-img-top" src="http://image.tmdb.org/t/p/original'.$movieResult[$i]->poster_path.'">';
            echo    '<div class="card-body">';
            echo      '<h5 class="card-title">'.$movieResult[$i]->title.'</h5>';
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