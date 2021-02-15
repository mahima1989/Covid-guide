<?php  include"includes/header.php"; ?>
<?php  include"includes/navbar.php"; ?>
<br><br>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8"> 
<table class="table table-bordered table-hover">


     <thead>
                                <tr>

                                    <td>Oid</td>
                                    <td>Pid</td>
                                    <td>Name</td>
                                    <td>Image</td>
                                    <td>Category</td>
                                    <td>Quantity</td>
                                    <td>Per price</td>
                                    <td>Total price</td>
                                    <td>Delete</td>
                                    
                              
                                </tr>
                            </thead>
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
        ?>


<tbody>
    
    <tr>
                                   <td><?php echo $o_id; ?></td>
                                    <td><?php echo $prod_id; ?></td>
                                    <td><?php echo $prod_name; ?></td>
                                    <td><img  height="50px" width="50px"src="images/<?php echo $prod_img; ?>"></td>
                                    <td><?php echo $prod_cat; ?></td>
                                    <td><?php echo $prod_quantity; ?></td>
                                    <td><?php echo $prod_price; ?></td>
                                    <td><?php echo $total_price; ?></td>
        <td><a href="orders.php?del_id=<?php echo $o_id; ?>" class="btn btn-danger">Delete</a></td>
                                    
                              
                                </tr>


</tbody>
<?php
    }


?>

</table>
</div>


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
<small style="font-weight:bold;">Total<span style="margin-left:163px; ">Rs.<?php echo  $cost=$d2cost+$delivery; ?></span></small> <br>

<a  href= 'bill.php' class="btn btn-secondary btn-lg boot-btn">CHECKOUT</a>

</div>
</div>

    </div>


</div>
</div>



<?php

if(isset($_GET['del_id'])){
    $delete=$_GET['del_id'];

    $query="SELECT * FROM user_orders WHERE id=$delete ";
    $result=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($result)){
        $pid=$row['pid'];
        $pq=$row['quant'];
    
    
     $query=" UPDATE products SET prod_quant=prod_quant+$pq  WHERE prod_id=$pid";
    $result=mysqli_query($connection,$query);
    if(!$result){
        die("query failed".mysqli_error($connection));
    }

}
    $query=" DELETE FROM user_orders WHERE id=$delete ";
    $result=mysqli_query($connection,$query);
    if(!$result){
        die("query failed".mysqli_error($connection));
    }
    

    header("Location:orders.php");

}
?>
<?php  include"includes/footer.php"; ?>