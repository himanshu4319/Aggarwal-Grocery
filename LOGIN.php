<?php 
require "Backened/Connectio.php";
$msg = '';
$fname = '';
$lname = '';

if(isset($_POST['Submit']))
{
	$Email = mysqli_real_escape_string($conn , $_POST['Email']);
	$pass = mysqli_real_escape_string($conn , $_POST['pass']);
	$mail=$Email;
	if (empty($Email) && empty($pass)) {
		$msg = " Email and Password  is required.";
	}
	else{
		$pass = md5($pass);
		$query = "SELECT * FROM register_1 WHERE Email='$Email' AND pass='$pass' ";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result)){
				$fname = $row['fname'];
				$lname = $row['lname'];
			}
		$count = mysqli_num_rows($result);
		if($count != 0){
			
			$_SESSION['fname'] = $fname;
			$_SESSION['lname'] = $lname;
			$_SESSION['SignIn'] = 'yes';
			$_SESSION['Email'] = $Email;
			header('location:index.php');
		}
		else{
			$msg = "Invalid Email and Password";
		}
	}
}	
?>