<?php
include("connect/connected.php");
session_start();
$page=$_GET['page'];
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
		<form method="post">
			<div class="menu-icon-access">
				<div class="row">
					<div class="col-md-9">
						<?php
                            include"menu.php";
                        ?>
					</div>
					<div class="col-md-3">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<div class="icon_shop">
									<button type="submit" class="btn btn-success" name="shop"><i class="fa fa-shopping-cart"></i>&nbsp;</button>
								</div>
							</div>
							<div class="col-md-4"> 
								<div class="loginfo">
									<?php

										if($_SESSION['loginfo']==true)
										{
									?>
										<a href="form.php?&&page=login"><input type="button" class="btn btn-success" value="Logout"></a>
									<?php
										}
										else
										{
									?>
										<a href="form.php?&&page=login"><input type="button" class="btn btn-success" value="Login"></a>
									<?php
										}
									?>
									
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</form>
	<?php

	switch ($page)
	 {
		case 'home':
			include"home.php";
			break;
		case 'Laptop':
			include"product.php";
			break;
		case 'Backpack':
			include"product.php";
			break;
		case 'add_cart':
			include"add_cart.php";
			break;
		case 'shopping_cart':
			include"shopping_cart.php";
			break;
		case 'delivery':
			include'delivery.php';
			break;
		case 'parcel_shopping':
			include'parcel_shopping_method.php';
			break;
		case 'pick_up':
			include'parcel_shopping_method.php';
			break;
		default:
			include"home.php";
			break;
	}

	?>
</body>
</html>