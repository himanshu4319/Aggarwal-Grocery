<?php
require('LOGIN.php');

 ?>
<?php 
include('Backened/Connectio.php');

if(isset($_POST['Add_To_Cart'])){

	if(isset($_SESSION['cart']))
	{
		$mycart=array_column($_SESSION['cart'],'Product_id' );
		if(in_array($_POST['product_id'],$mycart))
		{
			echo "<script>
				alert('Item Already exists.')

			</script>";
		}
		else{
			$count = count($_SESSION['cart']);
			$_SESSION['cart'][$count]=array('Product_id'=>$_POST['product_id'],'Product_price' =>$_POST['product_price'],'quantity'=>$_POST['qty']);
			
		}	
	}
	else
	{
		$_SESSION['cart'][0] = array('Product_id'=>$_POST['product_id'],'Product_price' =>$_POST['product_price'],'quantity'=>$_POST['qty']);
		
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
?> 
<?php 
include('header.php');
?>

<?php require 'Backened/Connectio.php';
$cat_name ='';
if(isset($_GET['id']) && $_GET['id'] != ''){
	$cat = mysqli_real_escape_string($conn , $_GET['id']);
	$res = mysqli_query($conn , "SELECT * FROM categories_1 WHERE id = '$cat'");
	$count = mysqli_num_rows($res);
	if($count != 0){
		while($row = mysqli_fetch_array($res)){
			$cat_name = $row['categories'];
		}
	}
}?>
<?php 
$query = "SELECT * FROM product WHERE Categories_id = '$cat_name' order by brand OR name asc ";
$result = mysqli_query($conn , $query);?><br>
<h2 style="text-align: center; font-family: ubuntu;" class="text-success"><strong><?php echo $cat_name;?></strong></h2>
<div class="row">
	<?php While($row_1 = mysqli_fetch_array($result)){
		if($row_1['status'] !=0){?>	
			<div class="col-md-4 col-sm-12 col-xs-12 col-lg-4 col-xl-3 " style="padding : 3% 5% ;">
				<form method="POST">
					<div class="card " style="width: 18rem; padding: 2% 3%">
						<img style="margin : 0% 25%;" src="Admin/images/Products/<?php echo $row_1['image'];?>" width=120 px; height=auto; >
						<div class="card-body">
							<h6 class="card-title" style="text-align: center;"><?php echo$row_1['brand']; echo " " .$row_1['name']; ?></h6>
							<small style="margin-left: 2%; margin-right: 6%;">MRP : <?php echo $row_1['mrp'];?> ₹ </small>
							<h6 style="margin-left: 2%; margin-right: 6%;">Our Price : <?php echo $row_1['price'];?> ₹ <span style="margin-left: 10%;" class="text-danger"><?php echo  intval((($row_1['mrp'] - $row_1['price'])/$row_1['mrp'])*100 );?>% off</span> </h6>
							<p style="margin-left: 2%; margin-right: 6%;"><span>Qty:</span>
							<select class=" form-select " name="qty" style="width: 20%;">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select></p>
							<button type="submit" name="Add_To_Cart" class="btn btn-success btn-block"  >Add to cart</button>
							<input type="hidden" name="product_id" value="<?php echo $row_1['id'];?>">
							<input type="hidden" name="product_price" value="<?php echo $row_1['price'];?>">
						</div>
					</div>
				</form>		
			</div>
	<?php	}	
	} ?>		
</div>
<?php
include('footer.php');
?>
