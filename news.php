<!--f95ef75b80794222ba677a0413fa2650-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<style>
    .imgs{
        
        width: calc(100%-20px);
        height: 180px;
        margin: 10px;
    }
    .newsGrid{
        
        margin:10px;
        border: 1px solid lightgrey;
        padding: 10px;
    }
    .contaner-fluid{
        width:80%;
        padding: 10px 150px;
    }
   
    .con{
         font-size:14px;
        position: relative;
        left:180px;
            
    }
    
    
    .news h2{
        font-size:17px;
    }
    .news p{
        font-size:13px;
    }
    .jumbotron{
        background-color: #3f52e3;
        color: white;
        text-align:center;
    }
    
    </style>
 
 
<!--
  <pre>
  
   <?php
    
$url='http://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=f95ef75b80794222ba677a0413fa2650';
$response=file_get_contents($url);
$news=json_Decode($response);
print_r($news);

    ?>
    </pre>
-->
    
    <div class="jumbotron">
        
        <h1>
            Top Headlines
        </h1>
    </div>
        <div class="container-fluid news">
           
           <?php
            foreach($news->articles as $new){
                 ?> 
                 
                 <div class="row newsGrid">
                    <div class="col-md-2">
                      <img  class="imgs rounded" src="<?php  echo $new->urlToImage ?> " alt="news thubmnail ">
                       
                        
                    </div>
                    <div class="col-md-10">
                      <div class="con">
                          
                          <h2>Title :<?php echo substr($new->title,0,100) ?></h2>
                       <p>Description : <?php echo substr($new->description,0,130)  ?></p>
                       <p>Content : <?php echo substr($new->content ,0,130) ?></p>
                       <h6>Author: <?php echo $new->author ?></h6>
                       <h6>Published: <?php echo $new->publishedAt ?></h6>
                      </div>
                       
                        
                    </div>
                     
                 </div>
            <?php    
            }
            ?>
            
          
            
            
        </div>
        
        
   
    
   
   
   
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>