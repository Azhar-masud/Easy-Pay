<?php
include("connect/connected.php");
session_start();
$page=$_GET['page'];
$id=$_GET['pdt_id'];
$email=$_SESSION['email'];
?>
<?php 
#query in product  table
$select_row_pdt_info=mysql_query("SELECT * FROM product WHERE pro_id='$id'");
$select_col_data_in_pdt=mysql_fetch_array($select_row_pdt_info);

?>
<?php 
$select_row_sing_in_user=mysql_query("SELECT * FROM user_sign_up WHERE email='$email'");
$select_col_user_sing_in=mysql_fetch_array($select_row_sing_in_user);
?>
<?php
#check product previous review
$select_pdt_review_all_row=mysql_query("SELECT * FROM product_review WHERE product_id='$id' AND email='$email'");
$select_col_in_pdt_rivew=mysql_fetch_array($select_pdt_review_all_row);
if(isset($_POST['submit']))
{
	$message=$_POST['message'];
	$name=$_POST['name'];
	if($_SESSION['loginfo']==true)
	{
		if($email!= $select_col_in_pdt_rivew[2])
		{
			mysql_query("INSERT INTO product_review(`product_id`,`name`,`email`,`message`)VALUES('$id','$name','$email','$message')");
			if(mysql_affected_rows()>0)
			{
				echo "<script>window.alert('Your Rivew is successfully')</script>";
			}
			else
			{
				echo "<script>window.alert('Your Rivew is not successfully')</script>";
			}

		}
		else
		{
			echo "<script>window.alert('Your already review this product')</script>";
		}
		



	}
	else
	{
		echo "<script>location='form.php'</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- //tags -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/owl.carousel.min.css" rel="stylesheet">
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>

<style type="text/css">
	.add_cart_section
    {
        height: 30px;
        width: 100%;
        background-color: #2FDAB8;
        margin-left: 6%;
        margin-top: 5%;
    }
    .add_cart_section button
    {
    	height: 30px;
    	width: 100%;
    	color: white;
    	background-color: #2FDAB8; 
    }
    .add_cart_section button:hover
    {
    	border:2px solid #000;
    	transition: 2s;
    }
    .add-review button[type="submit"]{
    outline: none;
    padding: 14px 0;
    background: #2fdab8;
    border: none;
    width: 20%;
    font-size: 1em;
    color: #fff;
    font-weight: 700;
    letter-spacing: 2px;
	}
	.add-review button[type="submit"]:hover{
	    background: #000;
	}
	.owl-prev{
	height: 40px;
    width: 43px;
    border: 1px solid green;
    position: absolute;
    text-align: center;
    top: -50%;
    left: 5%;
	}
	.owl-next{
	height: 40px;
    width: 43px;
    border: 1px solid green;
    position: absolute;
    text-align: center;
    top: -50%;
    
	}

   .owl-prev .fa
   {
   	font-size: 35px;
    margin-left: 5px;
   }
   .owl-next .fa
   {
   	font-size: 35px;
    margin-left: 5px;
   }

   .info
   {
   	height: 370px;
   	width: 100%;
   	background-color: #000;
   opacity:0.5;
   }
   .product_info_title
   {
   	text-align: right;
   	width: 100%;
   	border-right: 1px solid black;
   	height: auto;
   	color: white;
   	padding-top: 20px;
   }
   .product_short_info
   {
   	color: white;
   }
</style>


  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
	     <div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					
					<ul class="slides">
					   <?php 
					   	 for ($i=1; $i < 2; $i++)
					   	  { 
					   	 	
					   	?>
						<li data-thumb="../admin/images/product_image/<?php print $id."($i)"?>.jpg">
							<div class="thumb-image"> <img src="../admin/images/product_image/<?php print $id."($i)"?>.jpg" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<?php
						  }

						?>

						<?php

							for ($i=2; $i < 3; $i++) 
							{ 
								
							
						?>

					
						<li data-thumb="../admin/images/product_image/<?php print $id."($i)"?>.jpg">
							<div class="thumb-image"> <img src="../admin/images/product_image/<?php print $id."($i)"?>.jpg" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<?php

							}

						?>
						<?php

						for ($i=3; $i < 4; $i++)
						 
						 { 
							
						

						?>
					
					
						<li data-thumb="../admin/images/product_image/<?php print $id."($i)"?>.jpg">
							<div class="thumb-image"> <img src="../admin/images/product_image/<?php print $id."($i)"?>.jpg" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<?php

						  }

						?>
					
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
	<form method="post">
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
			<div class="info">
				<div class="row">
					<div class="col-md-3">
						<div class="product_info_title">
							Product Name :
						</div>
					</div>
					<div class="col-md-9">
						<div class="product_short_info"><br>
							<?php print $select_col_data_in_pdt[2]?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="product_info_title">
							Product Price :
						</div>
					</div>
					<div class="col-md-9">
						<div class="product_short_info"><br>
							<?php print $select_col_data_in_pdt[5]?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="product_info_title">
							Product Code :
						</div>
					</div>
					<div class="col-md-9">
						<div class="product_short_info"><br>
							<?php print $select_col_data_in_pdt[3]?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="product_info_title">
							Product Quantity :
						</div>
					</div>
					<div class="col-md-9">
						<div class="product_short_info">

							<div class="row">
									<div class="col-md-6"><br>
										
										<select name="quantity" class="form-control">
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
									<div class="col-md-6"></div>	
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3">
						<div class="product_info_title">
							Product Detiles :
						</div>
					</div>
					<div class="col-md-9">
						<div class="product_short_info"><br>
							<?php print $select_col_data_in_pdt[6]?>
						</div>
					</div>
				</div>
				<br><br>
				<div class="row">	
			    	<div class="col-md-6">
			    		<div class="row">
			    			<div class="col-md-2">	</div>
			    			<div class="col-md-8">
			    				<button class="btn btn-success form-control" type="submit">Add cart</button>
			    			</div>
			    			<div class="col-md-2"></div>
			    		</div>
			    	</div>
			    	<div class="col-md-6">
			    		<div class="row">
			    			<div class="col-md-2">	</div>
			    			<div class="col-md-8">
			    				<button class="btn btn-success form-control" type="submit">Shopping cart</button>
			    			</div>
			    			<div class="col-md-2"></div>
			    		</div>
			    	</div>
		    	</div>
			</div>
		<br>
		    
			
			</div>
		  </form>
	 			<div class="clearfix"> </div>
				<!-- /new_arrivals --> 
	<div class="responsive_tabs_agileits"> 
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Description</li>
							<li>Reviews</li>
							<li>Information</li>
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
					   <div class="tab1">

							<div class="single_page_agile_its_w3ls">
							 <?php print $select_col_data_in_pdt[6]?>
							</div>
						</div>
						<!--//tab_one-->
						
						<div class="tab2">
							
							<div class="single_page_agile_its_w3ls">
								<div class="bootstrap-tab-text-grids">
									<div class="active_carosal owl-carousel">
										<?php
										$select_pdt_review=mysql_query("SELECT * FROM product_review WHERE product_id='$id'");
										while ($select_pdt_review_all=mysql_fetch_array($select_pdt_review)) {
											
										
										?>
										<div class="bootstrap-tab-text-grid">
											<div class="bootstrap-tab-text-grid-left">
												<img src="images/profile/<?php print $select_pdt_review_all[2]?>.jpg" alt=" " class="img-responsive">
											</div>
											<div class="bootstrap-tab-text-grid-right">
												<ul>
													<li><a href="#"><?php print $select_pdt_review_all[1]?></a></li>
													
												</ul>
												<p>
													<?php print $select_pdt_review_all[3]?>
												</p>
											</div>
											<div class="clearfix"> </div>
							            </div>
							          <?php

							     		 }

							          ?>
							        </div>
									 <div class="add-review">
										<h4>add a review</h4>
										<form action="#" method="post">
												<input readonly="" type="text" name="name" value="<?php print $select_col_user_sing_in[0]." "."$select_col_user_sing_in[1]"?>">
												<input type="email" readonly="" name="email" value="<?php print $select_col_user_sing_in[3]?>"> 
												<textarea name="message" required=""></textarea>
											
											<button type="submit" name="submit" value="">Submit</button>
										</form>
									</div>
								 </div>
								 
							 </div>
						 </div>
						   <div class="tab3">

							<div class="single_page_agile_its_w3ls">
							   <?php print $select_col_data_in_pdt[7]?>
							</div>
						</div>
					</div>
				</div>	
			</div>
	



<!-- js -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/active.js"></script>
<!-- //js -->
<script src="js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links --> 
	<!-- cart-js -->
	<script src="js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>

	<!-- //cart-js --> 
	<!-- single -->
<script src="js/imagezoom.js"></script>
<!-- single -->
<!-- script for responsive tabs -->						
<script src="js/easy-responsive-tabs.js"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- FlexSlider -->
<script src="js/jquery.flexslider.js"></script>
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
<!-- //script for responsive tabs -->		
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap.js"></script>


</body>
</html>

