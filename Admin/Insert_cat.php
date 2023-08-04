<?php
require('Connection.php');
$msg = "";
$cat_name = "";
$img = "";
$status = "";
$sql = "";
$sql1 = "";
$res = "";
if(isset($_GET['id']) && $_GET['id'] != ""){
		$id = mysqli_real_escape_string($conn,$_GET['id']);
		$res = mysqli_query($conn , "SELECT * From categories_1 WHERE id = '$id'");
		$row = mysqli_fetch_array($res);
		$cat_name = $row['categories'];
		$img = $row['image'];
		$status = $row['status'];
	}	
if(isset($_POST['upload']))
{	
	$cat_name = mysqli_real_escape_string($conn , $_POST['cat']);
	$img = mysqli_real_escape_string($conn , $_POST['img']);
	@$status = mysqli_real_escape_string($conn , $_POST['status']);
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$query = "UPDATE categories_1 set image = '$img',categories = '$cat_name', status = '$status' WHERE id = '$id'"; 
		mysqli_query($conn,$query);
		header('location:categories.php');
	}
	else{	
		
		$sql = "SELECT * FROM categories_1 WHERE 	categories = '$cat_name'";
		$result = mysqli_query($conn , $sql);
		$count = mysqli_num_rows($result);
		if($count != 0){
			$msg = "Category Already Exists";
		}
		else{
			$sql1 = "INSERT INTO categories_1 (image , categories , status) VALUES ('$img' , '$cat_name' , '$status')";
			$res = mysqli_query($conn , $sql1);
			header('location:categories.php');
		}
	}
}

include 'header.php';?>

	<p style="color:red; font-size: 20px; padding: 0% 40%;"><?php echo $msg; ?></p>	 
<div class="row">
	<h3 style="padding: 2% 40%; font-family: 'Ubuntu', sans-serif;">Insert a New Category.</h3>
</div>
<form method="POST">
	<div class="form-group">
		<div class="row">
			<div class="col-md-6 col-lg-6 col-xl-6 col-sm-6" style="padding: 0% 7%;">
				<label for="cat" style="font-size: 20px;  font-family: 'Ubuntu', sans-serif;"><strong>Category Name</strong></label>
				<input type="text " class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" name = "cat" placeholder="Enter Category" value="<?php echo $cat_name; ?>" >
			</div>
			<div class="col-md-6 col-lg-6 col-xl-6 col-sm-6" style="padding: 0% 7%;">
				<label for="img" style="font-size: 20px;  font-family: 'Ubuntu', sans-serif;"><strong>Category Image</strong></label>
				<input type="file" class="form-control ml-auto shadow-sm p-3 mb-5 bg-white rounded" name = "img" placeholder="Enter image" value="<?php echo $img; ?>">
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-12 col-xl-12 col-lg-12 col-md-12" style="padding: 0% 30%;">
				<label for="status"style="font-size: 20px;  font-family: 'Ubuntu', sans-serif;" ><strong>Status</strong></label><br><br>
				<div class="col-md-6 col-lg-6">
					<label for="Active" style="font-size: 20px;  font-family: 'Ubuntu', sans-serif;"><input type="radio"class=" shadow-sm p-3 mb-5 bg-white rounded" name="status" value="1">Active</label>
					<label style="margin-left: 5%; font-size: 20px;  font-family: 'Ubuntu', sans-serif;" for="Deactive"><input type="radio"class=" shadow-sm p-3 mb-5 bg-white rounded" name="status" value="0">Deactive</label>
			</div>
		</div><br>
	</div>	
	<button type="submit" class="btn btn-dark btn-lg" style="margin-left: 45%; margin-right: 45%;" name="upload" >Insert</button>

</form>
