
 
<?php include"ecomm/includes/header.php"; ?>

<?php

$data=file_get_contents('https://corona.lmao.ninja/v2/jhucsse');
$coronadata=json_decode($data);
      ?>



 <section id="statistics" class="container-fluid">
 
   
    <div class="table-responsive-sm">
     <table class=" table table-bordered table-striped text-center table-sm" id="tbval">
         <tr>
             <th>Country </th>
              
             
             <th>Confirmed </th>
            
             <th>Deaths </th>
              <th>Recovered </th>
              <!--  <th>Province </th> -->
   </tr>
     </table>
      
  </div>
   
   
   
     
 </section>

 <script >

 	function fetch(){

 jQuery.get("https://corona.lmao.ninja/v2/jhucsse",function(data){
            alert(data.length);
            console.log("heelo");



 });
 	}
 	


 </script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 



<?php include"ecomm/includes/footer.php"; ?>
     