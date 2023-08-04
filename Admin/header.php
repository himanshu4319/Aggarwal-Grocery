<?php 
require('connection.php');
if(isset($_SESSION['Admin_Login']) && $_SESSION['Admin_username'] !=''){
	}
else{
	header('location:Admin_Login.php');
	die();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container-fluid bg-light">
		<nav class="navbar navbar-expand-lg navbar-dark bg-light">
			<a href="index.php" class="navbar-brand text-dark active" style="font-size: 30px; padding: 0px 20px; font-family: 'Ubuntu', sans-serif;"><strong> Aggarwal Grocery</strong></a>
			<button class="btn btn-dark navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item  ">
						<a class="nav-link text-dark "href="index.php" style="font-size: 18px; padding: 0px 20px;  font-family: 'Ubuntu', sans-serif;"><strong> Our Orders </strong></a>
					</li>
					<li class="nav-item "><a class="nav-link text-dark"href="Products.php" style="font-size: 18px; padding: 0px 20px;  font-family: 'Ubuntu', sans-serif;"><strong>Products</strong></a>
					</li>
					<li class="nav-item"><a class="nav-link text-dark" style="font-size: 18px; padding: 0px 20px;  font-family: 'Ubuntu', sans-serif;" href="categories.php"><strong>Categories</strong></a></li>
					<li class="nav-item "><a class="nav-link text-dark"href="Contact.php" style="font-size: 18px; padding: 0px 20px;  font-family: 'Ubuntu', sans-serif;"><strong>Feedback</strong></a>
					</li>
					<li class="nav-item dropdown active"><a class="nav-link text-dark dropdown-toggle" style="font-size: 18px; padding: 0px 20px;  font-family: 'Ubuntu', sans-serif;" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong><?php echo "Hi , ".$_SESSION['Admin_username'] ; ?></strong></a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" style="font-size: 18px; padding: 0px 20px;  font-family: 'Ubuntu', sans-serif;" href="Logout.php"><strong>Logout</strong></a>
						</div>			
					</li>

				</ul>
			</div>	
		</nav>		
	</div>	
</body>
</html>