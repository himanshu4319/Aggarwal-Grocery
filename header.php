<?php 
require('LOGIN.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<meta charset="utf-8">
	<title>Aggarwal Grocery</title>
	<link rel="icon" type="icon" href="images/logo.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/boot.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body>
<section class="bg-success">

	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg bg-success navbar-dark">
			<a class="navbar-brand" href="index.php"><p style="font-size: 35px; padding: 0% 15%; font-family: 'Ubuntu', sans-serif;"><strong> Aggarwal Grocery </strong></p></a>
			<button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active "><form class="form-inline" method="POST" action="search.php">
					    <input class="form-control mr-sm-2" name="search" placeholder="Search" aria-label="Search">
					    <button class="btn btn-light  my-2 my-sm-0" type="submit" name="Search_bar" style="color: #28A745;">Search</button>
					</form></li>
					<li class="nav-item active ">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item active ">
						<a class="nav-link" href="categories.php">Categories</a>
					</li>
					<li class="nav-item active ">
						<a class="nav-link" href="BP.php">Best Offers</a>
					</li>
					<li class="nav-item active ">
						<a class="nav-link" href="About.php">About</a>
					</li>
					<?php
					$count=0; 
					if(isset($_SESSION['cart'])){
						$count = count($_SESSION['cart']);
					}
					?>
					<li class="nav-item active ">
						<a class="nav-link" href="cart.php"><img src="images/cart.png" width="20px" height="20px"><span class="badge badge-success"><?php echo $count;?></span></a>
					</li><?php
					if(isset($_SESSION['Email'])){
						$name = $_SESSION['fname'];?>
						<li class="nav-item dropdown active ">
        					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo"Hi, " .$name; ?>
        					</a>
       						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        						<a class="dropdown-item" href="profile.php">Profile</a>
        						<a class="dropdown-item" href="Your_orders.php">Your Orders</a>
        						<a class="dropdown-item" href="logout.php">Logout</a>
        					</div>
      					</li>
      				<?php } 
      				 else{ ?>
      				 	<li class="nav-item dropdown active ">
        					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account
        					</a>
       						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        						<a class="dropdown-item" href="SignIn.php">Sign In</a>
        						<a class="dropdown-item" href="SignUp.php">Sign UP</a>
        					</div>
      					</li>
      				<?php }	?>
				</ul>
			</div>	
		</nav>
	</div>
</section>