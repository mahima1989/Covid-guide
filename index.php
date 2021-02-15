<?php  include"includes/header.php"; ?>
 
  <body onload="fetch()">



    <style>


      body{
        overflow-x: hidden;
      }

    </style>


  
  <section id="sec1">
  
   <div class="">
       
        <div class="links">
          <a href="#statistics101">Statistics</a>
          <a href="#">Immunity & Exercise</a>
          <a href="form.php">SignUp</a>
          <a href="login.php">Login</a>
          <a href="#headlines101">News</a>
          <a class="main-button ta" href="ecomm/index.php" style="font-size:17px;">Shop</a>

        </div>
      </div>
    
   


    
      <main>
        <br><br><br>
          <div class="p2">
          
        <img height="300px" class="cov-img"src="images/mask.png" alt="" >
        

  <div class="content">
    <small><b>COVID-19</b></small>

    <header>
      <h1 style="color:white;font-weight:bold;font-family:verdana;">Save Yourself <br> From This  <br>Deadly Virus !</h1>
    </header>

    <p style="margin:10px 0px;">We help you get you updated , with <br> the latest news,updates and prevention cures. <br> We are on a mission to help people prevent this disease <br> and stay updated.</p>


  <button class="main-button" type="button" name="button">Learn More</button>

  </div>


      </div>
      </main>

    </section>
    
    

    <!-- section2 -->


    <div id="sec2" style="margin-bottom:0px;">
      <div class="ten">
          <h1>Get masks ,<br> sanitizers and <br>more at your door step !</h1>
          <p >You no longer have to take any risk <br> and step out for shopping. <br> Get masks,shields,sanitizers and much more 100% <br>sanitized  with proper hygiene and care.</p>
<a type="button" href="ecomm/index.php" class="main-button"name="button" style="background-color:#00bd56;">EXPLORE</a>


  <h1 id="m" style="margin-left:22px;"></h1>
  <h1 id="p"></h1>
  <h1 id="k"></h1>
  <h1 id="c"></h1>
      </div>
      
<img height="360px" style="position: relative;top:-200px;"src="images/covid.png" alt="">
</div>


<!--statsitics-->
<?php

$data=file_get_contents('https://api.apify.com/v2/key-value-stores/toDWvRj1JpTXiM8FF/records/LATEST?disableRedirect=true');
$coronadata=json_decode($data);
      ?>

<section id="statistics101">
 <div class="jumbotron jclass">
        
        <h1>
            Statistics
        </h1>
    </div>
   


<!--    Table -->
     
<section id="statistics" class="container-fluid">
  <img height="100px"src="https://i.pinimg.com/originals/f4/a2/2f/f4a22fb1b5cb15094af79e1e101c66d2.png">
  <small><b>INDIA</b></small>

  <div class="india row" style="padding: 40px 90px 110px ;">

<div class="col-md-4">
<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-header text-center">TOTAL ACTIVE</div>
  <div class="card-body">
    <h2 class="card-title text-center" id="a"></h2>
    
  </div>
</div>
</div>
<div class="col-md-4">
<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
  <div class="card-header text-center"> TOTAL RECOVERED</div>
  <div class="card-body">
    <h2 id="r"class="card-title text-center"></h2>
   
  </div>
</div>
</div>
<div class="col-md-4">
<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
  <div class="card-header text-center ">TOTAL DEATH</div>
  <div class="card-body">
    <h2 id="d"class="card-title text-center "></h2>
   
  </div>
</div>
</div>

<!-- <div class="col-md-3">
<div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
  <div class="card-header text-center ">TOTAL CASES </div>
  <div class="card-body">
    <h2 id="p" class="card-title text-center "></h2>
   
  </div>
</div>
</div>

 -->




 
   </div>

    <div class="table-responsive-sm">
     <table class=" table table-bordered table-striped text-center table-sm" id="tbval">
         <tr>
             <th>State</th>
              
             
             <th>Confirmed </th>
            
             <th>Deaths </th>
              <th>Recovered </th>
             
   </tr>
     </table>
      
  </div>
   
   
   
     
 </section>






 
 </section>
 
 
<!--    Table end -->


