<?php

include("connect/connected.php");
session_start();
$email=$_SESSION['email'];
$final_ammount=$_SESSION['final_ammount'];
$page=$_GET['page'];

?>
<?php 
$select_row_sing_in_user=mysql_query("SELECT * FROM user_sign_up WHERE email='$email'");
$select_col_user_sing_in=mysql_fetch_array($select_row_sing_in_user);
$user_name=$select_col_user_sing_in[0].' '.$select_col_user_sing_in[1];
?>

<?php

if(isset($_POST['payment']))
{
  $final_taka_after_shopping=0;
  $name=$_POST['user_name'];
  $u_email=$_POST['email'];
  $address=$_POST['address'];
  $city=$_POST['city'];
  $post_code=$_POST['post_code'];
  $order_id=$_POST['order_id'];

  #querry final wallet for chek taka 
  $ck_data_final_wallet=mysql_query("SELECT * FROM final_wallet WHERE email='$u_email'");
  $ck_all_data_final_wallet=mysql_fetch_array($ck_data_final_wallet);

  if($final_ammount<$ck_all_data_final_wallet[1])
  {
    $final_taka_after_shopping=$ck_all_data_final_wallet[1]-$final_ammount;
    mysql_query("UPDATE final_wallet set total_taka='$final_taka_after_shopping' WHERE email='$email'");
    if(mysql_affected_rows()>0)
    {
          
      mysql_query("INSERT INTO final_method_shopping(`order_code`,`user_name`,`user_email`,`address`,`city`,`post_code`,`total_price`)VALUES('$order_id','$name','$u_email','$address','$city','$post_code','$final_ammount')");
      $_SESSION['order_id']=$order_id;
      echo "<script>location='invoice.php'</script>";
      

    }
    else
    {
      echo "<script>alert('Shopping is not success')</script>";
    }

  }
  else
  {
    echo "<script>alert('Please reacharge Ammount')</script>";
  }

}
 
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

 <div class="row">
              <h2 style="font-size:25px;font-weight:700;border:1px solid green;padding:20px;" class="text-center">Easy Pay</h2>
               <div class="col-md-4"></div>
               <div class="col-md-4">
                   <div class="home">
                       <div class="img">
                           <img src="" alt="">
                       </div>
                       <div class="form" >
                         <form action="" method="Post">
                           <div class="form-group">
                               <label for="">User Name</label>
                               <input readonly="" type="text" value="<?php print $user_name?>" class="form-control" name="user_name" placeholder="">
                           </div>
                           <div class="form-group">
                               <label for="">Email:</label>
                               <input type="email" readonly="" value="<?php print $email?>" class="form-control" name="email"">
                           </div>
                           <div class="form-group">
                               <label for="">Address</label>
                               <textarea name="address" class="form-control" cols="30" rows="3"><?php print $select_col_user_sing_in[4]?></textarea>
                           </div>
                           <div class="form-group">
                               <label for="">City</label>
                               <input type="text" class="form-control" name="city" aria-describedby="helpBlock2">
                           </div>
                           <div class="form-group">
                               <label for="">Post Code</label>
                               <input type="text" class="form-control" name="post_code">
                           </div>

                           <div class="form-group">
                               <label for="">Order id</label>
                               <input type="text" value="<?php echo rand(45455,43565566775595)?>" class="form-control"  name="order_id">
                           </div>
                           
                          <input type="submit" name="payment" class="btn btn-primary" value="Payment"> 
                           
                           <br><br>
                           </form>
                       </div>
                   </div>
               </div>
               <div class="col-md-2"><br>
               	<h3 style="color: blue; padding-bottom: 10px;border-bottom: 2px solid #000">Total Taka :<?php print $final_ammount?></h3>

               </div>
               <div class="col-md-2"></div>
           </div>

	
</body>
</html>