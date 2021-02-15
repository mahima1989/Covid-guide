
<?php include"ecomm/includes/header.php"; ?>

<style>
  /* signup */

#signup{
  background-color:#11698e;
  height: 120vh;
  padding-top: 80px;
}
form_main {
    width: 100%;
}
.form_main h4 {
    font-family: roboto;
    font-size: 20px;
    font-weight: 300;
    margin-bottom: 15px;
    margin-top: 20px;
    text-transform: uppercase;
}
.heading {
    border-bottom: 1px solid white;
    padding-bottom: 9px;
    position: relative;
    color: white;
    font-weight: bold;
}
.heading span {
    background: #fdb827 none repeat scroll 0 0;
    bottom: -2px;
    height: 3px;
    left: 0;
    position: absolute;
    width: 75px;
}
.form {
    border-radius: 7px;
    padding: 6px;
}
.txt[type="text"] {
    border: 1px solid #ccc;
    margin: 10px 0;
    padding: 10px 0 10px 5px;
    width: 100%;
}
.txt_3[type="text"] {
    margin: 10px 0 0;
    padding: 10px 0 10px 5px;
    width: 100%;
}
.txt2[type="submit"] {
    background: #242424 none repeat scroll 0 0;
    border: 1px solid #4f5c04;
    border-radius: 25px;
    color: #fff;
    font-size: 16px;
    font-style: normal;
    line-height: 35px;
    margin: 10px 0;
    padding: 0;
    text-transform: uppercase;
    width: 30%;
}
.txt2:hover {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    color: #5793ef;
    transition: all 0.5s ease 0s;
}

  </style>

  <?php

  if(isset($_POST['signup'])){
  $user_fname=$_POST['fname'];
  $user_lname=$_POST['lname'];
  $user_phone=$_POST['phone'];
  $user_email=$_POST['email'];
  $user_address=$_POST['add'];
  $user_password=$_POST['pass'];

  $query=
  "INSERT INTO users(user_fname, user_lname,user_phone,user_address,user_email,user_password,user_role)";
  $query.="VALUES('$user_fname','$user_lname','$user_phone','$user_address','$user_email','$user_password','User')";

  $result=mysqli_query($connection,$query);
  if(!$result){
  die("query failed" .mysqli_error($connection));
}

login($user_email,$user_password);

}

  ?>



<section id="signup">

    <div class=" container" >
  <div class="row ">
    <div class="col-md-8">
      <img src="images/doc.png">
    </div>
    <div class="col-md-4"style="margin-top:30px;">
    <div class="form_main">
                <h4 class="heading"><strong>Quick </strong> Contact <span></span></h4>
                <div class="form">
                <form action="" method="post" id="contactFrm" name="contactFrm">
                    <input  type="text" required="" placeholder="First Name" value="" name="fname" 
                    class="txt form-control">
                    
                    <input type="text" required="" placeholder="Last Name" value="" name="lname"
                     class="txt form-control">
                    <input type="email" required="" placeholder="Please enter your Email" value="" 
                    name="email" class="txt form-control">
                    <input type="text" required="" placeholder="Please enter your Phone No" value=""
                    name="phone" class="txt form-control">
                    <textarea placeholder="Address" name="add" type="text" class="txt_3 form-control"></textarea><br>
                   
                   <input type="password" required="" placeholder="Password" value="" name="pass" class="txt form-control"><br>
                     

                     <input type="submit" value="Sign Up" name="signup" class=" btn btn-warning form-control">
                </form>
            </div>
            </div>
            </div>
  </div>
</div>



</section>