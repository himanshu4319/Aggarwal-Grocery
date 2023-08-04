<?php 
include ('LOGIN.php');
if(isset($_SESSION['Email'])){
	header('location:index.php');
}
else{
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign In - Aggarwal Grocery</title>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<link rel="icon" type="icon" href="images/logo2.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script defer src="https://use.fontawesome.com/release/v5.0.7/js/all.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="Sign.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body class="bg-success">
	<p class="" style="font-size: 40px;  padding: 6% 38%; "><a class="nav-link" style="color: white; font-family: ubuntu;" href="index.php"><strong> Aggarwal Grocery</strong></a></p>
	<div class="row">
			
		<div class="col-md-6 col-lg-6 col-sm-6 col-xl-6">
			<img  style="padding: 0% 15%" src="images/Store.png" width="90%" height="90%;">	
		</div>
		<div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 " style="padding: 0% 10%; ">
			<p style="color: white; font-size: 20px; padding: 3% 35%;">Sign In Here</p>
			<div class="form-group" style="padding: 0% 1%;">
				<form  method="POST">
					<label for="text" style="color: white;">Email</label>
					<input type="text " class="form-control ml-auto shadow-lg p-3 mb-5 bg-white rounded" name="Email" placeholder="Enter Email"> 
					<label for="Password" style="color: white;">Password</label>
					<input type="Password" class="form-control ml-auto shadow-lg p-3 mb-5 bg-white rounded" name="pass" placeholder="Enter Password" > <br>
					<button class="btn btn-light" style="margin-left: 40%; margin-top: -2%;" type="Submit" name="Submit">Sign In</button>
					<div >
						<p style="color: white;"><?php echo $msg ?></p>
					</div>
				</form>
				<small style="color: white;">Not a User!  <a style="text-decoration: none; color: white;" class="dark" href="SignUp.php"><strong>Register Here</strong></a></small>
			</div>
		</div>
	</div>
	<?php include"footer.php"; ?>