<?php
mysql_connect('localhost','root','');
mysql_select_db('easy_pay');
session_start();
$page=$_GET['page'];
// $pdt_name=$_POST['pdt_name'];
// $pdt_id=$_POST['pdt_id'];
// $pdt_quantity=$_POST['Pdt_quantity'];
// $cat_name=$_POST['cat_name'];
// $item_name=$_POST['item_name'];
// $pdt_price=$_POST['Pdt_price'];
// $detailes=$_POST['detailes'];
// $information=$_POST['info'];

?>

<?php 

if(isset($_POST['add']))
{
  $pdt_name=$_POST['pdt_name'];
  $pdt_id=$_POST['pdt_id'];
  $pdt_quantity=$_POST['Pdt_quantity'];
  $cat_name=$_POST['cat_name'];
  $item_name=$_POST['item_name'];
  $pdt_price=$_POST['Pdt_price'];
  $detailes=$_POST['detailes'];
  $information=$_POST['info'];

  mysql_query("INSERT INTO product(`item_name`,`cat_name`,`pro_name`,`pro_id`,`pro_quantity`,`pro_price`,`pro_detailes`,`pro_info`)VALUES('$item_name','$cat_name','$pdt_name',' $pdt_id','$pdt_quantity','$pdt_price','$detailes','$information')");
  if(mysql_affected_rows()>0)
  {


    
    
    $image_count=($_FILES['image']['tmp_name']);
    for ($i=0;$i<count($image_count); $i++) { 
      $image_name=$pdt_id."($i)";
      $image_location="images/product_image/$image_name.jpg";
      move_uploaded_file($image_count[$i], $image_location);
    }
    echo "<script>alert('data is added')</script>";
  }
  else
  {
    echo "<script>alert('data is not added')</script>";
  }


}

?>

<?php
if(isset($_POST['src']))
{
  $src_id=$_POST['src_id'];
  $select_product_data=mysql_query("SELECT * FROM product WHERE pro_id='$src_id'");
  $select_product_data_all=mysql_fetch_array($select_product_data);

}

?>





<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>item</title>
</head>
<body>
	<div class="container">
         <div class="item-div">
           <div class="row">
             <div class="col-md-3"></div>
             <div class="col-md-5">
               <div class="form-group">
				  <form method="post" enctype="multipart/form-data">
                     <div class="row">
                         
                         <div class="col-md-9">
                             <input type="text" class="form-control" name="src_id" placeholder="search Yout item">
                             <br>

                             <label>Item name:</label>
                             <select class="form-control" name="item_name">
                             
                                <?php
                                  if(isset($_POST['src']))
                                  {
                                  ?>
                                    <option><?php print $select_product_data_all[0]?></option>
                                  <?php

                                  }
                                  else
                                  {
                                  ?>
                                  <option>Choice any item</option>
                                <?php
                                  }
                                ?>
                                
                                <?php
                                  $select_item_table_item_option=mysql_query("SELECT * FROM item");
                                  while ($select_item_all_data_option=mysql_fetch_array($select_item_table_item_option))
                                   {
                                ?>
                                <option><?php print $select_item_all_data_option[1]?></option>
                                <?php
                                  }
                                ?>
                            </select>
                             <label>Catagory name:</label>
                             <select class="form-control" name="cat_name">
                             
              								<?php
                                if(isset($_POST['src']))
                                {

                              ?>
                                  <option><?php print $select_product_data_all[1]?></option>
                              <?php

                                }
                                else
                                {
                              ?>
                                  <option>Choice any Catagory</option>
                              <?php

                                }
                              ?>
                            
                             <?php
                                  $select_cat_table_cat_option=mysql_query("SELECT * FROM catagory");
                                  while ($select_cat_all_data_option=mysql_fetch_array($select_cat_table_cat_option))
                                   {
                              ?>
                            
                             	<option> <?php print $select_cat_all_data_option[1]?></option>
                              <?php
                               }

                              ?>

                            
                             </select>
                             <label>Product name:</label>
                             <input type="text" class="form-control" value="<?php print $select_product_data_all[2]?>" placeholder="Product name" name="pdt_name" ><br>
                             <label>Product Id:</label>
                             <input type="text" class="form-control" name="pdt_id" value="<?php print $select_product_data_all[3]?>" placeholder="Product id" >
                             <br>
                             <label>Product Quantity:</label>
                             <input type="text" class="form-control" name="Pdt_quantity" value="<?php print $select_product_data_all[4]?>" placeholder="Product Quantity" >
                             <br>
                             <label>Product price:</label>
                             <input type="text" class="form-control" name="Pdt_price" value="<?php print $select_product_data_all[5]?>" placeholder="Product price" >
                             <br>
                             <label>Product Detailes:</label>
                             <textarea rows="5" cols="50" class="form-control" name="detailes" placeholder="Detailes product"><?php print $select_product_data_all[6]?></textarea>
                              <br>
                              <label>Product information:</label>
                             <textarea rows="5" cols="50" class="form-control" name="info" placeholder=" product information"><?php print $select_product_data_all[7]?></textarea>
                              <br>
                              <input type="file" class="form-control" name="image[]"><br>
                              <input type="file" class="form-control" name="image[]"><br>
                              <input type="file" class="form-control" name="image[]"><br>
                              <input type="file" class="form-control" name="image[]"><br>

                         </div>
                         <div class="col-md-3">
                             <input type="submit" class="form-control btn-primary" name="src" value="Search">
                             
                         </div>
                         
                     </div>
	                 
	                 <div class="row">
	                   <div class="col-md-3">
	                     <input type="submit" class="form-control btn-primary" name="add" value="Add ">
	                   </div>
	                   <div class="col-md-3">
	                     <input type="submit" class="form-control btn-primary" name="edit" value="Edit ">
	                   </div>
	                   <div class="col-md-3">
	                     <input type="submit" class="form-control btn-primary" name="delete" value="Delete ">
	                   </div>
	                 <div class="col-md-3">
	                     <input type="submit" class="form-control btn-primary" name="view" value="View ">
	                   </div>
					</div>
                 </form>
	           </div>

             </div>
             <div class="col-md-4"></div>
           </div>
         </div>
       </div>
       <br><br>
       <div class="container">
         <div class="table-div">
           <div class="row">
             <div class="col-md-2"></div>
             <div class="col-md-8">
            
               <table>
                 <tr>
                   <th>Catagory id</th>
                   <th>Catagory Name</th>
                   <th>Item Name</th>
                 </tr>
                
                 <tr>
                   <td><?php print $select_all_data_cat[0];?></td>
                   <td><?php print $select_all_data_cat[1];?></td>
                   <td><?php print $select_all_data_cat[2];?></td>
                 </tr>
                
               </table>
               
             </div>
             <div class="col-md-2"></div>
           </div>
         </div>
       </div>

       <div class="row">
                              <?php 

                              if(isset($_POST['src']))
                              {



                                  for ($i=0; $i < 4; $i++) 
                                  { 

                                    $img_loc="$src_id"."($i)";
                              ?>
                              <div class="col-md-3">
                                <img src="images/product_image/<?php print $img_loc?>.jpg" alt="">
                              </div>
                              <?php
                                }
                               } 

                              ?>
                             </div>
</body>
</html>

