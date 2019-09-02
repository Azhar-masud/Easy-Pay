<?php
include("connect/connected.php");
session_start();
$session_id=session_id();
$order_id=$_SESSION['order_id'];
$email=$_SESSION['email'];

$date=date("d/m/y");
date_default_timezone_set('Asia/Dhaka');
$time=date("h.i.sa");

?>
<?php
  $select_shopping_final_method=mysql_query("SELECT * FROM final_method_shopping WHERE order_code='$order_id'");
  $slect_all_shopping_information=mysql_fetch_array($select_shopping_final_method);
?>
<?php
#user sing in form querry 
$invoice_information_querry=mysql_query("SELECT * FROM user_sign_up WHERE email='$email'");
$invoice_information_querry_all_data=mysql_fetch_array($invoice_information_querry);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Easy pay</title>
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    .product_heading
    {
    	color: #A7C633;
    	font-weight: bold;
    	text-align: center;
    	height: auto;
    	padding: 5px;
    	width: 100%;
    	border: 1px solid #ccc;


    }
    
    .product_detailes
    {
    	color: #A7C633;
    	
    	text-align: center;
    	height: 50px;
    	padding: 5px;
    	width: 100%;
    	border-bottom: 1px solid #ccc;
    }
    .product_total_price
    {
    	text-align: center;
    	color: #000;
    	font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="images/logo.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                Invoice #: <?php print $order_id?><br>
                                Created: <?php print $date?><br>
                                Time: <?php print $time?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                            <td>
                               Name: <?php echo $invoice_information_querry_all_data[0]." ".$invoice_information_querry_all_data[1]?><br>
                               Address: <?php echo $invoice_information_querry_all_data[4]?><br>
                               Number: <?php echo $invoice_information_querry_all_data[2]?>
                            </td>
                            
                            
                            <td>
                               Easy pay online shopping<br>
                                Online Market palace<br>
                                easypay@gmail.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
    </table>
    <div class="row">
    	<div class="product_heading">
    		<div class="col-md-3">Product Name</div>
	    	<div class="col-md-3">Product Quantity</div>
	    	<div class="col-md-3">Unite Price</div>
	    	<div class="col-md-3">Product Total Price</div>
	    	<hr>
    	</div>
    </div>
	
	<?php

		#add_cart_table_querry
		$invoice_info_querry=mysql_query("SELECT * FROM add_card_data WHERE session_id='$session_id' AND email='$email'");
		while ($invoice_product_info=mysql_fetch_array($invoice_info_querry))
		 {
			

	?>
    <div class="row">
    	<div class="product_detailes">
    		<div class="col-md-3"><?php print $invoice_product_info[3]?></div>
	    	<div class="col-md-3"><?php print $invoice_product_info[5]?></div>
	    	<div class="col-md-3"><?php print $invoice_product_info[4]?> Tk</div>
	    	<div class="col-md-3"><?php print $invoice_product_info[6]?> Tk</div>
    	</div>
    </div>
    <?php }?>
    <div class="row">
    	<div class="product_detailes">
    		<div class="col-md-3"></div>
	    	<div class="col-md-3"></div>
	    	<div class="col-md-3"><b style="color:#49535B">Delevery charge :<b></div>
	    	<div class="col-md-3">200 Tk</div>
    	</div>
    </div>
    <div class="row">
    	<div class="product_total_price">
    		<div class="col-md-3"></div>
	    	<div class="col-md-4"></div>
	    	<div class="col-md-2">Total Price :</div>
	    	<div class="col-md-3"><?php print $final_ammount=$_SESSION['final_ammount'];?> Tk</div>
    	</div>
    </div>
    </div>

    
    
    
</body>
</html>