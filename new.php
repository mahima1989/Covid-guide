<?php  include"includes/header.php"; ?>

<?php
$url='https://newsapi.org/v2/top-headlines?q=covid&country=in&language=en&apiKey=f95ef75b80794222ba677a0413fa2650';
$response=file_get_contents($url);
$news=json_Decode($response); ?>

 <?php

 if(isset($_GET['count'])){

$dcount=$_GET['count'];
$count=0;
 foreach($news->articles as $new){
     $count++;
     if($count>$dcount){
     	break;
     }
}


}
           
                 ?> 





<div class="card mb-3" style="padding: 100px;">
  <img class="card-img-top" height="500px"src="<?php echo $new->urlToImage ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $new->title; ?></h5>
    

    	<?php if($new->content==null):?>
    		

    		<p><a href='<?php echo $new->url; ?>'><?php echo $new->description; ?></a></p>
    		<?php else:?>
    			<p class="card-text"><?php echo $new->description ; ?><br>

    	<a href='<?php echo $new->url; ?>'><?php echo $new->content; ?></a>
    <?php endif; ?>

    </p>
    <p class="card-text"><small class="text-muted"><?php echo $new->source->name ?></small><br><small class="text-muted"><?php echo $new->publishedAt ?></small></p>
  </div>
</div>


<br><br>


      <?php include"includes/footer.php"; ?>