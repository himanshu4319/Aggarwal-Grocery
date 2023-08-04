<?php 
include ('Connection.php');
$msg = '';
$name='';
$category='';
$SD = '';
$Mrp = '';
$qty = '';
$desc = '';
$img = '';
$status ='';
$img = '';
$price='';
$brand=''; 
if(isset($_GET['id']) && $_GET['id'] != ""){
	$id = mysqli_real_escape_string($conn,$_GET['id']);
	$res = mysqli_query($conn , "SELECT * From Product WHERE id = '$id'");
	$row = mysqli_fetch_array($res);
	$brand = $row['brand'];
	$category = $row['Categories_id'];
	$img = $row['image'];
	$status = $row['status'];
	$name = $row['name'];
	$Mrp = $row['mrp'];
	$qty = $row['qty'];
	@$SD = $row['SD'];
	@$desc = $row['description'];
	$price = $row['price'];
}	
if(isset($_POST['Submit'])){
	$name = mysqli_real_escape_string($conn , $_POST['Name']);
	$category = mysqli_real_escape_string($conn , $_POST['category']);
	$brand = mysqli_real_escape_string($conn , $_POST['brand_name']);
	$qty = mysqli_real_escape_string($conn , $_POST['qty']);
	$Mrp = mysqli_real_escape_string($conn , $_POST['MRP']);
	$price = mysqli_real_escape_string($conn, $_POST['price']);
	$img = mysqli_real_escape_string($conn , $_POST['img']);
	$SD = mysqli_real_escape_string($conn,$_POST['SD']);
	@$desc = mysqli_real_escape_string($conn , $_POST['desc']);
	$status = mysqli_real_escape_string($conn , $_POST['status']);
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$query = "UPDATE Product set Categories_id = '$category',name = '$name',brand= '$brand',mrp = '$Mrp',price = '$price',qty = '$qty', image = '$img',short_desc='$SD',description='$desc',status='$status'  WHERE id = '$id'"; 
		mysqli_query($conn,$query);
		header('location:Products.php');
	}
	else{
		$query = "SELECT * FROM product WHERE name = '$name'";
		$result = mysqli_query($conn , $query);
		$count = mysqli_num_rows($result);
		if($count == 0 ){
			$in_query = "INSERT INTO product(Categories_id, name, brand, mrp, price, qty, image, short_desc, description, status) VALUES('$category', '$name', '$brand', '$Mrp', '$price', '$qty', '$img', '$SD', '$desc', '$status')";
			if($conn->query($in_query) === TRUE){
				$msg = "Product Inserted Successfuly";
				header('location:Products.php');
			}
			else{
				$msg = "Product insertion failed.";
			}
		}	
		else{
			$msg = "Product already Exists." ; 
		}
	}	
}?>


<?php include 'header.php'; ?>
<div class="row">
	<div class="col-md-12 col-lg-12 col-xl-12">
		<div class="card bg-dark">
			<div class="card-body">
				<h4 style="text-align: center; font-family: ubuntu;"><strong style="padding: 2% 35%; color: white;">Insert a New Product.</strong></h4>

			</div>
			
		</div>
	</div>
	
</div>
<p style="text-align: center; font-size: 20px; color: red;"><?php echo $msg; ?></p>

	
</div><br>
<form method="POST">
	<div class="row">
		<div class="col-md-6 col-lg-6 col-sm-6 col-xl-6" style="padding: 0% 5%;">
			<label for="name">Enter Name of a Product :</label>
			<input type="text" name="Name" class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" placeholder="Enter Product Name" value="<?php echo $name ?>">	
		</div>
		<div class="col-md-3 col-lg-3 col-sm-3 col-xl-3" style="padding: 0% 5%;">
			<label for="category">Category :</label>
			<select name="category" class="form-control shadow rounded" value="<?php echo $category;?>" > 
				<option>None</option>
				<?php 
				$query = "Select * from categories_1 order by categories asc";
				$res = mysqli_query($conn,$query);
				while($row = mysqli_fetch_array($res)){
				?>
				<option ><?php echo $row['categories'];?></option>
				<?php }?>
			</select>
		</div>
		<div class="col-md-3 col-lg-3 col-sm-3 col-xl-3" style="padding: 0% 5%;">
			<label for="brand">Brand</label>
			<input type="text" class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" name="brand_name" placeholder="Enter Brand" value="<?php echo $brand;?>">
		</div>
	</div><br>
	<div class="row">
		<div class="col-md-4 col-lg-4 col-xl-4 col-sm-4" style="padding: 0% 5%;">
			<label for="quantity">Qty :</label>
			<input type="text" name="qty" class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" placeholder="Enter Quantity" value="<?php echo $qty;?>">
		</div>
		<div class="col-md-4 col-lg-4 col-xl-4 col-sm-4" style="padding: 0% 5%;">
			<label for="MRP">MRP :</label>
			<input type="text" name="MRP" class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" placeholder="Enter MRP" value="<?php echo $Mrp;?>">
		</div>
		<div class="col-md-4 col-lg-4 col-xl-4 col-sm-4" style="padding: 0% 5%;">
			<label for="price">Price :</label>
			<input type="text" name="price" class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" placeholder="Enter Price" value="<?php echo $price;?>">
		</div>
	</div><br>
	<div class="row">
		<div class="col-xl-6 col-sm-6 col-lg-6 col-md-6" style="padding: 0% 5%;">
			<label>Product Image :</label>
			<input type="file" name="img" class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" placeholder="Enter Product Image" value="<?php echo $img ;?>">
		</div>
	</div>
	<div class="row">
			<div class="col-sm-12 col-xl-12 col-lg-12 col-md-12" style="padding: 0% 35%;">
				<label for="status" >Status</label><br><br>
				<div class="col-md-6 col-lg-6">
					<label for="Active"><input type="radio"class=" shadow-sm p-3 mb-5 bg-white rounded" name="status" value="1">Active</label>
					<label style="margin-left: 5%;"  for="Deactive"><input type="radio"class=" shadow-sm p-3 mb-5 bg-white rounded" name="status" value="0">Deactive</label>
				</div>
			</div>
	</div><br>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xl-12 col-sm-12" style="padding: 5% 30%;">
			<button class="btn btn-dark btn-block btn-lg" type="submit" name="Submit">Insert</button>
		</div>
	</div>	
</form>