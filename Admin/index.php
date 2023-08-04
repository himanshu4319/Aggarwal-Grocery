<?php include 'header.php';
$status='';
if(isset($_GET['type']) && $_GET['type'] != ""){
	$type = mysqli_real_escape_string($conn,$_GET['type']);
	if($type=='Status'){
		$operation = mysqli_real_escape_string ($conn,$_GET['operation']);
		$id1 = mysqli_real_escape_string($conn,$_GET['id']);
		if($operation=='Accepted'){
			$status='1';
		}
		$query3 = "UPDATE orders SET Status='$status' where `S.no` ='$id1'";
		mysqli_query($conn , $query3);
	}
}



 ?>
<h3 style="text-align: center; font-family: ubuntu; margin-top: 2%; margin-bottom: 2%;"><strong>Our Orders </strong></h3>
<?php
$Pro_img='';
$i=0;
$query = "SELECT * FROM orders order by ID desc";
$res = mysqli_query($conn,$query);
?>
<div class="row">
	<div class="col-md-12 col-lg-12 col-xl-12 col-sm-12" style="padding: 0% 5%;">
		<table  class="table table-bordered" >
			<thead class="thead thead-dark">
				<th>S.no</th>
				<th>Order Id</th>
				<th>User's Email</th>
				<th>Product Image</th>
				<th>Product name</th>
				<th>qty</th>
				<th>Price</th>
				<th>Payment Mode</th>
				<th>Status</th>
			</thead>
			<?php 
			while($row=mysqli_fetch_array($res)){
				$i++;
				$id =  $row['Product_Id'];?>
			<tbody>
				<td style="text-align: center;"><?php echo $i; ?></td>
				<td style="text-align: center;"><?php echo $row['ID'];?></td>
				<td style="text-align: center;"><?php echo $row['Email'];?></td>

				<?php 
				
				$query2 = "SELECT * FROM product WHERE id = '$id'";
				$result = mysqli_query($conn,$query2);
				while($row_1 = mysqli_fetch_array($result)){
					$Pro_img = $row_1['image'];
				}	
				?>
				<td style="text-align: center;"><img src="images/Products/<?php echo $Pro_img;?>" width="50px;" height="auto"></td>
				<td style="text-align: center; "><?php echo $row['Product Name'];?></td>
				<td style="text-align: center;"><?php echo $row['Quantity'];?></td>
				<td style="text-align: center; "><?php echo $row['Price'];?></td>
				<td style="text-align: center;"><?php echo $row['Payment_Status'];?></td>
				<td style="text-align: center;"><?php $sta = $row['Status'];
				if($sta == 0){
					echo  "<button class='btn btn-danger '><a href='?type=Status&operation=Accepted&id=".$row['S.no']."' style='color: white;'>Pending</a></button>&nbsp;";
				}
				else{
					echo "<label class='btn btn-success'>Accepted</label>";
				}
				?></td>
			</tbody>
			<?php
			}
			?>
		</table>
	</div>
</div>		