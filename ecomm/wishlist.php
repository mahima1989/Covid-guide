<?php  include"includes/header.php"; ?>
<?php  include"includes/navbar.php"; ?>
<br><br>
<?php $cost=0; ?>
  <h1 class="text-center" style=" font-size:25px;">My Shopping Bag</h1>

<?php

if(isset($_GET['pid'])){

   
 $product_id= $_GET['pid'];


  $query="SELECT * FROM products WHERE prod_id=$product_id ";
  $result=mysqli_query($connection,$query);
  if(!$result){
    die("query failed".mysqli_error($connection));
  }

while($row=mysqli_fetch_assoc($result)){
$prod_id=$row['prod_id'];
$prod_name=$row['prod_name'];
$prod_img=$row['prod_img'];
$prod_price=$row['prod_price'];
$prod_cat_name=$row['prod_cat_name'];



  }

  // $total_price=$user_quantity*$prod_price;

  $query="INSERT into users_wishlist(uid,pid,name,price,category,picture)";
  $query.="VALUES(21,$prod_id,'$prod_name',$prod_price,'$prod_cat_name','$prod_img') ";
  $result=mysqli_query($connection,$query);
  if(!$result){
    die("query failed".mysqli_error($connection));
  }

  header("Location:index.php");
  
}
?>

<?php

if(isset($_GET['p_id'])){

   
 $product_id= $_GET['p_id'];


  $query="SELECT * FROM products WHERE prod_id=$product_id ";
  $result=mysqli_query($connection,$query);
  if(!$result){
    die("query failed".mysqli_error($connection));
  }

while($row=mysqli_fetch_assoc($result)){
$prod_id=$row['prod_id'];
$prod_name=$row['prod_name'];
$prod_img=$row['prod_img'];
$prod_price=$row['prod_price'];
$prod_cat_name=$row['prod_cat_name'];
$prod_cat_id=$row['prod_cat_id'];



  }

  // $total_price=$user_quantity*$prod_price;

  $query="INSERT into users_wishlist(uid,pid,name,price,category,picture)";
  $query.="VALUES(21,$prod_id,'$prod_name',$prod_price,'$prod_cat_name','$prod_img') ";
  $result=mysqli_query($connection,$query);
  if(!$result){
    die("query failed".mysqli_error($connection));
  }

  header("Location:view.php?cat_id=$prod_cat_id");
  
}


?>


<?php

if(isset($_GET['search_id'])){

   
 $product_id= $_GET['search_id'];


  $query="SELECT * FROM products WHERE prod_id=$product_id ";
  $result=mysqli_query($connection,$query);
  if(!$result){
    die("query failed".mysqli_error($connection));
  }

while($row=mysqli_fetch_assoc($result)){
$prod_id=$row['prod_id'];
$prod_name=$row['prod_name'];
$prod_img=$row['prod_img'];
$prod_price=$row['prod_price'];
$prod_cat_name=$row['prod_cat_name'];
$prod_cat_id=$row['prod_cat_id'];



  }

  // $total_price=$user_quantity*$prod_price;

  $query="INSERT into users_wishlist(uid,pid,name,price,category,picture)";
  $query.="VALUES(21,$prod_id,'$prod_name',$prod_price,'$prod_cat_name','$prod_img') ";
  $result=mysqli_query($connection,$query);
  if(!$result){
    die("query failed".mysqli_error($connection));
  }

  header("Location:wishlist.php");
  
}


?>


<?php

  $query="SELECT * FROM  users_wishlist";

    $result=mysqli_query($connection,$query);
     if(!$result){
      die("query failed".mysqli_error($connection));
     }
     if(mysqli_num_rows($result)>=1){
     while($row=mysqli_fetch_assoc($result)){

$prod_id=$row['pid'];
$prod_name=$row['name'];
$prod_img=$row['picture'];
$prod_price=$row['price'];
// $prod_quant=$row['prod_quant'];
$prod_cat=$row['category'];
$cost=$cost+$prod_price;
  
?>


<div class="row cardcon">
    <div class="col-lg-8">
    
<div class=" cardgirlout row">
<div class="col-lg-4"><br>
<img  height="170px" class=""src="images/<?php echo $prod_img; ?>" alt="">
</div>
<div class="col-lg-8">
<h1 style="font-family: 'Ubuntu', sans-serif;font-size:20px; margin-top: 30px;"><?php echo $prod_name; ?></h1>
<small style="font-weight:400; "><?php echo $prod_cat ?></small><br><br>
<p> Price : <?php echo $prod_price ?></p>
<hr>
<a href ="wishlist.php?delete=<?php echo $prod_id; ?>" type="button" class="btn boot-btn"style="color:white; margin-bottom:40px; margin-right:30px;">REMOVE</a>
<a  href="wishlist.php?cart=<?php echo $prod_id; ?>"class="btn  btn-outline-danger">MOVE TO CART</a>

</div>

</div>

    </div>
   

</div>

 <?php 
  }}
  else{
    echo"<br><br><h1 class='text-center'>No items in wishlist :(</h1>";

  }?>
 

 <?php


if(isset($_GET['delete'])){
    $delete=$_GET['delete'];
    
    $query=" DELETE FROM users_wishlist WHERE pid=$delete ";
    $result=mysqli_query($connection,$query);
    if(!$result){
        die("query failed".mysqli_error($connection));
    }

    header("Location:wishlist.php");

}

if(isset($_GET['cart'])){

  $cart=$_GET['cart'];
  $query="SELECT * FROM products WHERE prod_id=$cart ";
  $result=mysqli_query($connection,$query);
  if(!$result){
    die("query failed".mysqli_error($connection));
  }

  while($row=mysqli_fetch_assoc($result)){
$prod_id=$row['prod_id'];
$prod_name=$row['prod_name'];
$prod_img=$row['prod_img'];
$prod_price=$row['prod_price'];
$prod_cat_name=$row['prod_cat_name'];

  }

  $query="INSERT into user_orders(uid,pid,name,quant,price,total_price,category,picture)";
  $query.="VALUES(21,$prod_id,'$prod_name',1,$prod_price,$prod_price,'$prod_cat_name','$prod_img') ";
  $result=mysqli_query($connection,$query);
  if(!$result){
    die("query failed".mysqli_error($connection));
  }

  $query="UPDATE products SET prod_quant=prod_quant-1 WHERE prod_id=$prod_id ";
  $result=mysqli_query($connection,$query);
  if(!$result){
    die("query failed".mysqli_error($connection));
  }


   $query=" DELETE FROM users_wishlist WHERE pid=$cart ";
    $result=mysqli_query($connection,$query);
    if(!$result){
        die("query failed".mysqli_error($connection));
    }



  header("Location:wishlist.php");




}


 ?>

   
    <?php  include"includes/footer.php"; ?>