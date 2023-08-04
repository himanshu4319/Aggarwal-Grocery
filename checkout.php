<?php 
include('LOGIN.php');
$Address='';
$mail='';
if(isset($_POST['check'])){
	$payment = $_POST['pay'];
	if(isset($_SESSION['Email'])){
		$mail1=$_SESSION['Email'];
		$query1 = "SELECT * From register_1 WHERE Email ='$mail1'";
		$result=mysqli_query($conn,$query1);
		while($row = mysqli_fetch_array($result)){
				$Address= $row['Address1']." ".$row['Address2']." ".$row['city']." ".$row['Pincode']." ".$row['State'];
			}
		if(count($_SESSION['cart']) == 0 ){
			echo "<script>
			alert('Cart is Empty');
			window.location.href='index.php';
			</script>";
		}

		else{
			$sql="INSERT INTO `orders`(`Email`, `Product_Id`, `Product Name`, `Quantity`, `Price`, `Address`, `Payment_Status`, `Status`) VALUES (?,?,?,?,?,?,?,?)";
			$stmt = mysqli_prepare($conn,$sql);
			if($stmt){
				mysqli_stmt_bind_param($stmt,"sisiissi",$mail1,$id_pro,$Pro_name,$Quantity,$Price,$Address,$payment,$status);
				foreach ($_SESSION['cart'] as $key => $value) {
					$id_pro = $value['Product_id'];
					$id_query ="SELECT * FROM product WHERE id = '$id_pro'";
					$res = mysqli_query($conn,$id_query);
					while($row_1 = mysqli_fetch_array($res)){
						$Pro_name= $row_1['brand']." ".$row_1['name'];
					}
					$Quantity=$value['quantity'];
					$Price=($value['Product_price'])*($value['quantity']);
					$status=0;
					mysqli_execute($stmt);
				}
				unset($_SESSION['cart']);
				echo "<script>
					alert('order Placed');
					window.location.href='index.php';
				</script>";
			}
		}	
	}
	else{
		echo "<script> 
		alert('You need to login First');
		window.location.href='SignIn.php';

		</script>";
	}
}	
?>
