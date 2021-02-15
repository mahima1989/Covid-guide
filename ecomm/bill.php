<?php  include"includes/header.php"; ?>
<?php  include"includes/navbar.php"; ?>


<?php

if(isset($_POST['order'])){

$mode=$_POST['pay'];
header("Location: thankyou.php");

}
?>

<br><br><br>
<?php

$cost=0;
$query="SELECT * FROM user_orders ";
$result=mysqli_query($connection,$query);
    if(!$result){
        die("query failed".mysqli_error($connection));
    }
    if(mysqli_num_rows($result)<1){
$delivery=0;
    }else{
        $delivery=100;
    }

    while($row=mysqli_fetch_assoc($result)){
         $o_id=$row['id'];
        $prod_id=$row['pid'];
        $prod_name=$row['name'];
        $prod_img=$row['picture'];
        $prod_cat=$row['category'];
      
       $prod_quantity=$row['quant'];
        $prod_price=$row['price'];
        $total_price=$row['total_price'];
        $cost=$cost+$total_price;

    }
        ?>




<div class="container-fluid">

	<div class="row">

		<div class="col-md-8 ">

			<form action="" method="post">

				 <p class="text-center">Select Mode of Payment </p>
  <input type="radio" id="paytm" name="pay" value="paytm">
  <label for="paytm">Paytm</label><br>
  <input type="radio" id="cod" name="pay" value="cod">
  <label for="cod">Cash on Delivery </label><br><br><br><br><br><br>

 
<input type="submit" class="btn btn-secondary btn-lg boot-btn " name="order" value="PLACE ORDER ">


			</form>



		</div>
		<div class="col-md-4">


			 <div class="col-lg-4">
      <div class=" cardm card" style="width: 18rem; margin-left: 80px;" >
<div class="card-body">
<h5 class="card-title" style="  font-family: 'Roboto', sans-serif;">PRICE DETAILS</h5>

</div>
<ul class="list-group list-group-flush">

<li class="list-group-item">Bag Total <span style="margin-left: 120px;" class="right">
    <?php echo "Rs.". $cost; ?></span></li>
    <?php  $d1cost=($cost*10)/100;
    $d2cost=$cost-$d1cost; ?>
 <li class="list-group-item">Bag Discount<span  style="margin-left: 97px;"><?php echo "Rs.". $d1cost; ?></span></li>

<li class="list-group-item">Order Total<span style="margin-left: 111px;"><?php echo "Rs.". $d2cost; ?></span></li>
<li class="list-group-item">Delivery Charges<span style="margin-left: 73px;"><?php echo "Rs.". $delivery; ?></span></li>

</ul>
<div class="card-body">
<small style="font-weight:bold;">Total<span style="margin-left:163px; ">Rs.<?php echo  $cost=$d2cost+$delivery; ?></span></small> <br><br>


</div>
</div>



		</div>
	</div>

</div>