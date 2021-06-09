<?php
    session_start();
    include 'include/config.php';

    // Get current url and save as variable
    $url = $_SERVER['REQUEST_URI'];
    // Separate the last part of the url from the ? and save as variable
    $movieId = explode('?', $url);
    // Get only the last part of url which is the movie id from API
    $movieId = end($movieId);

    $listId = $_SESSION['listID'];

    // Query to delete selected movie from list
    $query =   "DELETE FROM movies_lists 
                WHERE movieID = $movieId
                AND listID = $listId";

    // Prepare query as above, and save as variable $stmt
    $stmt = $db_connect->prepare($query);
    // Execute query
    $stmt->execute();

    // Query to delete selected movie from list
    $query2 =   "DELETE FROM movies
                 WHERE movieID = $movieId";
    // Prepare query as above, and save as variable $stmt
	$stmt2 = $db_connect->prepare($query2);
	// Execute query
	$stmt2->execute();

    header('Location: shelf.php');

?>