<div class="container">
  

  <div class="postlist">
  	<h1><?php echo $data[0]->title ?>	</h1>
  	<p><?php echo $data[0]->body ?></p>
  </div>

    



<div>
	
	
		<?php array_map(function($v1, $v2){
				echo $v1->body . "<br>";
				echo $v2->username . "<br><br>";
		}, $data[1], $data[2] /* , Add more arrays if needed manually */); ?>
		
</div>

</div>
