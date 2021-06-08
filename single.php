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



<?php
    $url = $_SERVER['REQUEST_URI'];
    $movieId = explode('?', $url);
    $movieId = end($movieId);
    echo $movieId;

    // Display top rated movies as standard when arriving at page
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.themoviedb.org/3/movie/'.$movieId.'?api_key=015e505574942200be6a335688e28ad2&language=en-US',
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
    $movieResult = $obj;  
    curl_close($curl);


    
?>




<?php

    echo '<div class="card">';
    echo '<img class="card-img-top" src="http://image.tmdb.org/t/p/original'.$movieResult->poster_path.'">';
    echo     '<div class="card-body">';
    echo         '<h5 class="card-title">'.$movieResult->title.'</h5>';
    echo         '<a class="btn btn-light" href="single.php">Movie details</a>';
    echo     '</div>';
    echo '</div>';

?>










<?php
    include 'include/footer.php';
?>

</body>
</html>