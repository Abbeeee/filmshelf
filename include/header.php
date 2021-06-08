<?php
    // Include the database configuration/connection file
    include 'include/config.php'; 
?>

<nav class="navbar navbar-fluid navbar-expand navbar-dark navbar-custom">
    <div class="container d-flex justify-content-between">
        <a class="navbar-brand mr-5" href="index.php">Filmshelf</a>
        <div class="navbar-nav">
            <a class="nav-item nav-link <?php echo ($current_page == 'index.php') ? 'active' : 'not-active' ?>" href="index.php">Home</a>
            <a class="nav-item nav-link <?php echo ($current_page == 'browse.php') ? 'active' : 'not-active' ?>" href="browse.php">Browse</a>
            <a class="nav-item nav-link <?php echo ($current_page == 'login.php' || $current_page == 'shelf.php') ? 'active' : 'not-active' ?>" href="shelf.php">Login</a>
        </div>
    </div>
</nav>