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
  // Display each of the results from the query above
  $titleLength = 30;
  $overviewLength = 150;
  for ($i = 0; $i < 3; $i++) {
      $movieId = $movieResult[$i]->id;
      $movieTitle = $movieResult[$i]->title;
      $movieOverview = $movieResult[$i]->overview;

      if (strlen($movieTitle) > $titleLength) {
        $movieTitle = wordwrap($movieTitle, $titleLength);
        $movieTitle = explode("\n", $movieTitle, 2);
        $movieTitle = $movieTitle[0].'&hellip;';
      }

      if (strlen($movieOverview) > $overviewLength) {
        $movieOverview = wordwrap($movieOverview, $overviewLength);
        $movieOverview = explode("\n", $movieOverview, 2);
        $movieOverview = $movieOverview[0].'&hellip;';
      }      
              // Has style to allow for API image to be set as background image
      echo   '<div class="jumbotron jumbotron-custom fade" style="
                   background-image: linear-gradient(200deg, rgba(255,0,0,0), rgb(10, 10, 10) 75%),
                   url(http://image.tmdb.org/t/p/original'.$movieResult[$i]->backdrop_path.');
                   ">';
      echo     '<div class="container jumbotron-text-container xs-center">';
                 // Display from API using the php
      echo       '<h1 class="display-3 mb-4">'.$movieTitle.'</h1>';
      echo       '<p class="lead mb-4 sm-hide">'.$movieOverview.'</p>';
      echo       '<a class="btn btn-light jumbo-btn" href="single.php?'.$movieId.'">Go to movie</a>';
      echo     '</div>';
      echo   '</div>';
  }
?>

<!-- Used for displaying movies from API from the different inputs set and queried above -->
<div class="container">
  <h1 class="display-4 sm-center">Popular movies</h1>
    <div class="card-container d-flex justify-content-center">
      <?php
        // Display each of the results from the query above
        for ($i = 3; $i < 7; $i++) {
            $movieId = $movieResult[$i]->id;
            echo  '<a href="single.php?'.$movieId.'">'; 
            echo  '<div class="card">';
            echo  '<img class="card-img-top" src="http://image.tmdb.org/t/p/original'.$movieResult[$i]->poster_path.'">';
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