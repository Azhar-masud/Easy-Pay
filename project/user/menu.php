<?php
include("connect/connected.php");
session_start();
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="all" />
<title>Mega menu</title>
<link href="css/dcmegamenu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type='text/javascript' src='js/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='js/jquery.dcmegamenu.1.2.js'></script>
<script type="text/javascript">
$(document).ready(function($){
	$('#mega-menu-tut').dcMegaMenu({
		rowItems: '3',
		speed: 'fast'
	});
});
</script>
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<style>
/* Demo Styles */
.wrap {width: 100%; margin: 0 auto;}
</style>
</head>
<body>
<div class="wrap">

<div class="dcjq-mega-menu">
<ul id="mega-menu-tut" class="menu">
	<li><a href="#">Home</a></li>
	<li><a href="#">Vehicles</a>
		<ul>
			<li id="menu-item-1"><a href="#">Coupe</a>
				<ul>
					<li><a href="#">Citroen C4</a></li>
					<li><a href="#">Honda CR-Z</a></li>
					<li><a href="#">BMW 3 Series</a></li>
					<li><a href="#">Volvo C30</a></li>
				</ul>
			</li>
			<li id="menu-item-2"><a href="#">Saloon</a>
			    <ul>
					
					<li><a href="#">Volkswagen Passat</a></li>
					<li><a href="#">Volvo S40</a></li>
					<li><a href="#">Vauxhall Insignia</a></li>
					<li><a href="#">Mitsubishi Lancer</a></li>
					
				</ul>
			</li>
			<li id="menu-item-3"><a href="#">Convertibles</a>
			    <ul>
					
					<li><a href="#">Mini Convertible</a></li>
					<li><a href="#">Renault Megane CC</a></li>
					<li><a href="#">Peugeot 207 CC</a></li>
					<li><a href="#">Volkswagen Eos</a></li>
					
				</ul>
			</li>
			<li id="menu-item-4"><a href="#">SUV's</a>
			    <ul>
					
					<li><a href="#">Land Rover Freelander 2</a></li>
					<li><a href="#">Audi Q5</a></li>
					<li><a href="#">Land Rover Discovery 3</a></li>
					<li><a href="#">Volvo XC90</a></li>
					
				</ul>
			</li>
			<li id="menu-item-5"><a href="#">Pickups</a>
			    <ul>
					<li><a href="#">Suzuki Equator</a></li>
					<li><a href="#">Ford F-150</a></li>
					<li><a href="#">Toyota Tacoma</a></li>
					<li><a href="#">Nissan Frontier</a></li>
					
				</ul>
			</li>
			<li id="menu-item-6"><a href="#">High Performance Cars</a>
			    <ul>
					<li><a href="#">Lamborghini Gallardo</a></li>
					<li><a href="#">Ferrari F430</a></li>
					<li><a href="#">Aston Martin Vantage</a></li>
					<li><a href="#">Porsche 911 Turbo</a></li>
					
				</ul>
			</li>
			
		</ul>
	</li>
	
<li><a href="#">About Us</a>
  <ul><li><a href="#">About Us</a></li><li><a href="#">About Us</a></li>
  </ul></li>
<li><a href="#">Services</a></li>
<li><a href="#">Contact us</a></li>
</ul>
</div>
</div>
<div style="height: 350px; position: absolute;"></div>
</body>
</html>
