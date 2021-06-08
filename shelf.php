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
    
<div class="container browse-container">
  <h1 class="display-4 mb-4">The shelf</h1>
  <p class="lead mb-4">This is the shelf section where you can view any movies you have added to your shelf.</p>
</div>


<!-- The list table -->
<div class="container d-flex justify-content-around table-container">

	<table class="table">
		<thead>
			<tr>
				<th>The movie lists</th>
        <th>Hmm</th>
			</tr>
		</thead>
		<tbody>
      <tr>
				<td>Title of list</td>
        <td>
          <form method="POST">
				  <button type="submit" value="">Edit</button></form>
        </td>
			</tr>
      <tr>
				<td>Title of list</td>
        <td>
          <form method="POST">
				  <button type="submit" value="">Edit</button></form>
        </td>
			</tr>
      <tr>
				<td>Title of list</td>
        <td>
          <form method="POST">
				  <button type="submit" value="">Edit</button></form>
        </td>
			</tr>
      <tr>
				<td>Title of list</td>
        <td>
          <form method="POST">
				  <button type="submit" value="">Edit</button></form>
        </td>
			</tr>    
		</tbody>
	</table>

  <table class="table">
		<thead>
			<tr>
				<th>The movies inside of selected list</th>
        <th>Hmmm</th>
			</tr>
		</thead>
		<tbody>
      <tr>
				<td>Title of movie</td>
        <td>
          <form method="POST">
				  <button type="submit" value="">Edit</button></form>
        </td>
			</tr>
      <tr>
				<td>Title of movie</td>
        <td>
          <form method="POST">
				  <button type="submit" value="">Edit</button></form>
        </td>
			</tr>
      <tr>
				<td>Title of movie</td>
        <td>
          <form method="POST">
				  <button type="submit" value="">Edit</button></form>
        </td>
			</tr>
      <tr>
				<td>Title of movie</td>
        <td>
          <form method="POST">
				  <button type="submit" value="">Edit</button></form>
        </td>
			</tr>
      <tr>
				<td>Title of movie</td>
        <td>
          <form method="POST">
				  <button type="submit" value="">Edit</button></form>
        </td>
			</tr>        
		</tbody>
	</table>

</div>

<?php
    include 'include/footer.php';
?>

</body>
</html>