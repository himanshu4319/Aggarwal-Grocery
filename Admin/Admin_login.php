<?php 
require('connection.php');
$msg = ' ';
if(isset($_POST['Submit'])){
	$user = mysqli_real_escape_string($conn , $_POST['Username']);
	$pass = mysqli_real_escape_string($conn , $_POST['Password']);
	
	$sql = "SELECT * From admin_user WHERE Username = '$user' and Password = '$pass'";
	$res = mysqli_query($conn, $sql);
	@$count = mysqli_num_rows($res);
	if($count > 0){
		$_SESSION['Admin_Login'] = 'yes';
		$_SESSION['Admin_username'] = $user;
		header('location:index.php');
	}
	else{
		$msg = "Please Enter correct Login Details";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
	<title>Admin Log In - Aggarwal Grocery</title>
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
	<p class="navbar-brand " style="font-size: 40px; padding: 6% 38%; color: white;font-family: ubuntu"><strong> Aggarwal Grocery</strong></p>
	<div class="row">
			
		<div class="col-md-6 col-lg-6 col-sm-6 col-xl-6">
			<img  style="padding: 0% 15%" src="images/store.png" width="100%" height="100%;">	
		</div>
		<div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 " style="padding: 0% 10%; ">
			<p style="color: white; font-size: 20px; padding: 3% 35%; font-family: ubuntu;"><strong>Admin Log In </strong></p>
			<div class="form-group" style="padding: 0% 1%;">
				<form  method="POST">
					<label for="text" style="color: white;">Username</label>
					<input type="text " class="form-control ml-auto shadow-lg p-3 mb-5 bg-white rounded" name="Username" placeholder="Enter Username"> 
					<label for="Password" style="color:white;">Password</label>
					<input type="Password" class="form-control ml-auto shadow-lg p-3 mb-5 bg-white rounded" name="Password" placeholder="Enter Password" > <br>
					<button class="btn btn-outline-light" style="margin-left: 40%; margin-top: -2%;" type="Submit" name="Submit">Sign In</button>

				</form>
				<div>
						<?php echo $msg ?>
				</div>	
			</div>
		</div>
	</div>
	<?php
		//include ('Connection.php');
		$msg_f = '';
		if (isset($_POST['news']))
		{
	
			$News = $_POST['Newsletter'];
			if(empty($News)){
				$msg_f = "Enter a valid Email id.";
			}
			else
			{
				$News = md5($News);
				$query = "SELECT * FROM newsletter WHERE Email = '$News' ";
				$result = mysqli_query($conn , $query);
				if (mysqli_num_rows($result)>0) 
				{
					$msg_f = "Newsletter already Subscribed.";
				}
				else
				{
				
					$sql = "INSERT INTO Newsletter (Email) VALUES ('$News')";

					if($conn->query($sql)===True){
						$msg_f = "Thanks for Subscribing our Newsletter";
					}
				}
			}	
		}

?>
	<footer style="margin-top: 10%;">
			<div class="container-fluid bg-success ">
				<div class="row">
					<div class="col-md-6 col-md-6 col-sm-6 col-xl-6 ">
						<form class="form-group  " style="padding: 0% 15%;" method="POST">
							<label for="mail" style="color: white;">Subscribe Our Newsletter </label>
							<input type="text" name="Newsletter" class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" placeholder="Enter your Email"><button type="Submit" name="news" class="btn btn-outline-light">Subscribe</button><br>
							<?php echo $msg_f; ?><br>
							<small style="color: white; margin-top: -5px;">We'll never share your email with anyone else.</small>
						</form>

							
					</div>
					<div class="col-md-6 col-xl-6 col-sm-6 col-md-6">
						<p style="font-size: 20px; color: white; padding: 0% 30%;">Links</p>
						<a style="padding: 0% 7.5%; color: white;" href="www.twitter.com/himanshuaggar10" ><i class="icon ion-social-twitter" ></i> Twitter</a>
						<a style="color: white; padding: 0% 7.5%;" href="www.instagram.com/himanshu4319"><i class="icon ion-social-instagram"></i> Instagram</a>
						<a style="color: white; padding: 0% 7.5%;" href="www.facebook.com/himanshu.aggarwal.52090"><i class="icon ion-social-facebook"></i> Facebook</a>
					</div>	
				</div><br>
				<center>
					<div ">
						<p style="color: white;">© 2021 copyright : Aggarwal Group Pvt. Ltd.</p>
					</div>
				</center>
			</div>
</footer>
</html>