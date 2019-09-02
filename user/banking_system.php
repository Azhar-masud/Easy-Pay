<?php
include("connect/connected.php");
session_start();
$page=$_GET['page'];
$email=$_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<img style="height: 300px; width: 100%" src="images/mobile_bank.png" alt="">
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<br>
			<div class="col-md-2"></div>
			<div class="col-md-2">
				<img style="height: 60px; width: 100%" src="images/bkash.jpg" alt="">
			</div>
			<div class="col-md-2">
				<img style="height: 60px; width: 100%" src="images/dbbl.jpg" alt="">
			</div>
			<div class="col-md-2">
				<img style="height: 60px; width: 100%" src="images/mastercard.png" alt="">
			</div>
			<div class="col-md-2">
				<img style="height: 60px; width: 100%" src="images/paypal.png" alt="">
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

	<?php

	switch ($page) {
		case 'value':
			# code...
			break;
		
		default:
			include'bkash&&dbbl.php';
			break;
	}

	?>
	
</body>
</html>