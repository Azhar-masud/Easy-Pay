<?php
#connected data
mysql_connect('localhost','root','');
mysql_select_db('easy_pay');
?>
<?php
  if(isset($_POST['submit']))
  {
    #value recive
    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $address=$_POST['address'];
    $district=$_POST['district'];
    $gender=$_POST['gender'];
    $password=$_POST['password'];
    $c_password=$_POST['c_password'];
    mysql_query("INSERT INTO admin_sing_up(`name`,`email`,`number`,`address`,`district`,`gender`,`password`)VALUES('$name','$email','$number','$address','$district','$gender','$password')");
    if(mysql_affected_rows()>0)
    {
      echo "success";
    }
    else
    {
      echo "Sorry";
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
                        <h1>Sign Up Your Data</h1>
                        <label>Your Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name"><br>
                        <label>Your Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email"><br>
                        <label>Your Number:</label>
                        <input type="number" class="form-control" name="number" placeholder="Enter Number"><br>
                        <label>Your Address:</label>
                        <textarea name="address" class="form-control" rows="5" placeholder="Enter address"></textarea><br>
                        <label>Your District:</label>
                        <select name="district" class="form-control">
                            <option>Dhaka</option>
                            <option>Feni</option>
                            <option>Nowakhali</option>
                        </select><br>
                        <label>Choose Your Gender:</label><br>
                        <input type="radio" name="gender" value="Male">&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="gender" value="Female">&nbsp;&nbsp;Female <br><br>
                        <label>Your Password:</label>
                        <input type="password" name="password" class="form-control" placeholder="Password"><br>
                        <label>Your C-Password:</label>
                        <input type="password" name="c_password" class="form-control" placeholder="c-Password"> <br>
                        <button type="submit" name="submit" class="btn btn-success form-control">Submit</button><br><br>
                        <a href="form.php?&&page=sing_in">Already have a account?</a>

                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>