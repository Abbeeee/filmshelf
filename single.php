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
    // Get current url and save as variable
    $url = $_SERVER['REQUEST_URI'];
    // Separate the last part of the url from the ? and save as variable
    $movieId = explode('?', $url);
    // Get only the last part of url which is the movie id from API
    $movieId = end($movieId);

    // Retrieve the selected movie from API and save the result as $movieResult
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

    // Second curl to get similar movies that are displayed below
    $curl2 = curl_init();
    curl_setopt_array($curl2, array(
        CURLOPT_URL => 'https://api.themoviedb.org/3/movie/'.$movieId.'/similar?api_key=015e505574942200be6a335688e28ad2&language=en-US&page=1',
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
    $jsonResponse2 = curl_exec($curl2);
    // decode json file retrieved
    $obj2 = json_decode($jsonResponse2); 
    // variables to be used later, for jumbotron
    $movieResult2 = $obj2;  
    curl_close($curl2);
?>

<div class="custom-backdrop" style="
    background-image: linear-gradient(to bottom, rgba(255,0,0,0), rgb(0, 0, 0) 80%),
    url('<?php echo 'http://image.tmdb.org/t/p/original'.$movieResult->backdrop_path ?>');
    ">
</div>

<div class="container" >
    <?php

        session_start();
        // Save userID from session from whatever user is currently logged in
        if ($_SESSION) {
            $current_userID = $_SESSION['userID'];
            $listID = $_SESSION['listID'];

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
        }
        

          
  

        // Print content on page by getting wanted data from $movieResult set from API above
        echo '<div class="single-container">';
        echo '<img class="single-img" src="http://image.tmdb.org/t/p/original'.   $movieResult->poster_path.'">';
        echo    '<div class="single-body">';
        echo        '<div class="single-top">';
        echo            '<h1 class="display-4">'.$movieResult->title.'</h1>';
        echo            '<span class="meta-badge mr-3">Released: '.$movieResult->release_date.'</span>',
                        '<span class="meta-badge mr-3">Rating: '.$movieResult->vote_average.' / 10</span>',
                        '<span class="meta-badge">'.$movieResult->runtime.' minutes</span>';
        echo            '<p class="lead mt-4">'.$movieResult->overview.'</p>';
        echo        '</div>';
        echo        '<div class="single-bottom">';
        echo            '<form class="single-form" method="POST">
                            <a class="btn btn-secondary" onclick="goBack()">Back</a>
                            <input id="add-btn" class="btn btn-success mx-2" type="submit" name="add" value="Add to list">';;          
                            if ($_SESSION) {
                                // Check whatever is in list
                                while ($row = $result->fetch_assoc()) {
                                    // if this movie is in list already, change button through script below
                                    if ($row['movieID'] === $movieResult->id) {
                                        // Javascript funtion to change button if movie is already in list
                                        echo '<script type="text/javascript">',
                                            'function change() {
                                                var theButton = document.getElementById("add-btn");
                                                theButton.value = "Added to list";
                                                theButton.classList.add("disabled");
                                                theButton.classList.add("added");
                                                theButton.style = "background-color: rgba(78, 78, 78)";
                                                }',
                                            'change();',
                                            '</script>';
                                        break;
                                    } 
                                }
                            }
        echo             '</form>';
        echo        '</div>';
        echo    '</div>';
        echo '</div>';


        if (isset($_POST['add']) && $_SESSION) {
            $movieTitle = $movieResult->title;

            // Change spaces in search to '-' and convert capital letters to lowercase
            $movieTitle = str_replace("'", '', $movieTitle);

            // Query to insert data into movies table in database
            $query =   "INSERT INTO movies (movieID, title) 
                        VALUES ('$movieId', '$movieTitle')";
            // Prepare query as above, and save as variable $stmt
		    $stmt = $db_connect->prepare($query);
		    // Execute query
		    $stmt->execute();

            // Query to connect data to list, through middle-table
            $query2 =   "INSERT INTO movies_lists (movieID, listID)
                         VALUES ('$movieId', '$listID')";
            // Prepare query as above, and save as variable $stmt
		    $stmt2 = $db_connect->prepare($query2);
		    // Execute query
		    $stmt2->execute();

            echo '<script type="text/javascript">',
                 'function change() {
                     var theButton = document.getElementById("add-btn");
                     theButton.value = "Added to list";
                     theButton.classList.add("disabled");
                     theButton.classList.add("added");
                     theButton.style = "background-color: rgba(78, 78, 78)";
                 }',
                 'change();',
                 '</script>';
        } else if (isset($_POST['add'])) {
            echo '<p class="need-login">You need to be logged in to add movies to your list.</p>';
        }
    ?>
</div>

<!-- Used for displaying movies from API from the different inputs set and queried above -->
<div class="container">
    <h1 class="display-4">Similar movies</h1>
    <div class="card-container d-flex justify-content-start">
        <?php
            $results = $movieResult2->results;
            
            foreach ($results as $result) {
                $movieId = $result->id;
                echo  '<a href="single.php?'.$movieId.'">'; 
                echo '<div class="card">';
                echo '<img class="card-img-top" src="http://image.tmdb.org/t/p/original'.$result->poster_path.'">';
                echo    '<div class="card-body">';
                echo      '<h5 class="card-title">'.$result->title.'</h5>';
                echo    '</div>';
                echo '</div>';
                echo '</a>';
            }     
        ?>
    </div>
</div>

<?php
    include 'include/footer.php';
?>

</body>
</html>