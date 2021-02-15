<?php

session_start();
include"ecomm/includes/db.php";


$_SESSION['user_id']=null;
$_SESSION['user_phone']=null;
$_SESSION['user_address']=null;
$_SESSION['user_role']=null;
$_SESSION['user_fname']=null;
$_SESSION['user_lname']=null;
$_SESSION['user_email']=null;
$_SESSION['user_password']=null;

header("Location:index.php");

?>