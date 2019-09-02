<?php
include("connect/connected.php");
session_start();
$page=$_GET['page'];
$total_taka=$_SESSION['total_taka'];
?>
<?php
	$final_ammount_delivery=0;
	if(isset($_POST['home_delivery']))
	{
		$final_ammount_delivery=$total_taka+200;
		$_SESSION['final_ammount']=$final_ammount_delivery;
		echo "<script>location='easy_main.php?&&page=parcel_shopping'</script>";

	}

?>
<?php
if(isset($_POST['pick_up']))
{
		

		$_SESSION['final_ammount']=$total_taka;
		echo "<script>location='easy_main.php?&&page=pick_up'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Choose Delivery</title>
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
</head>
<style class="text/css">
	.image img
	{
		height: 200px;
		width: 100%;
		border-radius: 40%;
	} 
	.left
	{
		border-top: 2px solid #000;
		margin-top: 30px;
	}
</style>
<body>
	<form method="post">
		<div class="container-fluid">
			<div class="row">
				<h2 style="text-align: center;">Choose delivery option</h2>
				<div class="col-md-9">
					<div class="right">
						<div class="row">
							<div class="col-md-5">
								<div class="image">
									<img src="images/home_delivery.jpg" alt="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="delivery-charge">
									<h3>Home delivery</h3>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam maxime vitae odit. Dignissimos perferendis reiciendis magni, facilis, consequuntur blanditiis veritatis quaerat assumenda iusto corporis, voluptatibus fugiat atque voluptatem quis ipsum.
									</p>
									<h3>Charge: 200TK</h3>
									<button type="submit" name="home_delivery" class="btn btn-success">Select Home Delivery</button>
								</div>
							</div>
							<div class="col-md-1"></div>
						</div>
					</div>
					<hr>
				</div>
				<!-- <div class="col-md-3">
					<div class="left">
						<h3>Total Taka:</h3>
					</div>
				</div> -->
			</div>
		</div>
		<div class="container-flui">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-5">
							<div class="image">
								<img src="images/pick-up.png" alt="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="delivery-charge">
								<h3>Pick Up</h3>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam maxime vitae odit. Dignissimos perferendis reiciendis magni, facilis, consequuntur blanditiis veritatis quaerat assumenda iusto corporis, voluptatibus fugiat atque voluptatem quis ipsum.
								</p>
								<h3>Charge: FREE!</h3>
								<button type="submit" name="pick_up" class="btn btn-success">Select Pick Up</button>
							</div>
						</div>
						<div class="col-md-1"></div>
					</div>
					<hr>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</form>
</body>
</html>