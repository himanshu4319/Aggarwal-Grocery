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
				window.location.href='index.php';
			</script>";
		}
		else{
			$count = count($_SESSION['cart']);
			$_SESSION['cart'][$count]=array('Product_id'=>$_POST['product_id'],'Product_price' =>$_POST['product_price'],'quantity'=>$_POST['qty']);
			echo "<script>
				alert('Item Added in the cart');
				window.location.href='index.php';
			</script>";
		}	
	}
	else
	{
		$_SESSION['cart'][0] = array('Product_id'=>$_POST['product_id'],'Product_price' =>$_POST['product_price'],'quantity'=>$_POST['qty']);
		echo "<script>
				alert('Item Added.')
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
if(isset($_POST['Mod_Quantity']))
{
	foreach($_SESSION['cart'] as $key=>$value)
	{
		if($value['Product_id']==$_POST['main_id']){
			$_SESSION['cart'][$key]['quantity']=$_POST['Mod_Quantity'];
			echo"<script> 
					alert('quantity updated successfully');
					window.location.href='cart.php';
				</script>";
		}
	}
}
?>