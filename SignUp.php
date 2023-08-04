<?php
require('Backened/Connectio.php');
$msg = "";
$msg_name = "";
$msg_Gen = "";
$msg_DOB = "";
$msg_Email = "";
$msg_pass = "";
$msg_pin = "";
$msg_Add1 = "";
$msg_mob = "";

//initializing variables
if(isset($_POST['SignUp']))
{

	$first_name = mysqli_real_escape_string($conn , $_POST['fname']);
	$last_name = mysqli_real_escape_string($conn , $_POST['lname']);
	@$Gen_der = mysqli_real_escape_string($conn , $_POST['Gender']);
	$D_O_B = mysqli_real_escape_string($conn , $_POST['DOB']);
	$Email = mysqli_real_escape_string($conn , $_POST['Email']);
	$mobile = mysqli_real_escape_string($conn , $_POST['mobile']);
	$almo = mysqli_real_escape_string($conn , $_POST['almo']);
	$pass = mysqli_real_escape_string($conn , $_POST['pass']);
	$Address_1 = mysqli_real_escape_string($conn ,$_POST['Address1']);
	$Address_2 = mysqli_real_escape_string($conn , $_POST['Address2']);
	$City = mysqli_real_escape_string($conn , $_POST['city']);
	$pincode = mysqli_real_escape_string($conn , $_POST['Pincode']);
	$state = mysqli_real_escape_string($conn , $_POST['State']);
	$i = 0;
	
	$query = " SELECT * FROM register_1 WHERE Email = '$Email'";
	$result = mysqli_query($conn , $query);
	$count = mysqli_num_rows($result);
	if($count != 0) {
		$msg = "User Already Exist.";
	}
	else{
		if(empty($first_name)){
			$msg_name = "First Name is required.";
			$i++;
		}
		if(empty($D_O_B)){
			$msg_DOB = "Date of Birth is required.";
			$i++;
		}
		if (empty($Email)) {
			$msg_Email = "Email is required.";
			$i++;
		}
		if(empty($pass)){
			$msg_pass = "Password is required.";
			$i++;
		}
		if(empty($Gen_der)){
			$msg_Gen = "Gender is required.";
			$i++;
		}
		if(empty($Address_1)){
			$msg_Add1 = "Address is necessary for Delivery";
			$i++;
		}
		if(empty($pincode)){
			$msg_pin = "Pincode is required.";
			$i++;
		}
		if(empty($mobile)){
			$msg_mob = "Mobile number is required.";
			$i++;
		}
		if($i == 0){

			$pass = md5($pass);//this will encrypt the mail

			$sql = "INSERT INTO register_1 (fname, lname, Gen, DOB, Email, mobile, almo, pass, Address1, Address2, city, Pincode, State) VALUES ('$first_name', '$last_name', '$Gen_der', '$D_O_B', '$Email', '$mobile', '$almo', '$pass', '$Address_1', '$Address_2', '$City', '$pincode', '$state')";

			if ($conn->query($sql) === TRUE) {
				$_SESSION['fname'] = $first_name;
			$_SESSION['lname'] = $last_name;
			$_SESSION['SignIn'] = 'yes';
			$_SESSION['Email'] = $Email;
				header('location: Reg_thanks.php');
			} 
			else {
			 	echo "Error: " . $sql . "<br>" . $conn->error;

			}

			$conn->close();
		}
	}		
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aggarwal Grocery</title>
	<link rel="icon" type="icon" href="images/logo2.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script defer src="https://use.fontawesome.com/release/v5.0.7/js/all.js"></script>
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
			<a class="navbar-brand" href="index.php"><p style="font-size: 35px; padding: 0% 15%;"> Aggarwal Grocery</p></a>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a href="SignIn.php" class="nav-link" style="color: white; font-size: 20px;">Login</a></li>
			</ul>
			
		</nav>
		<center>
			<p style="padding: 0% 15%; font-size: 30px; color: white;">Register Here</p>
		</center>
	</div>
	</section>
	<div class="Danger">
		<center>
			<p style="color: red; font-size: 30px; padding: 2.5% 0%;"><?php echo $msg; ?></p>
		</center>	
	</div>
<form method="POST" style="margin-top: 3%">
	<div class="form-group ">
		<p style="font-size: 30px; text-align: center;">Basic Details</p>
		<div class="row ">
			<div class="col-md-6 col-lg-6" style="padding: 0% 7%; ">
				<label for="fname">First Name</label>
				<input type="text " class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" name = "fname" placeholder="Enter First Name" >
				<div class="Danger">
					<p style="color: red;"><?php echo $msg_name; ?></p>
				</div>
			</div>
			<div class="col-md-6 col-lg-6" style="padding: 0% 7%;">
				<label for="fname">Last Name</label>
				<input type="text " class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" name = "lname" placeholder="Enter Last Name" >
			</div>
		</div><br>
		<div class="row">
			<div class="col-md-6 col-lg-6" style="padding: 0% 7%;">
				<label>Gender</label>
				<div class="col-md-6 ">
					<label><input type="radio" class="form-horizontal shadow-sm p-3 mb-5 bg-white rounded" name = "Gender" value="Male"> Male</label><br>
					<label><input type="radio" class="form-horizontal shadow-sm p-3 mb-5 bg-white rounded" name = "Gender" value="Female"> Female</label><br>
					<label><input type="radio" class="form-horizontal shadow-sm p-3 mb-5 bg-white rounded" name = "Gender" value="Others"> Others</label>
					<div>
						<p style="color: red;"><?php echo $msg_Gen; ?></p>
					</div>	
				</div>
			</div>
			<div class="col-md-6 col-lg-6" style="padding: 0% 7%;">
				<label for="DOB" >Date Of Birth (D.O.B):</label>
				<input type="date" class="form-control shadow-sm p-3 mb-5 bg-white rounded" name="DOB" >
				<div>
					<p style="color: red;"><?php echo $msg_DOB; ?></p>
				</div>
			</div>	
		</div><br>
		<div class="form-group">
			<section>
				<p style="font-size: 30px; text-align: center;">Contact Details</p>
				<div class="row">
					<div class="col-md-6 col-lg-6" style="padding: 0% 7%; ">
						<label for="Email">Email</label>
						<input type="text " class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" name = "Email" placeholder="Enter Email">
						<div>
							<p style="color: red;"><?php echo $msg_Email;?></p>
						</div>		
						<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="col-md-6 col-lg-6" style="padding: 0% 7%;">
						<label for="mobile">Mobile Number</label>
						<input type="text " class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" name = "mobile"  placeholder="Enter your Mobile Number" >
						<div>
							<p style="color: red;"><?php echo $msg_mob; ?></p>
						</div>	
						<small id="emailHelp" class="form-text text-muted">We'll never share your Mobile Number with anyone else.</small>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-6 col-lg-6" style="padding: 0% 7%; ">
						<label for="Almo">Alternate Mobile Number</label>
						<input type="text " class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" name = "almo"  placeholder="Enter Alternate Mobile Number">
						<small id="emailHelp" class="form-text text-muted">We'll never share your Mobile Number with anyone else.</small>
					</div>
					<div class="col-md-6 col-lg-6" style="padding: 0% 7% ">
						<label for="password">Password</label>
						<input type="Password" class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" name = "pass" placeholder="Enter Password">
						<div>
							<p style="color: red;"><?php echo $msg_pass; ?></p>
						</div>	
					</div>
				</div><br>
			</section>
		</div><br>
		<div class="form-group">
			<section>
				<p style="font-size: 30px; text-align: center;">Residence Details</p>
				<div class="row">
					<div class="col-md-6 col-lg-6" style="padding: 0% 7%; ">
						<label for="Address1">Address Line 1</label>
						<input type="text " class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" name = "Address1"  placeholder="Enter Your Address">
						<div>
							<p style="color: red;"><?php echo $msg_Add1; ?></p>
						</div>	
					</div>
					<div class="col-md-6 col-lg-6" style="padding: 0% 7% ">
						<label for="Address2">Address Line 2</label>
						<input type="text " class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" name="Address2"  placeholder="Enter Your Address">
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-6 col-lg-6" style="padding: 0% 7% ">
						<label for="city">City</label>
						<input type="text " class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" name = "city"  placeholder="Enter city" >
					</div>
					<div class="col-md-6 col-lg-6" style="padding: 0% 7%; ">
						<label for="Pincode">Pincode</label>
						<input type="text " class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded " name = "Pincode"  placeholder="Pincode" >
						<div>
							<p style="color: red;"><?php echo $msg_pin; ?></p>
						</div>	
					</div>
				</div><br>
				<div class="row">
					<div class="col" style="padding: 0% 30% ">
						<label for="State">State</label>
						<input type="text " class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" name = "State" placeholder="State" >
					</div>
				</div><br>
			</section>
		</div>
		<center class="shadow-sm p-3 mb-5 bg-white rounded">
			<button class="btn  btn-success " name = "SignUp" >Submit</button>
			<button type="reset" class="btn   btn-outline-success "  >Reset</button>
		</center>
	</div>		
</form><br><br>
	<?php include"footer.php"; ?>