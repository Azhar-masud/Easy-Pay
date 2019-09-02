<?php
#connected data
mysql_connect('localhost','root','');
mysql_select_db('easy_pay');
session_start();
?>
<?php
  if(isset($_POST['submit']))
  {
    #value recive
    
    $email=$_POST['email'];
    $password=$_POST['password'];
    $select_sing_table=mysql_query("SELECT * FROM admin_sing_up WHERE email='$email'");
    $select_sing_all_data=mysql_fetch_array($select_sing_table);
    if($email==$select_sing_all_data[1])
    {
        if($password==$select_sing_all_data[6])
        {
            echo "<script>location='home.php'</script>";
            $SESSION['email']==$email;
            $SESSION['loginfo']=true;
        }
        else
        {
            echo "Password  wrong";
        }

    }
    else
    {
        echo "Email is not match";
    }

    
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sing.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="sign-up-data">
                    <form method="post">
                        <h1>Sign In Your Data</h1>
                        
                        <label>Your Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email"><br>
                     
                        
                        <label>Your Password:</label>
                        <input type="password" name="password" class="form-control" placeholder="Password"><br>
                        
                        <button type="submit" name="submit" class="btn btn-success form-control">Submit</button><br><br>
                        <a href="form.php?&&page=sing_up">Create an account?</a>

                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>