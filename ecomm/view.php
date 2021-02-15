<?php include"includes/header.php"; ?>
<?php include"includes/navbar.php"; ?>



<section id="shop">


<div class="container">
  <div class="row">

    <?php
    if(isset($_GET['cat_id'])){
$cat_id=$_GET['cat_id'];
    $query="SELECT * FROM  products  WHERE prod_cat_id=$cat_id ";
    $result=mysqli_query($connection,$query);
     if(!$result){
      die("query failed".mysqli_error($connection));
     }
     while($row=mysqli_fetch_assoc($result)){

$prod_id=$row['prod_id'];
$prod_name=$row['prod_name'];
 $prod_img=$row['prod_img'];
  $prod_price=$row['prod_price'];
  $prod_quant=$row['prod_quant'];
    
    ?>
    <div class="col-md-3">
     

      <div class="card" style="width: 17rem; margin:35px 4px ;padding:20px;">
  <img height="230px" src="images/<?php  echo $prod_img;?>" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title"><?php  echo $prod_name;?></h5>
    <p class="card-text">Price : <?php  echo $prod_price;?></p>


<!--  quanity -->
<form  action="cart.php"  method="post">

<input type="hidden" name="prod_id" value="<?php echo $prod_id;  ?>">
  <select name="quantity">
    <?php

    for($i=1;$i<=$prod_quant;$i++){
      echo "<option value='$i'>$i</option>";
    }

     ?>

  </select>
   

  <br>

<input  type="submit"name="view_add" class="btn btn-success" value="ADD TO CART" >

<a href="wishlist.php?p_id=<?php echo $prod_id;?>">
  <i  style="margin-top: 20px;margin-left:30px;color: #ff847c;"class="fas fa-heart fa-2x"></i></a>
   
  </form>  
  </div>
</div>

    </div>


    <?php
     }}
     else{

      echo " <br><h1 class='text-center'>No items available :( </h1>";
     }

?>
 <hr>
   
  </div>

</div>
</section>




<?php include"includes/footer.php"; ?>
