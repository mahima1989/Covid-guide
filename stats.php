<?php

$data=file_get_contents('https://corona.lmao.ninja/v2/jhucsse');
$coronadata=json_decode($data);?>

<!--
<pre>
<?php
print_r($coronadata);?>
</pre>
-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
</head>


<body onload="fetch()">

<style>
    th{
        color: #21bf73;
        background-color: white;
            
    }
    td{
        font-family:inherit;
        font-weight: 600;
        font-size: 18px;
       
    }

    #statistics{
        padding: 50px 70px;
    }
    
    </style>
 <section id="statistics" class="container-fluid">
    <div class="table-responsive">
     <table class=" table table-bordered table-striped text-center" id="tbval">
         <tr>
             <th>Country </th>
              
             
             <th>Confirmed </th>
            
             <th>Deaths </th>
              <th>Recovered </th>
               <th>Province </th>
   </tr>
     </table>
      
  </div>
   
   
   
     
 </section>
 
 
 
 <script>

    
     function fetch(){
         
         
         jQuery.get("https://corona.lmao.ninja/v2/jhucsse",
               function (data){
             
//             console.log(data.length);
             var tbval=document.getElementById('tbval');
             for(var i=1;i<(data.length)-500;i++){
                 var x=tbval.insertRow();
                 
                 if((i-1)%2==0){
                     
                      x.insertCell(0);
                 tbval.rows[i].cells[0].innerHTML=data[i-1]['country'];
                 tbval.rows[i].cells[0].style.background='#3f52e3';
                 tbval.rows[i].cells[0].style.color='#fff';
                
     
                 
                  x.insertCell(1);
                 tbval.rows[i].cells[1].innerHTML=data[i-1]['stats']['confirmed'];
                 tbval.rows[i].cells[1].style.background='#3f52e3';
                 tbval.rows[i].cells[1].style.color='#fff';
                 
                  x.insertCell(2);
                 tbval.rows[i].cells[2].innerHTML=data[i-1]['stats']['deaths'];
                 tbval.rows[i].cells[2].style.background='#3f52e3';
                 tbval.rows[i].cells[2].style.color='#fff';
                 
                  x.insertCell(3);
                 tbval.rows[i].cells[3].innerHTML=data[i-1]['stats']['recovered'];
                 tbval.rows[i].cells[3].style.background='#3f52e3';
                 tbval.rows[i].cells[3].style.color='#fff';
                 
                 
                  
                  x.insertCell(4);
                 tbval.rows[i].cells[4].innerHTML=data[i-1]['province'];
                 tbval.rows[i].cells[4].style.background='#3f52e3';
                 tbval.rows[i].cells[4].style.color='#fff';
     
     
     
                 }
                 
                 else{
                      x.insertCell(0);
                 tbval.rows[i].cells[0].innerHTML=data[i-1]['country'];
                 tbval.rows[i].cells[0].style.background='#e0ece4';
                 tbval.rows[i].cells[0].style.color='blue';
                
     
                 
                  x.insertCell(1);
                 tbval.rows[i].cells[1].innerHTML=data[i-1]['stats']['confirmed'];
                 tbval.rows[i].cells[1].style.background='#e0ece4';
                 tbval.rows[i].cells[1].style.color='blue';
                 
                  x.insertCell(2);
                 tbval.rows[i].cells[2].innerHTML=data[i-1]['stats']['deaths'];
                 tbval.rows[i].cells[2].style.background='#e0ece4';
                 tbval.rows[i].cells[2].style.color='blue';
                 
                  x.insertCell(3);
                 tbval.rows[i].cells[3].innerHTML=data[i-1]['stats']['recovered'];
                 tbval.rows[i].cells[3].style.background='#e0ece4';
                 tbval.rows[i].cells[3].style.color='blue';
                 
                 
                  
                  x.insertCell(4);
                 tbval.rows[i].cells[4].innerHTML=data[i-1]['province'];
                 tbval.rows[i].cells[4].style.background='#e0ece4';
                 tbval.rows[i].cells[4].style.color='blue';
     
     
     
                 }
                 
                
     
             }
             
             
             
         }
              );
         
         
    
     }
    
    </script>
  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   
</body>
</html>