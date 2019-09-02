<?php
include("connect/connected.php");
session_start();
$s_id=session_id();
$page=$_GET['page'];
$email=$_SESSION['email'];
$date=date("Y-m-d");
?>

<?php
#Data add in dbbl&bkash
	
if(isset($_POST[send]))
{
	$bank_select=$_POST['bank_select'];
	$phone=$_POST['phone'];
	$money=$_POST['money'];
	if(!empty($bank_select) && !empty($phone) && !empty($money))
	{

		  $mobile_bank=mysql_query("INSERT INTO bkash_dbbl(`email`,`bank_name`,`number`,`ammount`,`date`)VALUES('$email','$bank_select','$phone','$money','$date')");

			if(mysql_affected_rows()>0)
			{

				echo "<script>alert('Data Add successfull')</script>";
			}
			else
			{
				print "Data add not success";
			}

	}
	else
	{
		print "Please Fill out your feild";
	} 

}
if(isset($_POST['send']))
{
	$money=$_POST['money'];
	$up_ammount=0;
	$select_final_walet=mysql_query("SELECT * FROM final_wallet WHERE email='$email'");
	$selct_final_wallet_fetch=mysql_fetch_array($select_final_walet);
	$up_ammount=$money+$selct_final_wallet_fetch[1];
	if($email != $selct_final_wallet_fetch[0])
	{
		mysql_query("INSERT INTO final_wallet(`email`,`total_taka`)VALUES('$email','$money')");

	}
	else
	{
		mysql_query("UPDATE final_wallet SET total_taka='$up_ammount' WHERE email='$email'");

	}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bkash&&DBBL</title>
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
</head>
<body>

	<div class="container">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="form">
						<form action="" method="post">
							<div class="form-group" style="margin-top: 50px">
		                        <label style="text-align: center;">Mobile Bank Name</label>
		                         <select name="bank_select"  class="form-control">
		                         	<option >Choice a account</option>
		                         	<option >DBBL</option>
		                         	<option >bkash</option>
		                         </select>
	                       </div>
	                        <div class="form-group">
		                        <label>User Phone</label>
		                         <input type="number" class="form-control" name="phone" placeholder="User phone number">
	                     </div>
	                      <div class="form-group">
	                        <label>Ammount</label>
	                         <input type="text" class="form-control" name="money" placeholder="Money">
	                     </div>
	                     <input type="submit" class="btn btn-warning" name="send" value="Add money">
						</form>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
	</div>
	<br><br>
	
</body>
</html>