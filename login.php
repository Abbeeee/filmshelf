<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Filmshelf</title>
</head>

<body>

<?php
    include 'include/header.php'; 
?>

<div class="custom-backdrop" style="
    background-image: linear-gradient(to bottom, rgba(255,0,0,0), rgb(10, 10, 10) 80%),
    url('http://image.tmdb.org/t/p/original/7JENyUT8ABxcvrcijDBVpdjgCY9.jpg');
    ">

    

  <div class="container custom-container login-container">
    <h1 class="display-4 mb-4">Login</h1>
    <p class="lead mb-4">You must login in order to see your film list.</p>
  
      <!-- When button is pressed, run login-config.php file -->
      <form class="login-form" action="login-config.php" method="post">
  
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username" placeholder="Enter your Username...">
        </div>
  
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter your Password...">
        </div>

        <?php if (isset($_GET['error'])) { ?>
              <p class="error"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg><?php echo $_GET['error'] ?></p>
        <?php } ?>
  
        <button class="btn btn-secondary mt-3" type="submit" value="Login">Login</button>
        
      </form>
        
  </div>

</div>


<?php
    include 'include/footer.php';
?>

</body>
</html>