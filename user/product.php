<?php
include("connect/connected.php");
session_start();
$item=$_GET['page'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product show</title>
</head>
<body>
<style type="text/css">
			.hovereffect {
    width: 100%;
    height: 40%;
    float: left;
    margin-top: 42px;
    
    overflow: hidden;
    position: relative;
    text-align: center;
    cursor: default;
}
.hovereffect .overlay {
width:100%;
height:100%;
position:absolute;
overflow:hidden;
top:0;
left:0;
opacity:0;
background-color:rgba(0,0,0,0.5);
-webkit-transition:all .4s ease-in-out;
transition:all .4s ease-in-out
}
.hovereffect img {
display:block;
position:relative;
height: 200px;
-webkit-transition:all .4s linear;
transition:all .4s linear;
}
.hovereffect h2 {
text-transform:uppercase;
color:#fff;
text-align:center;
position:relative;
font-size:17px;
background:rgba(0,0,0,0.6);
-webkit-transform:translatey(-100px);
-ms-transform:translatey(-100px);
transform:translatey(-100px);
-webkit-transition:all .2s ease-in-out;
transition:all .2s ease-in-out;
padding:10px;
}

.hovereffect a.info {
text-decoration:none;
display:inline-block;
text-transform:uppercase;
color:#fff;
border:1px solid #fff;
background-color:transparent;
opacity:0;
filter:alpha(opacity=0);
-webkit-transition:all .2s ease-in-out;
transition:all .2s ease-in-out;
margin:50px 0 0;
padding:7px 14px;
}

.hovereffect a.info:hover {
box-shadow:0 0 5px #fff;
}

.hovereffect:hover img {
-ms-transform:scale(1.2);
-webkit-transform:scale(1.2);
transform:scale(1.2);
}

.hovereffect:hover .overlay {
opacity:1;
filter:alpha(opacity=100);
}

.hovereffect:hover h2,.hovereffect:hover a.info {
opacity:1;
filter:alpha(opacity=100);
-ms-transform:translatey(0);
-webkit-transform:translatey(0);
transform:translatey(0);
}

.hovereffect:hover a.info {
-webkit-transition-delay:.2s;
transition-delay:.2s;
}

</style>

<div class="container">
	<div class="row">
		<?php 
			$select_row=mysql_query("SELECT * FROM product WHERE item_name='$item'");
			while ($select_col_data=mysql_fetch_array($select_row))
			 {
			 	for ($i=1; $i <2; $i++) { 
			 		
			 	
				
			
		?>
		<div class="col-md-3">
			<div class="hovereffect">
		        <img src="../admin/images/product_image/<?php print $select_col_data[3]."($i)"?>.jpg" alt="" width="278px" height="200px"/>
		        <div class="overlay">
			        <h2><?php print $select_col_data[5]?> Tk</h2>
			        <a class="info" href="easy_main.php?page=add_cart&&pdt_id=<?php print $select_col_data[3]?>">Shop Now</a>
		        </div>
		    </div>
		</div>
	<?php
			}
		}

	?>
	</div>
</div>
</body>
</html>
