<?php include('header.php');?>
<?php
if(isset($_GET['type']) && $_GET['type'] != ""){
	$type = mysqli_real_escape_string($conn,$_GET['type']); 
	if($type=='delete'){
		$id = mysqli_real_escape_string($conn,$_GET['id']);
		$d_query = "delete from contact_us where id='$id'";
		mysqli_query($conn , $d_query);
	}
}		
?>



<h3 style="font-family:ubuntu; margin: 2% 40%;"><strong>Suggestion & Queries</strong></h3>
<?php $query_cont = "SELECT * FROM contact_us order by id desc";
$result = mysqli_query($conn,$query_cont);
while($row4=mysqli_fetch_array($result)){?>
	<form method="POST">
		<div class="card" style="margin:2% 5%; padding: 2% 5%; ">
			<div class="row">
				<div class="col-md-3 col-lg-3 col-sm-3 col-xl-3 ">
					<label  style="padding: 2% 5%;">From : <?php echo $row4['Email']; ?></label>
				</div>
				<div class="col-md-3 col-lg-3 col-xl-3 col-sm-3">
					<label  style="padding: 2% 5%;">Full Name: <?php echo $row4['Full_name']; ?></label>
				</div>
				<div class="col-md-4 col-lg-4 col-sm-4 col-xl-4">
					<label class="card" style="padding: 2% 5%;"><?php echo $row4['Comments'] ;?></label>
				</div>
				<div class="col-md-2 col-lg-2 col-xl-2 col-sm-2">	
					<button class="btn btn-danger "style="font-family: 'Ubuntu', sans-serif; margin-left: 10%;" ><strong><?php echo  "<a href='?type=delete&id=".$row4['id']."' style='color:white;'>Delete</a>"; ?></strong>
				</div>
			</div>
		</div><br>
	</form>	


<?php } ?>