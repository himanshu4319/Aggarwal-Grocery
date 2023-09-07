<?php
require('LOGIN.php');
 ?>

<?php 
include('header.php');
?>
<?php 
include 'Backened/Connectio.php';
$i = 0;
$Cat_query = " SELECT * FROM categories_1 order by categories asc";
$res = mysqli_query($conn,$Cat_query);?><br>
<center><h2 class="nav-brand text-dark" style="font-family: ubuntu;"><strong>Categories</strong></h2></center><br>
<div class="row">

<?php while ($row = mysqli_fetch_array($res)) {
		$i++;
		if($row['status'] !=0){?>
			<div class="col-md-4 col-sm-6 col-xs-12 col-lg-4 col-xl-3" style="padding: 2% 5%;">
				<div class="card" style="width: 18rem; padding: 5% 5%">
	  				<img style="margin: auto;" src="Admin/images/<?php echo $row['image'];?>" width="auto" height="140px;">
	  				<div class="card-body">
	    				<h5 class="card-title text-dark" style="text-align: center; font-family: ubuntu;"><strong><?php echo $row['categories'];?></strong></h5>
					    <center><button type="submit" class="btn btn-dark" name="edit" style="font-family: 'Ubuntu', sans-serif; " ><strong><?php echo  "<a href='Pro_view.php?id=".$row['id']."' style='color:white;'>Explore</a>"; ?></strong></button></center>
					</div>
				</div>
			
			</div>
	<?php	}
	}?>
</div>	
<?php 
include('footer.php');
?>