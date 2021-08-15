<?php
    // Include the database configuration/connection file
    include 'include/config.php'; 
?>

<div class="navbar-custom">
    <nav class="container navbar navbar-expand-md navbar-dark navbar-custom-2" role="navigation">

        <a href="index.php" class="navbar-brand mr-auto">Filmbrowse</a>

        <button 
            class="navbar-toggler" 
            type="button" 
            data-toggle="collapse" 
            data-target="#toggler-menu"
            aria-controls="toggler-menu"
            aria-expanded="false"
            aria-lable="Toggle navigation"    
        >
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgb(230, 222, 222)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
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
                    <a class="nav-item nav-link <?php echo ($current_page == 'login.php' || $current_page == 'shelf.php') ? 'active' : 'not-active' ?>" href="shelf.php">Your list</a>
                </li>
            </ul>
        </div>

    </nav>
</div>

