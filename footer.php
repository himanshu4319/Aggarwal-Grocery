<?php
include "Backened/Connectio.php";
$msg = "";
$i=0;
if (isset($_POST['news']))
{
	
	$News = $_POST['Newsletter'];
	if(empty($News)){
		$msg = " Enter a valid Email ";
	}
	else{
		$query = "SELECT * FROM newsletter WHERE Email = '$News' ";
		$result = mysqli_query($conn , $query);
		$count = mysqli_num_rows($result);
		if ($count>0) 
		{
			echo"<script>alert('Newsletter already subscribed.');</script>";
		}
		else
		{
				
			$sql = "INSERT INTO newsletter (Email) VALUES ('$News')";

			if($conn->query($sql)===True){
				echo"<script>alert('Thank you ! for Subscribing our Newsletter.');</script> ";
			}
		}
	}	
}
if(isset($_POST['Contact_us'])){
	$Full_name = mysqli_real_escape_string($conn,$_POST['Fu_name']);
	$CON_email = mysqli_real_escape_string($conn,$_POST['ConEMAIL']);
	$comments = mysqli_real_escape_string($conn,$_POST['Com_ments']);
	if(empty($Full_name)){
		$msg = "Enter a valid full name";
		$i++;
	}
	if(empty($CON_email)){
		$msg = "Enter a Valid Email";
		$i++;
	}
	if($i==0){
		$sql_query = "INSERT INTO contact_us (`Full_name`,`Email`,`Comments`) VALUES ('$Full_name','$CON_email','$comments')";
		if($conn-> query($sql_query)===True){
			echo"
			<script>
				alert('Query Submitted Successfully');
			</script>	";
		}
		
	}
	else{
			echo "
			<script>
				alert('Enter a Valid Email or Full Name');
			</script>	";
		}
}
?>
<footer style="margin-top: 10%; width: auto; height: auto;">
			<div class="container-fluid bg-dark ">
				<div class="row">
					<div class="col-md-6 col-lg-6 col-sm-6 col-xl-6" style="padding: 0% 4%;">
						<form class="form-group"   method="POST">
							<label for="mail" style="color: white; font-family: ubuntu; font-size: 18px;"><strong>Subscribe Our Newsletter</strong> </label><br>
							<div class="row">
								<div class="col-md-8 col-lg-8 col-xl-8 col-sm-8">
									<input type="text" name="Newsletter" class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" placeholder="Enter your Email">
								</div>	
								<div class="col-md-4 col-lg-4 col-xl-4 col-sm-4">
									<button type="Submit" name="news" class="btn btn-outline-light" style="font-family: ubuntu;"><strong>Subscribe</strong></button>
								</div>	
							</div>	
						</form>
						<label class="text-light" style="text-align: center; font-family: ubuntu; font-size: 18px; "><strong>Contact Us</strong></label><br>
						<div class="row">
							<div class="col-md-6 col-lg-6 col-sm-12 col-xl-6" style="padding: 0% 5%;">
								<p style="font-size: 17px ; font-family: ubuntu; text-align: center;" class="text-light" ><strong>Email: </strong></p>
									<p style="font-size: 15px; text-align: center; font-family: ubuntu;" class="text-light"><strong>himanshuaggarwalgarg@gmail.com</strong></p>
									<p style="font-size: 15px; text-align: center; font-family: ubuntu;" class="text-light"><strong>AggarwalGrocery@gmail.com</strong></p>
									<p style="font-size: 15px; text-align: center; font-family: ubuntu;" class="text-light"><strong>wecareAG@gmail.com</strong></p>
							</div>
							<div class="col-md-6 col-lg-6 col-sm-12 col-xl-6" style="padding: 0% 5%">
								<p class="text-light" style="text-align: center; font-family : ubuntu; font-size: 17px;"><strong>Phone/Mobile</strong></p>
								<p class="text-light" style="text-align: center; font-family: ubuntu; font-size: 15px;"><strong>0181-2911171</strong></p>
								<p class="text-light" style="text-align: center; font-family: ubuntu; font-size: 15px;"><strong>88377-87822</strong></p>
								<p class="text-light" style="text-align: center; font-family: ubuntu; font-size: 15px;"><strong>98728-15822</strong></p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-6 col-sm-6 col-xl-6" style="padding: 0% 5%;">
						<label style="color: white ; font-family: ubuntu; font-size: 18px;"><strong>Feedback</strong></label>
						<form method="POST">
							<div class="card " style="padding: 0% 5%;">
								<div class="row" style="margin-top: 20px;">
									<div class="col-md-6 col-lg-6 col-xl-6 col-sm-6" style="padding: 0% 4%;">
										<label class="text-dark" style="font-family: ubuntu"><strong>Full Name</strong></label>
										<input type="text" class="form-control shadow-sm p-3 mb-5 bg-white rounded" name="Fu_name" placeholder="Full Name">
									</div>
									<div class="col-md-6 col-lg-6 col-sm-6 col-xl-6" style="padding: 0% 4%">
										<label class="text-dark"style="font-family: ubuntu"><strong>Email</strong></label>
										<input type="text"name="ConEMAIL" class="form-control shadow-sm p-3 mb-5 bg-white rounded"  placeholder="Enter Email">
									</div>
								</div>
								<div class="row">	
									<div class="col-md-12 col-lg-12 col-xl-12 col-sm-12" style="padding: 0% 4%;">
										<label class="text-dark"style="font-family: ubuntu"><strong>Comments:</strong></label>
										<input type="text" class="form-control shadow-sm p-3 mb-5 bg-white rounded " name="Com_ments" placeholder="Enter Your Suggestions & Queries">
									</div>
								</div>
								<div class="row" style="margin-bottom: 20px;">
									<div class=" col-md-12 col-sm-12 col-xl-12 col-lg-12">
										<center><button type="Submit" name="Contact_us" class="btn btn-dark" style="text-align: center;font-family: ubuntu"><strong>Submit</strong></button></center>
									</div>
								</div>
							</div>
						</form>			
					</div>
				</div><br>
				<center><br>
					<div > 
						<p style="color: white; font-size: 18px; text-align: center; font-family: ubuntu"><strong>Copyright :  <?php echo date('Y');?> Aggarwal Group.</strong></p>
					</div>
				</center>
			</div>
</footer>
</body>
</html>
