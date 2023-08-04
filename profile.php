<?php
include('header.php'); 
include('LOGIN.php');
$res = '';
if(isset($_SESSION['Email'])){
	$mail=$_SESSION['Email'];
	$sql="SELECT * FROM register_1 WHERE Email='$mail'";
	$res = mysqli_query($conn,$sql);
}	?><br>
	<h3 style="text-align: center;" class="text-success"> Your Profile </h3>
	<?php
		while($row = mysqli_fetch_array($res)){?>
			<div class="row">
				<div class="col-md-12 col-xl-12 col-sm-12 col-lg-12" style="padding: 0% 20% ;" >
					<table class="table table-bordered active table-responsive{-sm|-md|-lg|-xl}">
						<tr>
							<th style=" font-size: 20px; font-family: ubuntu; text-align: center; " class="text-success">Full Name :</th>
							<td style="font-size: 20px; font-family: ubuntu; text-align:center; "><?php echo $row['fname'];echo " ".$row['lname'];?></td>
						</tr><br>
						<tr>
							<th style=" font-size: 20px; font-family: ubuntu; text-align: center; " class="text-success">Date of Birth :</th>
							<td style="font-size: 20px; font-family: ubuntu; text-align:center; "><?php echo $row['DOB'];?></td>
						</tr>
						<tr>
							<th style=" font-size: 20px; font-family: ubuntu; text-align: center; "class="text-success">Gender :</th>
							<td style="font-size: 20px; font-family: ubuntu; text-align:center; "><?php echo $row['Gen'];?></td>
						</tr>
						<tr>
							<th style=" font-size: 20px; font-family: ubuntu; text-align: center; "class="text-success">Email :</th>
							<td style="font-size: 20px; font-family: ubuntu; text-align:center; "><strong><?php echo $row['Email'];?></strong></td>
						</tr>
						<tr>
							<th style=" font-size: 20px; font-family: ubuntu; text-align: center; "class="text-success">Contact Details :</th>
							<td style="font-size: 20px; font-family: ubuntu; text-align:center; "><?php echo $row['mobile'];?></td>
						</tr>
						<tr>
							<th style=" font-size: 20px; font-family: ubuntu; text-align: center;"class="text-success"> Alternate Contact Details :</th>
							<td style="font-size: 20px; font-family: ubuntu; text-align:center; "><?php echo $row['almo'];?></td>
						</tr>
						<tr>
							<th style=" font-size: 20px; font-family: ubuntu; text-align: center; "class="text-success"> Address Line-1 :</th>
							<td style="font-size: 20px; font-family: ubuntu; text-align:center; "><?php echo $row['Address1'];?></td>
						</tr>
						<tr>
							<th style=" font-size: 20px; font-family: ubuntu; text-align: center; "class="text-success"> Address Line2 :</th>
							<td style="font-size: 20px; font-family: ubuntu; text-align:center; "><?php echo $row['Address2'];?></td>
						</tr>
						<tr>
							<th style=" font-size: 20px; font-family: ubuntu; text-align: center; "class="text-success"> City & Pincode :</th>
							<td style="font-size: 20px; font-family: ubuntu; text-align:center; "><?php echo $row['city']; echo " ,".$row['Pincode'];?></td>
						</tr>
						<tr>
							<th style=" font-size: 20px; font-family: ubuntu; text-align: center; "class="text-success"> State :</th>
							<td style="font-size: 20px; font-family: ubuntu; text-align:center; "><?php echo $row['State'];?></td>
						</tr>
					</table>
				</div>	
			</div>	
	<?php	}

include('footer.php');
	?>
