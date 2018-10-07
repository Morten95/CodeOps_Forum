<div class="container">

	<div class="postlist">
<hr>
		<h2>Search results in topic for <?php echo $data[0]; ?></h2>
<hr>
			<?php foreach ($data[1] as $topic) { ?>
				<br>
		<div class= "TopicSearch">
			<a href="/CodeOps_Forum/index.php?id=<?php echo $topic->id ?>" > <?php echo $topic->title;?></a>
			<br>
			<small> <?php echo $topic->body;?> </small>
			<br>
		</div>

			<?php }?>
			<hr>
				<h2>Search results in posts for <?php echo $data[0]; ?></h2>
				<hr>
					<?php foreach ($data[2] as $post) { ?>
							<div class= "PostSearch">
					<a href="/CodeOps_Forum/index.php?id=<?php echo $post->topicId ?>" > Go to Topic </a>	<br>
					<small> <?php echo $post->body;?> </small>
					<br><br>
							</div>
					<?php }?>
					<hr>

						<h2>Search results in comments for <?php echo $data[0]; ?></h2>
						<hr>
							<?php foreach ($data[3] as $comment) { ?>
								<div class= "CommentSearch">
							<small><?php echo 'Content: ' . $comment->body;?></small>
							<br><br>
								</div>
							<?php }?>
	</div>
</div>
