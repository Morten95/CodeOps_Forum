<div class="container">

  <ul class="nav justify-content-center">
    <?php foreach($data[0] as $category): ?>
    <li class="nav-item">
      <a class="nav-link" href=<?php echo $category->name;?>> <?php echo $category->name; ?></a>
    </li>
    <?php endforeach; ?>
  </ul>



This is the body of the page


	<div id="post" class="postlist"> 
		<h1>Recent Topics</h1>
		<hr>
	<?php foreach($data[1] as $topic): ?>
		<hr>
		    <h2><a href="/CodeOps_Forum/index.php?id=<?php echo $topic->id ?>"><?php echo $topic->title?></a></h2>
		    <p  id="topicBody"><?php echo $topic->body ?></p>
		<hr>
	<?php endforeach; ?>

	</div>

</div>
