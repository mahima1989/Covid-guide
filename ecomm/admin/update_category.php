

<form action="" method="post">

	<div class="col-md-6">
		<form action="" method="post">

	  <div class="form-group">

	  	<?php

if(isset($_GET['edit'])){

	$cat_id=$_GET['edit'];
	$query= "SELECT * FROM categories WHERE cat_id=$cat_id ";
	 $result=mysqli_query($connection,$query);
     if(!$result){
     	die("query failed".mysqli_error($connection));
     }
     while($row=mysqli_fetch_assoc($result)){
     	$cat_name=$row['cat_name'];
	
?>	


         <label for="category">Update Category</label>
          <input type="text"  name="update_cat_name" value="<?php  echo $cat_name;?>">
      </div>
      <?php    
}
}

?>



<?php

if(isset($_POST['update'])){


$update_cat_name=$_POST['update_cat_name'];
$query="UPDATE categories SET cat_name='{$update_cat_name}' WHERE cat_id=$cat_id ";
$result=mysqli_query($connection,$query);
if(!$result){
die("query failed".mysqli_error($connection));
}
}

?>

      <br>
      <div class="form-group">
      <button class="btn btn-primary" type="submit" name="update">Update</button>
  </div>




</form>

