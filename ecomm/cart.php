<?php

include"includes/functions.php";
include"includes/db.php";

if(isset($_POST['add'])){

$user_quantity= $_POST['quantity'];
 $product_id= $_POST['prod_id'];


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

	$total_price=$user_quantity*$prod_price;

	$query="INSERT into user_orders(uid,pid,name,quant,price,total_price,category,picture)";
	$query.="VALUES(21,$prod_id,'$prod_name',$user_quantity,$prod_price,$total_price,'$prod_cat_name','$prod_img') ";
	$result=mysqli_query($connection,$query);
	if(!$result){
		die("query failed".mysqli_error($connection));
	}

	$query="UPDATE products SET prod_quant=prod_quant-$user_quantity WHERE prod_id=$prod_id ";
	$result=mysqli_query($connection,$query);
	if(!$result){
		die("query failed".mysqli_error($connection));
	}


	header("Location:index.php");


	
}
?>
<?php

if(isset($_POST['view_add'])){

$user_quantity= $_POST['quantity'];
 $product_id= $_POST['prod_id'];


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

	$total_price=$user_quantity*$prod_price;

	$query="INSERT into user_orders(uid,pid,name,quant,price,total_price,category,picture)";
	$query.="VALUES(21,$prod_id,'$prod_name',$user_quantity,$prod_price,$total_price,'$prod_cat_name','$prod_img') ";
	$result=mysqli_query($connection,$query);
	if(!$result){
		die("query failed".mysqli_error($connection));
	}

	$query="UPDATE products SET prod_quant=prod_quant-$user_quantity WHERE prod_id=$prod_id ";
	$result=mysqli_query($connection,$query);
	if(!$result){
		die("query failed".mysqli_error($connection));
	}


	header("Location:view.php?cat_id=$prod_cat_id");

	
	
}
?>

<?php

if(isset($_POST['search_add'])){

$user_quantity= $_POST['quantity'];
 $product_id= $_POST['prod_id'];
  // $data= $_POST['data'];


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

	$total_price=$user_quantity*$prod_price;

	$query="INSERT into user_orders(uid,pid,name,quant,price,total_price,category,picture)";
	$query.="VALUES(21,$prod_id,'$prod_name',$user_quantity,$prod_price,$total_price,'$prod_cat_name','$prod_img') ";
	$result=mysqli_query($connection,$query);
	if(!$result){
		die("query failed".mysqli_error($connection));
	}

	$query="UPDATE products SET prod_quant=prod_quant-$user_quantity WHERE prod_id=$prod_id ";
	$result=mysqli_query($connection,$query);
	if(!$result){
		die("query failed".mysqli_error($connection));
	}


	header("Location:orders.php");

	
	
}
?>


