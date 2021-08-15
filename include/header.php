<?php
    // Include the database configuration/connection file
    include 'include/config.php'; 
?>

<!--
<nav class="navbar navbar-expand navbar-dark navbar-custom">
    <div class="container d-flex justify-content-between">
        <a class="navbar-brand mr-5" href="index.php">Filmshelf</a>
        <div class="navbar-nav">
            <a class="nav-item nav-link <?php echo ($current_page == 'index.php') ? 'active' : 'not-active' ?>" href="index.php">Home</a>
            <a class="nav-item nav-link <?php echo ($current_page == 'browse.php') ? 'active' : 'not-active' ?>" href="browse.php">Browse</a>
            <a class="nav-item nav-link <?php echo ($current_page == 'login.php' || $current_page == 'shelf.php') ? 'active' : 'not-active' ?>" href="shelf.php">Lists</a>
        </div>
    </div>
</nav>
-->

<div class="navbar-custom">
    <nav class="container navbar navbar-expand-md navbar-dark navbar-custom-2" role="navigation">

        <a href="index.php" class="navbar-brand mr-auto">Filmshelf</a>

        <button 
            class="navbar-toggler" 
            type="button" 
            data-toggle="collapse" 
            data-target="#toggler-menu"
            aria-controls="toggler-menu"
            aria-expanded="false"
            aria-lable="Toggle navigation"    
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="toggler-menu">
            <ul class="navbar-nav ml-auto text-center">
                <li>
                    <a class="nav-item nav-link <?php echo ($current_page == 'index.php') ? 'active' : 'not-active' ?>" href="index.php">Home</a>
                </li>
                <li>
                    <a class="nav-item nav-link <?php echo ($current_page == 'browse.php') ? 'active' : 'not-active' ?>" href="browse.php">Browse</a>
                </li>
                <li>
                    <a class="nav-item nav-link <?php echo ($current_page == 'login.php' || $current_page == 'shelf.php') ? 'active' : 'not-active' ?>" href="shelf.php">Lists</a>
                </li>
            </ul>
        </div>

    </nav>
</div>

