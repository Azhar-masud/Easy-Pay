<?php
include("connect/connected.php");
session_start();
?>


<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Blueprint: Background Slideshow</title>
		<meta name="description" content="Blueprint: Background Slideshow" />
		<meta name="keywords" content="blueprint, background image slideshow, fullscreen slideshow, jquery, fullscreen image, web development" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
	
		<div class="container-fluid">
			<div class="main">
				<ul id="cbp-bislideshow" class="cbp-bislideshow">
					<li><img src="images/k1.jpg" alt="image01"/></li>
					
					
					<li><img src="images/k2.jpg" alt=""></li>
					<li><img src="images/k3.jpg" alt=""></li>
					
				</ul>
			</div>
			
			<div class="container">
			    <div class="row">
                    <div class="col-md-2"></div>
			        <div class="col-md-8">
                        <div class="row">
                           <?php
                               $select_item_querry=mysql_query("SELECT * FROM item");
                               while ($select_item_querry_all=mysql_fetch_array($select_item_querry)) 
                               {
                               	 $img_id=$select_item_querry_all[0];
                               	 $item_name=$select_item_querry_all[1];
                               	
                               
                            ?>
                            <div class="col-md-3">
                                <div class="subject-tile-div">
                                    <a href="easy_main.php?&&page=<?php print $item_name?>"><img src="../admin/images/item_icon/<?php print $img_id?>.jpg" alt="">
                                    <h6 class="cbp-ig-title"><?php print $select_item_querry_all[1]?></h6>
                                    </a>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
			        </div>
			        <div class="col-md-2"></div>
			    </div>
			</div>
		</div>
		
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<!-- imagesLoaded jQuery plugin by @desandro : https://github.com/desandro/imagesloaded -->
		<script src="js/jquery.imagesloaded.min.js"></script>
		<script src="js/cbpBGSlideshow.min.js"></script>
		<script>
			$(function() {
				cbpBGSlideshow.init();
			});
		</script>
	</body>
</html>
