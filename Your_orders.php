<?php 
include('LOGIN.php');
include('header.php');
$img = '';
$p_name ='';?>

<h3 style="font-family:ubuntu; margin: 2% 45%;" class="text-success"><strong>Your Orders</strong></h3>
<?php if(isset($_SESSION['Email'])){
	$mail2=$_SESSION['Email'];
	$query = "SELECT * FROM orders WHERE Email = '$mail2' order by ID desc ";
	$res = mysqli_query($conn,$query);
	while(@$row=mysqli_fetch_array($res)){
		$id =$row['Product_Id'];
		$p_name =$row['Product Name'];
		$p_qty =$row['Quantity'];
		$P_price=$row['Price'];
		$O_Status=$row['Status'];
		$Pay_mod=$row['Payment_Status'];
		$query_2="SELECT * From Product WHERE id = '$id'";
		$res1=mysqli_query($conn,$query_2);
		while($row_2 = mysqli_fetch_array($res1)){
			$img = $row_2['image'];
		}?>
	<div class="card" style="margin: 0% 5%;">	
		<div class="row container" style="padding: 0% 5%;">
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 " style="padding: 1% 2.5%;">
				<img src="Admin/images/Products/<?php echo $img;?>" width="100px;" height="auto;"><br>
			</div>
			<div class="col-md-5 col-lg-5 col-sm-5 col-xl-5" style="padding: 3% 2.5%; display: inline;">
				<label style="font-size: 20px; font-family: ubuntu;"><strong><?php echo $p_name; ?></strong></label><br>

				<label style="font-size: 15px; font-family: ubuntu; padding: 0% 10%;"><strong>Qty: <?php echo $p_qty;?> pcs</strong></label>
				<label style="font-size: 15px; font-family: ubuntu ;"><strong>Price : <?php echo ($P_price/$p_qty);?> ₹</strong></label><br>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xl-3" style=" padding: 3% 2.5%;">
				<label style="font-size:20px; font-family: ubuntu; "><strong>Total: <?php echo $P_price;?> ₹</strong></label>
				<label><strong>Payment Mode: <?php echo $Pay_mod;?></strong></label>
			</div>
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 " style="padding: 3% 2.5%">
				<?php if($O_Status != 0){?>
					<label class="text-success" style="font-size: 20px; font-family: ubuntu;"><strong>Accepted</strong></label>
				<?php }
				else { ?>
					<label class="text-danger" style="font-size: 20px; font-family: ubuntu;"><strong>Order Placed</strong></label>
				<?php } ?>	
			</div>
		</div>
	</div>	<br>
<?php 	}
}
include('footer.php')
?>
