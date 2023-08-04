<?php include "header.php";
$cat='';
 ?><br>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 h-100" src="images/Banner_1.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-100" src="images/Banner_2.png" alt="Second slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php 
$disp = "SELECT * FROM categories_1 order by categories asc";
$result = mysqli_query($conn,$disp);
while($col=mysqli_fetch_array($result)){
	$cat = $col['categories'];?>
	<div class="row" style="padding: 1% 0%">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 " style="text-align: center;">
			<label style=" font-size: 30px; font-family: ubuntu" class="text-success"><strong><?php echo $cat; ?></strong></label>
		</div>
	</div>	
	<?php $disp_1 = "SELECT * FROM product WHERE Categories_id = '$cat' order by brand asc";
	$result_1 = mysqli_query($conn,$disp_1);?>
	<div class="row  "> 
		<?php While($row_7 = mysqli_fetch_array($result_1)){
		if($row_7['status'] !=0){?>	
			<div class="col-md-4 col-sm-6 col-xs-12 col-lg-4 col-xl-3 " style="padding : 2% 4% ;">
				<form method="POST" action="manage_cart.php">
					<div class="card" style="width: 18rem; height:auto rem; padding: 2% 3%">
						<img style="margin : auto;" src="Admin/images/Products/<?php echo $row_7['image'];?>" width=auto; height=198px; >
						<div class="card-body">
							<h6 class="card-title" style="text-align: center;"><?php echo$row_7['brand']; echo " " .$row_7['name']; ?></h6>
							<small style="margin-left: 2%; margin-right: 6%;">MRP : <?php echo $row_7['mrp'];?> ₹ </small>
							<h6 style="margin-left: 2%; margin-right: 6%;">Our Price : <?php echo $row_7['price'];?> ₹ <span style="margin-left: 10%;" class="text-danger"><?php echo  intval((($row_7['mrp'] - $row_7['price'])/$row_7['mrp'])*100 );?>% off</span> </h6>
							<p style="margin-left: 2%; margin-right: 6%;"><span>Qty:</span>
							<select class=" form-select " name="qty" style="width: 20%;">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select></p>
							<button type="submit" name="Add_To_Cart" class="btn btn-success btn-block"  >Add to cart</button>
							<input type="hidden" name="product_id" value="<?php echo $row_7['id'];?>">
							<input type="hidden" name="product_price" value="<?php echo $row_7['price'];?>">
						</div>
					</div>
				</form>		
			</div>
		<?php } 
	} ?>
	</div>


<?php }
?>
<?php include "footer.php"; ?>