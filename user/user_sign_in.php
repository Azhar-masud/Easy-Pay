<?php
  include("connect/connected.php");
  session_start();
  unset($_SESSION['loginfo']);
?>
<?php

if(isset($_POST['submit']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];
  $select_sing_up=mysql_query("SELECT * FROM user_sign_up WHERE email='$email'");
  $select_sing_up_all_data=mysql_fetch_array($select_sing_up);
  if($email==$select_sing_up_all_data[3] && $password == $select_sing_up_all_data[7])
  {
    $_SESSION['email']=$email;
    $_SESSION['loginfo']=true;
    echo"<script>location='easy_main.php'</script>";
  }
  else
  {
    echo"<script>alert('Not match')</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User sign in</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/component.css">
</head>
<body>
   <style type="text/css">
       body
       {
           background-color: #F2F2F2;
       }
      .sign-in
       {
           width: 100%;
           height: 340px;
           background-color:none
           margin-top: 100px;
           border-radius: 10px;
       }
      .sign-in h1
        {
            text-align: center;
            color: brown;
            padding-top: 20px;
        }
    
   </style>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <form method="post">
                <div class="col-md-4">
                    <div class="sign-in">
                        <h1>User Sign In</h1>
                        <label>User Name:</label>
                        <input type="text" name="email" class="form-control" placeholder="User Name"><br>
                        <label>User Password:</label>
                        <input type="password" name="password" class="form-control" placeholder="User Password"><br>
                        <button type="submit" name="submit" class="btn btn-success form-control">Sin In</button><br><br>
                        <a href="form.php?&&page=sing_up">Create an account?</a>
                    </div>
                </div>
            </form>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>