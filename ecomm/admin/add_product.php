
<?php  include"../includes/header.php"; ?>
<?php // include"../includes/navbar.php"; ?>


<?php 

if(!ifIsAdmin()){

header("Location: ../index.php");
}


?>
<ul>

  <li type='none'><a href="add_product.php">ADD PRODUCT</a>
  <li type='none'><a href="orders.php">VIEW ORDERS</a>
    <li type='none'><a href="../../logout.php">LOGOUT</a>
</ul>

<?php

if(isset($_GET['delete'])){

	$cat_id=$_GET['delete'];
	$query="DELETE FROM categories WHERE cat_id=$cat_id ";
	 $result=mysqli_query($connection,$query);
     if(!$result){
     	die("query failed".mysqli_error($connection));
     }
    
}


?>


<?php

if(isset($_POST['submit'])){

	$prod_name=$_POST['prod_name'];
$prod_cat_id=$_POST['category'];
	$query="SELECT * FROM categories WHERE cat_id=$prod_cat_id ";
  $result2=mysqli_query($connection,$query);
     if(!$result2){
      die("query failed".mysqli_error($connection));
     }
     while($row=mysqli_fetch_assoc($result2)){
      $prod_cat_name=$row['cat_name'];
     }

	$prod_quant=$_POST['prod_quant'];
	$prod_price=$_POST['prod_price'];

	 $prod_image        = $_FILES['prod_image']['name'];
  $prod_image_temp   = $_FILES['prod_image']['tmp_name'];
  move_uploaded_file($prod_image_temp , "../images/$prod_image" );


     $query="INSERT INTO products(prod_name,prod_cat_id,prod_cat_name,prod_quant,prod_img,prod_price)
     VALUES('$prod_name',$prod_cat_id,'$prod_cat_name',$prod_quant,'$prod_image',$prod_price) ";
     $result=mysqli_query($connection,$query);
     if(!$result){
     	die("query failed".mysqli_error($connection));
     }
    

}


?>

<br><br>
<section style="padding:10px 20px;">
<div class="row">

	<div class="col-md-6">

<form action="" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col">
   <div class="form-group">
         <label for="prod_name">Product Name</label>
          <input type="text" class="" name="prod_name">
      </div>
  </div>
  <br><br>
<div class="col">
	 <label >Product Category</label>
      <select name="category">

      	<?php

      	$query=" SELECT * FROM categories ";
	 $result=mysqli_query($connection,$query);
     if(!$result){
     	die("query failed".mysqli_error($connection));
     }
     while($row=mysqli_fetch_assoc($result)){
     	$cat_name=$row['cat_name'];
      $cat_id=$row['cat_id'];
     	echo "<option value='$cat_id'>$cat_name</option> ";
     	    }
      	?>
      	

      </select>
  </div>

<div class="row">
	<div class="col">
       <div class="form-group">
         <label for="prod_price">Product Price</label>
          <input type="text" name="prod_price">
      </div>
</div>
<div class="col">
        <div class="form-group">
         <label for="prod_quant">Product Quantity</label>
         <input type="text" name="prod_quant">
      </div>
  </div>
</div>
      
      <br><br>

      
        <div class="form-group">
         <label for="prod_image"> Image</label>
          <input type="file"  name="prod_image">
      </div>

<br><br>
<button class="btn btn-primary" type="submit" name="submit">SUBMIT</button>
</div>
       
</form>
	
	</div>
	<?php add_category(); ?>

	<div class="col-md-6">
		<form action="" method="post">

	  <div class="form-group">
         <label for="category">Add Category</label>
          <input type="text"  name="cat_name">
      </div>
      <br>
      <div class="form-group">
      <button class="btn btn-primary" type="submit" name="add_category"> Add </button>
  </div>
<br>


                        <div class="col-xs-6">
              <table class="table table-bordered table-hover">
                               <thead>
                                   <tr>
                                     <!--   <td>Id</td> -->
                                       <td>Category Title</td>
                                       <td>Delete</td>
                                       <td>Edit</td>
                                   </tr>
                               </thead>
                               <tbody>
                               	
                               		<?php view_categories();?>
                               		<!-- <td>DEL</td>
                               		<td>EDIT</td> -->
                            
                               	
                                  
                
                               </tbody>
                           </table>
                            
                        </div>
                        <br><br>
                        <?php

if(isset($_GET['edit'])){

	$cat_id=$_GET['edit'];
	include "update_category.php";
	
    
}

?>



 

		</form>
	</div>
</div>

</section>

<?php  include"../includes/footer.php"; ?>