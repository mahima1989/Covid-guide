<?php


//ADD CATEGORY

function add_category(){
	global $connection;

	if(isset($_POST['add_category'])){

$cat_name=ucfirst($_POST['cat_name']);
$query="INSERT INTO categories(cat_name)VALUES('$cat_name') ";
$result=mysqli_query($connection,$query);
     if(!$result){
     	die("query failed".mysqli_error($connection));
     }


	}
}

//VIEW CATEGORIES
function view_categories(){

	global $connection;
	$query=" SELECT * FROM categories ";
	 $result=mysqli_query($connection,$query);
     if(!$result){
     	die("query failed".mysqli_error($connection));
     }
     while($row=mysqli_fetch_assoc($result)){
          $cat_id=$row['cat_id'];
     	$cat_name=$row['cat_name'];
     	echo"<tr>";
     	echo "<td>$cat_name</td>";
     	echo "<td><a href='add_product.php?delete=$cat_id'>Delete</a></td>";
     	echo "<td><a href='add_product.php?edit=$cat_id'>Edit</a></td>";
     	echo "</tr>";
     }
}


function login($email='',$password=''){
     global $connection;

     $query="SELECT * FROM users WHERE user_email='{$email}' ";
  $result=mysqli_query($connection,$query);
  if(!$result){
    die("query failed".mysqli_error($connection));
  }
  while($row=mysqli_fetch_assoc($result)){


    $db_password=$row['user_password'];
    $db_id=$row['user_id'];
    $db_fname=$row['user_fname'];
    $db_lname=$row['user_lname'];
    $db_phone=$row['user_phone'];
    $db_address=$row['user_address'];
    $db_email=$row['user_email'];
    $db_role=$row['user_role'];




  }
  


  if($password==$db_password){


     $_SESSION['user_id']=$db_id;
     $_SESSION['user_phone']=$db_phone;
     $_SESSION['user_address']=$db_address;
     $_SESSION['user_role']=$db_role;
     $_SESSION['user_fname']=$db_fname;
     $_SESSION['user_lname']=$db_lname;
     $_SESSION['user_email']=$db_email;
     $_SESSION['user_password']=$db_password;

     if($db_role=='Admin'){
       header("Location:/COVID/ecomm/admin/add_product.php");
     }else{
       header("Location:/COVID/ecomm/index.php");
     }

  
   
  }else{
     header("Location:login.php"); 
  
  }



}



function isLoggedIn(){

if(isset($_SESSION['user_role'])){

return true;
}

return false;

}


function ifIsAdmin(){
  if($_SESSION['user_role']=='Admin'){
    return true;
  }

  return false;
}


?>