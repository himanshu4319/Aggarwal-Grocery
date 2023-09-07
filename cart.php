<?php 
include('header.php');
include('manage_cart.php');
$mrp=0;
$off=0;
$dis=0;
?>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
			<h3 class="text-center card-body" style="padding: 2% 0%; font-family: ubuntu;"><strong>My Cart</strong></h3>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8 col-lg-8 col-xl-8 col-sm-8 " style="padding: 0% 5%;">
	<table class="table table-bordered table-center">
		<thead class="text-center">
			<th style="font-family: ubuntu; ">S.No.</th>
			<th style="font-family: ubuntu; ">Image</th>
			<th style="font-family: ubuntu; ">Product Name</th>
			<th style="font-family: ubuntu; ">Price</th>
			<th style="font-family: ubuntu; ">quantity</th>
			<th style="font-family: ubuntu; ">Total</th>
		</thead>
		<tbody class="text-center">
			<?php 
				$ID_Product='';
				$i=0;
				if(isset($_SESSION['cart'])){
					
					foreach ($_SESSION['cart'] as $key => $value) {
						$i++;
						$ID_Product = $value['Product_id'];
						$sql = "SELECT * FROM product WHERE id = '$ID_Product'";
						$result = mysqli_query($conn,$sql);
						$ci = mysqli_num_rows($result);
						if($ci !=0){
							while($row =mysqli_fetch_array($result)){
								$mrp = $mrp+($row['mrp']*$value['quantity']);
								$off = $off+($row['price']*$value['quantity']);?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><img src="Admin/images/Products/<?php echo $row['image']; ?>" width="auto" height="100px"></td>
									<td><?php echo $row['brand']; echo " ".$row['name'];?></td>
									<td><?php echo $row['price'];?><input type="hidden" class="iprice" value="<?php echo $row['price'];?>"></td>
									<td>
										<form method="POST" action="manage_cart.php">
											<input name="Mod_Quantity" class="text-center iquantity"  onchange=" this.form.submit();" type="number" value="<?php echo $value['quantity']; ?>" min='1' max='4'>
											<input type="hidden" name="main_id" value="<?php echo $row['id']; ?>">
										</form>	
									</td>
									<td class="itotal"></td>
									<td>
										<form  method="POST" action="manage_cart.php">
											<input type="hidden" name="main_id" value="<?php echo $row['id']; ?>">
											<button name="Remove" class="btn btn-dark btn-sm"><img src="images/bin.png"  height="20px" width="auto"></button>
											
										</form>
									</td>
								</tr>
		<?php				} 
						}
					}	
				}
				else{?>
					<tr><td colspan="5"><h4 style="font-family : ubuntu;"><?php echo " cart is empty";?></h4></td></tr>
	<?php			}

		
			?>
		</tbody>
	</table>
	</div>
	<div class=" col-md-4 col-lg-4 col-xl-4 col-sm-4 col-xs-4 " style="padding: 0% 5%">
		<div class="card bg-light">
			<label style="font-size: 25px; font-family: ubuntu; padding: 2% 5%;" class="text" ><strong>Grand Total: </strong></label>
			<div class="card-body">
				<p style="font-size: 20px; font-family: ubuntu; text-align: right; padding: 0% 5%;" > <strong> <label id="gtotal"></label>  ₹ </strong></p>	
			</div>
			<form method="POST" action="checkout.php" style="padding: 0% 10%;">
				<label >Payment Method</label>
				<select name="pay" class=" form-select shadow-sm  bg-white rounded">
					<option>Cash On Delivery</option>
					<option>Debit/Credit Card</option>
					<option>PayTM</option>
				</select><br><br>
				<button type="submit" name="check" class="btn btn-dark btn-block" style="margin-bottom:10%;">Place your Order</button>
			</form>
		</div>	
	</div>
</div>	
<label style="font-size: 20px; font-family:ubuntu ; padding: 0% 30%;" class="text-danger">Your Total Savings :<?php echo $mrp-$off; ?>₹</label>
				
<script >
	var gt=0;
	var iprice=document.getElementsByClassName('iprice');
	var iquantity=document.getElementsByClassName('iquantity');
	var itotal=document.getElementsByClassName('itotal');
	var gtotal=document.getElementById('gtotal');
	function subtotal() {
		gt=0;
		for(var i=0;i<iprice.length;i++){

			itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
			gt=gt+(iprice[i].value)*(iquantity[i].value);
		}
		gtotal.innerText=gt;
	}
	subtotal();

</script>
<?php
include('footer.php');
?>
