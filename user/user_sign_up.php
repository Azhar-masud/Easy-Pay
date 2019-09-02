<?php
  include("connect/connected.php");
?>
<?php
    if (isset($_POST['submit'])) 
    {
      
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $number=$_POST['number'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $district=$_POST['district'];
    $gender=$_POST['gender'];
    $password=$_POST['password'];
    $c_password=$_POST['c_password'];
    mysql_query("INSERT INTO user_sign_up(`first_name`,`last_name`,`number`,`email`,`address`,`district`,`gender`,`password`)VALUES('$first_name','$last_name','$number','$email','$address','$district','$gender','$password')");
    if (mysql_affected_rows()>0)
     {
        $image_location="images/profile/$email.jpg";
        move_uploaded_file($_FILES['image'][tmp_name],$image_location);
       echo "<script>alert('Added success.!')</script>";
    }
    else
    {
      echo "<script>alert('Added not success.!')</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/">
</head>
<body>
   <style>
        body
       {
           background-color: #F2F2F2;
       }
      .sign-up-data
       {
           margin-bottom: 20px;
       }
      .sign-up-data h1
       {
           text-align: center;
           color: cadetblue;
       }
   </style>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="sign-up-data">
                    <form method="post" enctype="multipart/form-data">
                        <h1>User Sign Up</h1>
                        <label>Frist Name:</label>
                        <input type="text" name="first_name" class="form-control" placeholder="Frist Name"><br>
                        <label>Last Name:</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name"><br>
                        <label>Your Number:</label>
                        <input type="number" class="form-control" name="number" placeholder="Enter Number"><br>
                        <label>Your Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email"><br>
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
                        <input type="file" name="image" class="form-control"><br>
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