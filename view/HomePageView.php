<div class="container">
  
  <?php foreach($data[0] as $category): ?>

  <div class="row">
    <div class="col-sm">
      <?php echo $category->name; ?>
    </div>
  </div>

  <?php endforeach; ?>
    




This is the body of the page


	<div id="post" class="postlist"> 
		<h1>Recent Topics</h1>
	<?php foreach ($data[1] as $topic) : ?>
		<div class="column">
		    <h2><a href="/CodeOps_Forum/index.php?id=<?php echo $topic->id ?>"><?php echo $topic->title?></a></h2>
		    <p><?php echo substr($topic->body, 0, 3) ?></p>
		</div>
	<?php endforeach; ?>

	</div>

</div>