<?php
$url='https://newsapi.org/v2/top-headlines?q=covid&country=in&language=en&apiKey=f95ef75b80794222ba677a0413fa2650';
$response=file_get_contents($url);
$news=json_Decode($response); ?>
<section id="headlines101">
<div class="jumbotron jclass">
        
        <h1>
            Top Headlines
        </h1>
    </div>


   
 




        <div>
           <div class="row" >
           
           <?php
           $count=-1;
            foreach($news->articles as $new){
              $count++;
                 ?> 

<div class="col-lg-4" style="margin: 0;padding: 0;">
    <div class="card bg-dark text-white">
      <a href='new.php?count=<?php echo $count; ?>' style='color: white;'>
  <img  height="300px" class="card-img " src="<?php  echo $new->urlToImage ?>" alt="Card image">
  <div class="card-img-overlay">
    <h5 class="card-title"><?php echo $new->source->name ?></h5>
    <p class="card-text"><?php echo $new->title; ?></p>
    <p class="card-text"> <?php echo substr($new->publishedAt,0,10) ?></p>
  </div>
  </a>
</div>
</div>


            <?php    
            }
            ?>
            
          
            
            </div>
        </div>

    </section>    
   
    



 <script>
     function fetch(){
         
         
jQuery.get("https://api.apify.com/v2/key-value-stores/toDWvRj1JpTXiM8FF/records/LATEST?disableRedirect=true",function (data){
             
            document.getElementById('a').innerHTML=data['activeCases'];
            document.getElementById('r').innerHTML=data['recovered'];
            document.getElementById('d').innerHTML=data['deaths'];
            document.getElementById('p').innerHTML=data['totalCases'];
var tbval=document.getElementById('tbval');

             for(var i=1;i<=35;i++){
                 var x=tbval.insertRow();
                 
                 if((i-1)%2==0){
                 
                     
                      x.insertCell(0);
                 tbval.rows[i].cells[0].innerHTML=data['regionData'][i-1]['region'];
                 tbval.rows[i].cells[0].style.background='#3f52e3';
                 tbval.rows[i].cells[0].style.color='#fff';
                
     
                 
                  x.insertCell(1);
                 tbval.rows[i].cells[1].innerHTML=data['regionData'][i-1]['totalInfected'];
                 tbval.rows[i].cells[1].style.background='#3f52e3';
                 tbval.rows[i].cells[1].style.color='#fff';
                 
                  x.insertCell(2);
                 tbval.rows[i].cells[2].innerHTML=data['regionData'][i-1]['deceased'];
                 tbval.rows[i].cells[2].style.background='#3f52e3';
                 tbval.rows[i].cells[2].style.color='#fff';
                 
                  x.insertCell(3);
                 tbval.rows[i].cells[3].innerHTML=data['regionData'][i-1]['recovered'];
                 tbval.rows[i].cells[3].style.background='#3f52e3';
                 tbval.rows[i].cells[3].style.color='#fff';
                 
              
                 }
                 
                 else{

   
                      x.insertCell(0);
                 tbval.rows[i].cells[0].innerHTML=data['regionData'][i-1]['region'];
                 tbval.rows[i].cells[0].style.background='#e0ece4';
                 tbval.rows[i].cells[0].style.color='blue';
                
     
                 
                  x.insertCell(1);
                 tbval.rows[i].cells[1].innerHTML=data['regionData'][i-1]['totalInfected'];
                 tbval.rows[i].cells[1].style.background='#e0ece4';
                 tbval.rows[i].cells[1].style.color='blue';
                 
                  x.insertCell(2);
                 tbval.rows[i].cells[2].innerHTML=data['regionData'][i-1]['deceased'];
                 tbval.rows[i].cells[2].style.background='#e0ece4';
                 tbval.rows[i].cells[2].style.color='blue';
                 
                  x.insertCell(3);
                 tbval.rows[i].cells[3].innerHTML=data['regionData'][i-1]['recovered'];
                 tbval.rows[i].cells[3].style.background='#e0ece4';
                 tbval.rows[i].cells[3].style.color='blue';
                                   
               
     
     
                 }
                 
                
     
             }//for
             
             
             
         });
              
         
         
    
     }
    

      
      
      </script>
<br><br><br><br><br><br><br><br><br>
      <?php include"includes/footer.php"; ?>

 
 

 
 
