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
            <a class="nav-item nav-link <?php echo ($current_page == 'login.php' || $current_page == 'shelf.php') ? 'active' : 'not-active' ?>" href="shelf.php">Lists</a>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/main.js"></script>