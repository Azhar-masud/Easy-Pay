<?php
include("connect/connected.php");
session_start();
$s_id=session_id();
$page=$_GET['page'];
$email=$_SESSION['email'];

?>
<?php

if(isset($_POST['up']))
{
	$pdt_up_id=$_POST['up'];
	$up_quantity=$_POST['quantity'];
	echo "<script>alert('$pdt_up_id $up_quantity')</script>";
	// mysql_query("UPDATE add_card_data set pdt_quantity='$up_quantity' WHERE session_id='$s_id' AND pdt_id='$pdt_up_id'");
	// if(mysql_affected_rows()>0)
	// {
	// 	$select_up_total_price=mysql_query("SELECT * FROM add_card_data WHERE session_id='$s_id' AND email='$email' AND  pdt_id='$pdt_up_id'");
	// 	$select_total_final_price=mysql_fetch_array($select_up_total_price);
	// 	$up_total_price=$up_quantity*$select_total_final_price[4];

	// 	mysql_query("UPDATE add_card_data set total_price='$up_total_price' WHERE session_id='$s_id' AND pdt_id='$pdt_up_id'");
	// 	echo "<script>alert('Update successfully')</script>";
	// }
	// else
	// {
	// 	echo "<script>alert('Update is not successfully')</script>";
	// }

}

if(isset($_POST['del']))
{
	$pdt_del_id=$_POST['del'];
	mysql_query("DELETE FROM add_card_data WHERE session_id='$s_id' AND email='$email' AND pdt_id='$pdt_del_id'");
	if(mysql_affected_rows()>0)
	{
			echo "<script>alert('Delete successfully')</script>";
	}
	else
	{
			echo "<script>alert('Delete is not successfully')</script>";
	}
}

?>

<?php

if(isset($_POST['s_continue']))
{
	echo "<script>location='easy_main.php'</script>";

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="shortcut icon" href="../favicon.ico">
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
</head>
<body>
	<style type="text/css">
		.shopping_head h4
		{
			text-align: center;
		}
		.shopping_single_row
		{
			height: 100px;
			padding-bottom: 10px;
			color: #000;
			width: 100%;
			border:1px solid green;
		}
		.shopping_single_row img
		{
			height: 60px;
			width: 80px;
			margin-top: 20px;
			margin-left: 30px;
		}
		.shopping_single_row h5
		{
			text-align: center;
			padding-top: 30px;
		}
		.up_del
		{
			margin-top: 30px;
		}
		
	</style>
	
		<br><br>
		<div class="container">
			<div class="row">
				<div class="shopping_head">
					<div class="col-md-2">
						<h4>Item image</h4>
					</div>
					<div class="col-md-2">
						<h4>Product Name</h4>
					</div>
					<div class="col-md-2">
						<h4>Quantity</h4>
					</div>
					<div class="col-md-2">
						<h4>Unite price</h4>
					</div>
					<div class="col-md-2">
						<h4>Total price</h4>
					</div>
					
					<div class="col-md-2">
						<h4>Up or Delete</h4>
					</div>
				</div>
			</div>
			
		</div>
	<form method="post">
		<div class="container">
			<?php 
				$select_add_cart_data_all=mysql_query("SELECT * FROM add_card_data WHERE session_id='$s_id' AND email='$email'");
				$finale_price=0;
				while ($select_add_cart_select_data=mysql_fetch_array($select_add_cart_data_all)) 
				{
					$id=$select_add_cart_select_data[2];
					$finale_price=$finale_price+$select_add_cart_select_data[6];
					
			?>
			<div class="row">
				<div class="shopping_single_row">
					<div class="col-md-2">
						<?php

							for ($i=0; $i < 1; $i++) { 
						?>
							<img src="../admin/images/product_image/<?php print $select_add_cart_select_data[2]."($i)"?>.jpg">
						<?php
							}
						?>
					</div>
					<div class="col-md-2">
						<h5><?php print $select_add_cart_select_data[3]?></h5>
					</div>
					<div class="col-md-2">
						<select style="margin-top: 30px;" name="quantity" class="form-control">
							<option value="<?php print $select_add_cart_select_data[5]?>"><?php print $select_add_cart_select_data[5]?></option>
							<?php
								#product quantity
								$select_product_quntity_querry=mysql_query("SELECT * FROM product WHERE pro_id='$id'");
								$select_all_data_querry=mysql_fetch_array($select_product_quntity_querry);
													$i=1;
								while ($i<=$select_all_data_querry[4]) 
													{
							?>
								<option value="<?php print $i?>"><?php print $i?></option>

							<?php

								$i++;
								
								}

							?>
						</select>
					</div>
					<div class="col-md-2">
						<h5><?php print $select_add_cart_select_data[4]?></h5>
					</div>
					<div class="col-md-2">
						<h5><?php print $select_add_cart_select_data[6]?></h5>
					</div>
					<div class="col-md-2">
						<div class="up_del">
							<button name="up" value="<?php print $id?>" class="btn btn-info">Update</button>
							<button value="<?php print $id?>" name="del" class="btn btn-danger">Delete</button>
						</div>
					</div>
					
				</div>
			</div>
			<?php
				}
			?>
		</div>
		<div class="container">
			<div class="row">
				<div class="shopping_head">
					<div class="col-md-2">
						
					</div>
					<div class="col-md-2"><br>
						<button type="submit" name="s_continue" class="btn btn-success">Shopping Continue</button>
					</div>
					<div class="col-md-2"><br>
						<button type="submit" name="chek_out" class="btn btn-warning">Process Checkout</button>
					</div>
					<div class="col-md-2">
						<h3 style="text-align: right;">Total price:</h3>
					</div>
					<div class="col-md-2">
						<h3 style="text-align: left;"><?php print $finale_price?></h3>
					</div>
					
					<div class="col-md-2">
						<h4></h4>
					</div>
				</div>
			</div>
			
		</div>
	</form>

<?php

if(isset($_POST['chek_out']))
{
	$_SESSION['total_taka']=$finale_price;
	echo "<script>location='easy_main.php?&&page=delivery'</script>";
}

?>
</body>
</html>