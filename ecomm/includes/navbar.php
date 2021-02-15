<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Home</a>
   
        

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Shop</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link  active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            <?php

            $query="SELECT * FROM categories ";
            $result=mysqli_query($connection,$query);
            if(!$result){
              die("query failed".mysqli_error($connection));
            }
            while($row=mysqli_fetch_assoc($result)){
             $cat_id=$row['cat_id'];
             $cat_name=$row['cat_name'];

              ?>
               

              <li><a class="dropdown-item" href="view.php?cat_id=<?php echo $cat_id; ?>"><?php echo $cat_name; ?></a></li>
              <?php
            }

          
           ?>
            
           
            
          </ul>
        </li>
        <?php if(isLoggedIn()): ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../logout.php">Logout</a>
        </li>
      <?php endif; ?>
         <li class="nav-item">
          <a class="nav-link active" > <?php echo "Hello,".$_SESSION['user_fname']; ?></a>
        </li>
      </ul>
     
      <form action="search.php" method="post"class="d-flex" style="margin-top:20px; margin-bottom:15px; ">
        <input name="data" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <input class="btn btn-outline-light" name="search" type="submit" value="Search">
      </form>
<a href='orders.php'><i class="fas fa-shopping-cart fa-2x" style="margin-right:20px ;margin-left:20px;color: white;"></i></a>
     <a href='wishlist.php'> <i class="far fa-heart fa-2x"style="margin-right:30px; ;color: white;"></i></a>

    </div>
  </div>
</nav>