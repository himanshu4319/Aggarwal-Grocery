<?php
include('header.php');
require 'Connection.php';
$i=0;
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
		$query = "update Product set status='$status' where id='$id'";
		mysqli_query($conn , $query);
	}
	if($type=='delete'){
		$id = mysqli_real_escape_string($conn,$_GET['id']);
		$d_query = "delete from Product where id='$id'";
		mysqli_query($conn , $d_query);
	}

}
$cat_name ='';
if(isset($_GET['id']) && $_GET['id'] != ''){
	$cat = mysqli_real_escape_string($conn , $_GET['id']);
	$res = mysqli_query($conn , "SELECT * FROM categories_1 WHERE id = '$cat'");
	$count = mysqli_num_rows($res);
	if($count != 0){
		while($row1 = mysqli_fetch_array($res)){
			$cat_name = $row1['categories'];
		}
	}
}
?>
<div class="row">
	<div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
		
		<table class="table">
			<thead>
				<tr>
					<th style="font-size: 15px; font-family: ubuntu; "><strong>#</strong></th>
					<th style="font-size: 15px; font-family: ubuntu; "><strong>Id</strong></th>					
					<th style="font-size: 15px; font-family: ubuntu; "><strong>Category</strong></th>
					<th style="font-size: 15px; font-family: ubuntu; "><strong>Product Image</strong></th>
					<th style="font-size: 15px; font-family: ubuntu; "><strong>Product Name</strong></th>
					<th style="font-size: 15px; font-family: ubuntu; "><strong>Brand</strong></th>
					<th style="font-size: 15px; font-family: ubuntu; "><strong>Product MRP</strong></th>
					<th style="font-size: 15px; font-family: ubuntu; "><strong>Produc Price</strong></th>
					<th style="font-size: 15px; font-family: ubuntu; "><strong>Product Qty</strong></th>
					<th style="font-size: 15px; font-family: ubuntu; "><strong>Status</strong></th>
					<th style="font-size: 15px; font-family: ubuntu; "><strong>Actions</strong></th>
				</tr>
			</thead>
			<?php 
			$result = mysqli_query($conn , "SELECT * FROM product WHERE Categories_id = '$cat_name'");
			while($row = mysqli_fetch_array($result)) {
			$i++;?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['Categories_id'];?></td>
				<td><img src="images/Products/<?php echo $row['image']; ?>" width= auto; height= 50px;></td>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['brand'];?></td>
				<td><?php echo $row['mrp'];?></td>
				<td><?php echo $row['price'];?></td>
				<td><?php echo $row['qty'];?></td>
				<td>
				<?php 
					if($row['status']==1){
						echo  "<button class='btn btn-success '><a href='?type=status&operation=deactive&id=".$row['id']."' style='color: white;'>Active</a></button>&nbsp;";
					}
					else{
						echo  "<button class='btn btn-warning '><a href='?type=status&operation=active&id=".$row['id']."'  style='color: white;'>Deactive</a></button>&nbsp;";
					}
					?></td>
					<td><button class="btn btn-danger "style="font-family: 'Ubuntu', sans-serif;" ><strong><?php echo  "<a href='?type=delete&id=".$row['id']."' style='color:white;'>Delete</a>"; ?></strong> </button><button type="submit" class="btn btn-primary " name="edit" style="font-family: 'Ubuntu', sans-serif; margin-left: 10%;" ><strong><?php echo  "<a href='product_insert.php?id=".$row['id']."' style='color:white;'>Edit</a>"; ?></strong></button></td>
			</tr>
			<?php }?>
		</table>
	
	</div>
</div>
