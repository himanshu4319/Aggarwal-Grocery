<?php 
require 'Connection.php';
if(isset($_GET['type']) && $_GET['type'] != ""){
	$type = mysqli_real_escape_string($conn,$_GET['type']);
	if($type=='status'){
		$operation = mysqli_real_escape_string ($conn,$_GET['operation']);
		$id = mysqli_real_escape_string($conn,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}
		else{
			$status='0';
		}
		$query = "update categories_1 set status='$status' where id='$id'";
		mysqli_query($conn , $query);
	}
	if($type=='delete'){
		$id = mysqli_real_escape_string($conn,$_GET['id']);
		$d_query = "delete from categories_1 where id='$id'";
		mysqli_query($conn , $d_query);
	}
}


$sql = "SELECT * FROM categories_1 order by categories asc";
$result = mysqli_query($conn , $sql);
$i = 0;
$cat = "";
$msg = "";
$status = "";
?>
<?php include 'header.php'; ?>
<div class="row">
	<div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 ">
		<div class="card ">
			<div class="card-body">	
				<h4  style=" text-align: center; font-family: 'Ubuntu', sans-serif; "><strong style="padding: 0% 35%">Categories</strong><a href="insert_cat.php"><button class="btn btn-outline-primary btn-lg " name="insert" style="font-family: 'Ubuntu', sans-serif;" ><strong>Insert</strong></button></a>
				</h4><br>
			</div>	
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-xl-12 col-lg-12 col-sm-6">			
			<div class="table-stats">
				<table class="table table-bordered " >
					<thead class="thead">
						<tr>
							<center>
								<th scope="col" style="font-size: 15px; font-family: ubuntu; " >#</th>
								<th scope="col" style="font-size: 15px; font-family: ubuntu; "><center>ID</center></th>
								<th scope="col" style="font-size: 15px; font-family: ubuntu; "><center>Image</center></th>
								<th scope="col" style="font-size: 15px; font-family: ubuntu; "><center>Categories</center></th>
								<th scope="col" style="font-size: 15px; font-family: ubuntu; "><center>Status</center></th>
								<th scope="col" style="font-size: 15px; font-family: ubuntu; "><center>Actions</center></th>
							</center>	
						</tr>
					</thead>
					<tbody>
						<?php
							while($row = mysqli_fetch_array($result))
							{ 
								$i++;
						?>
								<tr>
									<th scope="row" style="font-size: 20px;"><center><?php echo $i; ?></center></th>
									<td style="font-size: 20px;"><center><?php echo $row['id']; ?></center></td>
									<td><center><img src="images/<?php echo $row['image']; ?>" width="auto"; height="40px;";></center></td>
									<td style="font-size: 20px;"><center><?php echo $row['categories']; ?></center></td>
									<td ><center>
										<?php 
											if($row['status']==1){
												echo  "<button class='btn btn-success '><a href='?type=status&operation=deactive&id=".$row['id']."' style='color: white;'>Active</a></button>&nbsp;";
											}
											else{
												echo  "<button class='btn btn-warning '><a href='?type=status&operation=active&id=".$row['id']."'  style='color: white;'>Deactive</a></button>&nbsp;";
											}
										?>
									</center>
									</td>
									<center>
										<td><button class="btn btn-danger "style="font-family: 'Ubuntu', sans-serif; margin-left: 10%;" ><strong><?php echo  "<a href='?type=delete&id=".$row['id']."' style='color:white;'>Delete</a>"; ?></strong> </button><button type="submit" class="btn btn-primary " name="edit" style="font-family: 'Ubuntu', sans-serif; margin-left: 10%;" ><strong><?php echo  "<a href='Insert_cat.php?id=".$row['id']."' style='color:white;'>Edit</a>"; ?></strong></button><button type="submit" class="btn btn-warning " name="edit" style="font-family: 'Ubuntu'; margin-left: 10%; , sans-serif; " ><?php echo  "<a href='Pro_view_ad.php?id=".$row['id']."' style='color:white;'>Explore</a>"; ?></button>
										</td>
									</center>
								</tr>
						<?php
							} 
						?>		
					</tbody>
				</table>
		</div>
	</div>	
</div>	