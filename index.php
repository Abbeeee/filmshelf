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

    // variables to be used later, for jumbotron
    $movieTitle = $obj->results[0]->title;
    $movieText = $obj->results[0]->overview;
    $movieBackdrop = $obj->results[0]->backdrop_path;

    // second set of variables to be used later, for jumbotron
    $movieTitle2 = $obj->results[2]->title;
    $movieText2 = $obj->results[2]->overview;
    $movieBackdrop2 = $obj->results[2]->backdrop_path;

    // third set of variables to be used later, for jumbotron
    $movieTitle3 = $obj->results[3]->title;
    $movieText3 = $obj->results[3]->overview;
    $movieBackdrop3 = $obj->results[3]->backdrop_path;

    // fourth set of variables to be used later, for selection of movies below
    $movieTitle4 = $obj->results[4]->title;
    $moviePoster4 = $obj->results[4]->poster_path;
    $movieTitle5 = $obj->results[5]->title;
    $moviePoster5 = $obj->results[5]->poster_path;
    $movieTitle6 = $obj->results[6]->title;
    $moviePoster6 = $obj->results[6]->poster_path;
    $movieTitle7 = $obj->results[7]->title;
    $moviePoster7 = $obj->results[7]->poster_path;

    curl_close($curl);

?>

<!-- Has style to allow for API image to be set as background image -->
<div class="jumbotron jumbotron-fluid jumbotron-custom fade" style="
    background-image: linear-gradient(to left, rgba(255,0,0,0), rgb(0, 0, 0) 75%),
    url('<?php echo 'http://image.tmdb.org/t/p/original'.$movieBackdrop ?>');
    ">
  <div class="container jumbotron-text-container">
    <!-- Display from API using the php -->
    <h1 class="display-3 mb-4"><?php echo $movieTitle ?></h1>
    <p class="lead mb-4"><?php echo mb_strimwidth($movieText, 0, 140, "..."); ?></p>
    <button class="btn btn-light">Go to movie</button>
  </div>
</div>

<!-- Has style to allow for API image to be set as background image -->
<div class="jumbotron jumbotron-fluid jumbotron-custom fade" style="
    background-image: linear-gradient(to left, rgba(255,0,0,0), rgb(0, 0, 0) 75%),
    url('<?php echo 'http://image.tmdb.org/t/p/original'.$movieBackdrop2 ?>');
    ">
  <div class="container jumbotron-text-container">
    <!-- Display from API using the php -->
    <h1 class="display-3 mb-4"><?php echo $movieTitle2 ?></h1>
    <p class="lead mb-4"><?php echo mb_strimwidth($movieText2, 0, 140, "..."); ?></p>
    <button class="btn btn-light">Go to movie</button>
  </div>
</div>

<!-- Has style to allow for API image to be set as background image -->
<div class="jumbotron jumbotron-fluid jumbotron-custom fade" style="
    background-image: linear-gradient(to left, rgba(255,0,0,0), rgb(0, 0, 0) 75%),
    url('<?php echo 'http://image.tmdb.org/t/p/original'.$movieBackdrop3 ?>');
    ">
  <div class="container jumbotron-text-container">
    <!-- Display from API using the php -->
    <h1 class="display-3 mb-4"><?php echo $movieTitle3 ?></h1>
    <p class="lead mb-4"><?php echo mb_strimwidth($movieText3, 0, 140, "..."); ?></p>
    <button class="btn btn-light">Go to movie</button>
  </div>
</div>


<!-- Will be used for displaying movies from API -->
<div class="container">
    <h1 class="text-center">Other popular movies</h1>
    <div class="card-container d-flex justify-content-center">
        <div class="card">
            <img class="card-img-top" src="<?php echo 'http://image.tmdb.org/t/p/original'.$moviePoster4 ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $movieTitle4 ?></h5>
                <a class="btn btn-light" href="#">Movie details</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="<?php echo 'http://image.tmdb.org/t/p/original'.$moviePoster5 ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $movieTitle5 ?></h5>
                <a class="btn btn-light" href="#">Movie details</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="<?php echo 'http://image.tmdb.org/t/p/original'.$moviePoster6 ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $movieTitle6 ?></h5>
                <a class="btn btn-light" href="#">Movie details</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="<?php echo 'http://image.tmdb.org/t/p/original'.$moviePoster7 ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $movieTitle7 ?></h5>
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