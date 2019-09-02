<?php
#connect data
mysql_connect('localhost','root','');
mysql_select_db('easy_pay');
?>
<?php

if(isset($_POST['add']))
{
    $item_name=$_POST['item_name'];
    $cat_name=$_POST['cat_name'];
    $cat_id=$_POST['cat_id'];
    mysql_query("INSERT INTO catagory(`item_name`,`cat_name`,`cat_id`)VALUES('$item_name','$cat_name','$cat_id')");
    if(mysql_affected_rows()>0)
    {
        // $image="images/profile/$email.jpg";
         // move_uploaded_file($_FILES['image']['tmp_name'], $image);
        $image="images/brand_logo/$cat_id.jpg";
        move_uploaded_file($_FILES['image']['tmp_name'],$image );
        echo"<script>alert('Catagory data added')</script>";
    }
    else
    {
        echo"<script>alert('Catagory data is not added')</script>";
    }

}

?>

<?php
if(isset($_POST['src']))
{
    $cat_id=$_POST['search'];
    $select_all_cat_for_src=mysql_query("SELECT * FROM catagory WHERE cat_id='$cat_id'");
    $select_all_car_data_src=mysql_fetch_array($select_all_cat_for_src);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category information</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/sing.css">
</head>
<body>
<style type="text/css">
        
        .table
            {
                height: auto;
                width: 100%;
                text-align: center;
                margin-top: 50px;
            }
        .table table
            {
                width: 100%;
            }
        .table table tr th,td
            {
                border: 1px solid #000;
                width: 50%;
                height: 50px;
                text-align: center;
            }

        .show-image
        {
            height: 100px;
            width: 80%;

        }
        .show-image img
        {
            height: 60px;
            width: 50%;
        }

    </style>
<br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="category-info">
                   <br><br><br>
                    <form method="post" enctype="multipart/form-data">
                        <input type="text" class="form-control" name="search" placeholder="Search Your Item"><br>
                        <label>Item Name:</label>
                       
                        <select class="form-control" name="item_name">

                            <?php
                                if(isset($_POST['src']))
                                {
                            ?>
                                <option><?php print $select_all_car_data_src[0]?></option>
                            <?php
                                }
                                else
                                {

                                    $select_item=mysql_query("SELECT * FROM item");
                                    while ($slect_all_item=mysql_fetch_array($select_item)) 
                                    {
                                        
                            ?>
                                <option><?php print $slect_all_item[1]?></option>
                            <?php

                                    }
                                }
                            ?>
                        </select>
                        <br>
                        <label>Catagory Name:</label>
                        <input type="text" class="form-control" value="<?php print $select_all_car_data_src[1]?>" name="cat_name" placeholder="Catagory Name"><br>
                        <label>Catagory Id:</label>
                        <input type="text" class="form-control" value="<?php print $select_all_car_data_src[2]?>" name="cat_id" placeholder="Catagory id"><br>
                        <input type="file" name="image" class="form-control"><br>
                        
                        <div class="row">
                        <div class="col-md-3">
                            <button class="btn btn-success" name="add">Add</button>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-success" name="edit">Edit</button>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-success" name="delete">Delete</button>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-success" name="view" style="margin-left:10px;">View</button>
                        </div>
                    </div>
                        
                   
                </div>
            </div>
            <div class="col-md-4">
                <div class="category-info">
                     <br><br><br>
                      <button class="btn btn-success" name="src">Search</button>
                      <div class="row"> 
                      <div class="col-md-2"></div>
                      <div class="col-md-8">
                          <div class="show-image">
                                <img src="images/brand_logo/<?php print $select_all_car_data_src[2]?>.jpg" alt="">
                          </div>
                      </div>
                      <div class="col-md-2"></div>
                      </div>
                </div>
            </div>
          </form>
        </div>
    </div>
    



    
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <?php
                    if(isset($_POST['view']))
                    {
                 ?>
                <div class="table">
                    <table>
                        <tr>
                            <th>item_name</th>
                            <th>Cat_name</th>
                            <th>Cat_id</th>
                        </tr>
                       <?php
                         $sesect_cat=mysql_query("SELECT * FROM catagory");
                         while ($select_cat_all_data=mysql_fetch_array($sesect_cat)) {
                          
                       ?>
                        <tr>
                            <td><?php print $select_cat_all_data['0'] ?></td>
                            <td><?php print $select_cat_all_data['1'] ?></td>
                            <td><?php print $select_cat_all_data['2'] ?></td>
                        </tr>
                       <?php
                          #
                         }
                       ?>
                    </table>
                </div>
                <?php
                    }

                ?>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    

 
</body>
</html>
