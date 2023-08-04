<?php 
include("header.php");?>
<?php 
include('Backened/Connectio.php');

if(isset($_POST['Add_To_Cart'])){

	if(isset($_SESSION['cart']))
	{
		$mycart=array_column($_SESSION['cart'],'Product_id' );
		if(in_array($_POST['product_id'],$mycart))
		{
			echo "<script>
				alert('Item Already exists.');
				window.location.href='index.php';
			</script>";
		}
		else{
			$count = count($_SESSION['cart']);
			$_SESSION['cart'][$count]=array('Product_id'=>$_POST['product_id'],'Product_price' =>$_POST['product_price'],'quantity'=>$_POST['qty']);
			echo "<script>
				window.location.href='index.php';
			</script>";
		}	
	}
	else
	{
		$_SESSION['cart'][0] = array('Product_id'=>$_POST['product_id'],'Product_price' =>$_POST['product_price'],'quantity'=>$_POST['qty']);
		echo "<script>
				window.location.href='index.php';
			</script>";
		
	}
}
if(isset($_POST['Remove']))
{
	foreach($_SESSION['cart'] as $key=>$value ) 
	{
		if($value['Product_id']==$_POST['main_id']){

			unset($_SESSION['cart'][$key]);
			$_SESSION['cart']=array_values($_SESSION['cart']);
			echo"<script> 
					alert('item removed');
					window.location.href='cart.php';
				</script>";
		}
	}
}
?> <?php
if(isset($_POST['Search_bar'])){
	$str = mysqli_real_escape_string($conn,$_POST['search']);
	$query3 = " SELECT * FROM product WHERE name like '%$str%' or brand like '%$str%'";
	$outcome = mysqli_query($conn,$query3);?>
	<div class="row">
		<?php while($row_3 = mysqli_fetch_array($outcome)){
			if($row_3['status'] != 0){?>
				<div class="col-md-4 col-sm-12 col-xs-12 col-lg-4 col-xl-3 " style="padding : 3% 5% ;">
						<form method="POST" >
							<div class="card" style="width: 18rem; padding: 2% 3%">
								<img style="margin : 0% 25%;" src="Admin/images/Products/<?php echo $row_3['image'];?>" width=141px; height=198px; >
								<div class="card-body">
									<h6 class="card-title" style="text-align: center;"><?php echo$row_3['brand']; echo " " .$row_3['name']; ?></h6>
									<small style="margin-left: 2%; margin-right: 6%;">MRP : <?php echo $row_3['mrp'];?> ₹ </small>
									<h6 style="margin-left: 2%; margin-right: 6%;">Our Price : <?php echo $row_3['price'];?> ₹ <span style="margin-left: 10%;" class="text-danger"><?php echo  intval((($row_3['mrp'] - $row_3['price'])/$row_3['mrp'])*100 );?>% off</span> </h6>
									<p style="margin-left: 2%; margin-right: 6%;"><span>Qty:</span>
									<select class=" form-select " name="qty" style="width: 20%;">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select></p>
									<button type="submit" name="Add_To_Cart" class="btn btn-success btn-block"  >Add to cart</button>
									<input type="hidden" name="product_id" value="<?php echo $row_3['id'];?>">
									<input type="hidden" name="product_price" value="<?php echo $row_3['price'];?>">
								</div>
							</div>
						</form>		
				</div>

<?php	}
}?>
</div>
<?php }

include 'footer.php';?>