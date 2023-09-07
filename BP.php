<?php 
include('Backened/Connectio.php');
include('header.php');

if(isset($_POST['Add_To_Cart'])){

	if(isset($_SESSION['cart']))
	{
		$mycart=array_column($_SESSION['cart'],'Product_id' );
		if(in_array($_POST['product_id'],$mycart))
		{
			echo "<script>
				alert('Item Already exists.')
				window.location.href='BP.php';
			</script>";
		}
		else{
			$count = count($_SESSION['cart']);
			$_SESSION['cart'][$count]=array('Product_id'=>$_POST['product_id'],'Product_price' =>$_POST['product_price'],'quantity'=>$_POST['qty']);
			echo "<script>
				alert('Item Added in the cart');
				window.location.href='BP.php';
			</script>";
		}	
	}
	else
	{
		$_SESSION['cart'][0] = array('Product_id'=>$_POST['product_id'],'Product_price' =>$_POST['product_price'],'quantity'=>$_POST['qty']);
		echo "<script>
				alert('Item Added.')
				window.location.href='BP.php';
			</script>";
	}
}
?>
<h3 style="font-family: ubuntu; text-align: center; margin-top: 2%;" class="text-dark"><strong>Best Deals</strong></h3>
<?php
$query = "SELECT * FROM categories_1 ";
$res = mysqli_query($conn,$query);?>

<div class="row" >
<?php
while($row=mysqli_fetch_assoc($res)){
	$cat = $row['categories'];
	$query1 = "SELECT * From Product WHERE Categories_id = '$cat' order by brand asc ";
	$result = mysqli_query($conn,$query1); 
		while($row1 = mysqli_fetch_assoc($result)){
				$dis = intval((($row1['mrp'] - $row1['price'])/$row1['mrp'])*100 );
				if($dis >=20){?>
			<div class="col-md-4 col-sm-6 col-xs-12 col-lg-4 col-xl-3 " style="padding : 2% 4% ;">
				<form method="POST" >
					<div class="card" style="width: 18rem; height:auto rem; padding: 2% 3%">
						<img style="margin : auto;" src="Admin/images/Products/<?php echo $row1['image'];?>" width=auto; height=198px; >
						<div class="card-body">
							<h6 class="card-title" style="text-align: center;"><?php echo $row1['brand']; echo " " .$row1['name']; ?></h6>
							<small style="margin-left: 2%; margin-right: 6%;">MRP : <?php echo $row1['mrp'];?> ₹ </small>
							<h6 style="margin-left: 2%; margin-right: 6%;">Our Price : <?php echo $row1['price'];?> ₹ <span style="margin-left: 10%;" class="text-danger"><?php echo  intval((($row1['mrp'] - $row1['price'])/$row1['mrp'])*100 );?>% off</span> </h6>
							<p style="margin-left: 2%; margin-right: 6%;"><span>Qty:</span>
							<select class=" form-select " name="qty" style="width: 20%;">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select></p>
							<button type="submit" name="Add_To_Cart" class="btn btn-dark btn-block"  >Add to cart</button>
							<input type="hidden" name="product_id" value="<?php echo $row1['id'];?>">
							<input type="hidden" name="product_price" value="<?php echo $row1['price'];?>">
						</div>
					</div>
				</form>		
			</div>
			<?php	}
			}
		?>
<?php }

?>
</div>
<?php 
include('footer.php');
?>