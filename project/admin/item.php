<?php
#connect data
mysql_connect('localhost','root','');
mysql_select_db('easy_pay');
?>

<?php

if(isset($_POST['add']))
{
    $item_name=$_POST['item_name'];
    $item_id=$_POST['item_id'];
    mysql_query("INSERT INTO item(`item_id`,`item_name`)VALUES('$item_id','$item_name')");
    if(mysql_affected_rows()>0)
    {
        
        $image_location="images/item_icon/$item_id.jpg";
        // move_uploaded_file($_FILES['image']['tmp_name'],$image_location);
        move_uploaded_file($_FILES['image'][tmp_name],$image_location);
        echo "<script>alert('insert success')</script>";
    }
    else
    {
        echo "<script>alert('insert is not success')</script>";
    }


}

if(isset($_POST['src']))
{
    $src_id=$_POST['search'];
    $select_item_table_data=mysql_query("SELECT * FROM item WHERE item_id='$src_id'");
    $select_item_name=mysql_fetch_array($select_item_table_data);
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
            height: 100px;
            width: 100%;
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
                        <input type="name" class="form-control" value="<?php print $select_item_name[1]?>" name="item_name" placeholder="Item Name"><br>
                        <label>Item Id:</label>
                        <input type="id" class="form-control" value="<?php print $select_item_name[0]?>" name="item_id" placeholder="Item id"><br>
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
                                <img src="images/item_icon/<?php print $select_item_name[0]?>.jpg" alt="">
                          </div>
                      </div>
                      <div class="col-md-2"></div>
                      </div>
                </div>
            </div>
          </form>
        </div>
    </div>
    



    <?php
      if (isset($_POST['view']))
       {
          $table_data=mysql_query("SELECT * FROM item_info");

    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="table">
                    <table>
                        <tr>
                            <th>item_name</th>
                            <th>item_id</th>
                        </tr>
                        <?php 
                        while ($table_data_all=mysql_fetch_array($table_data)) {
                          
                        ?>
                        <tr>
                            <td><?php print $table_data_all[0] ?></td>
                            <td><?php print $table_data_all[1] ?></td>
                        </tr>
                        <?php

                         } 
                        ?>
                    </table>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <?php
      }

    ?>

   <!--   -->
</body>
</html>