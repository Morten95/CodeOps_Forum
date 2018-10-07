<div class="container">


	<div class="postlist">
		<h1><?php echo $data[0]->title ?>	</h1>
		<hr>
		<div class="threaduser">
			<p><?php echo "User: " . $data[1]->username ?></p>
		</div>
		<p><?php echo $data[0]->body ?></p>
	</div>


	<?php array_map(function($v1, $v2, $postIndex) use ($data) {  ?>
	<div id="post" class="postlist">
		<div class="userBox">
			<p><?php echo "User: " . $v2->username; echo "<br>";?> </p>
			<p><?php echo "Admin: ";  if($v2->admin) { echo "Yes";} else { echo "No";} ?> </p>

			<form method="POST">

			</form>
			<div>
				<?php if($data[7] && $data[7]->admin) { ?>
					<form method="post"  action="index.php">

		    			<input type="hidden" name="topicId" value=<?php echo $_GET['id']?>/>
		    			<input type="hidden" name="postId" value=<?php echo $v1->id; ?>/>
						<input type="hidden" name="redirect" value=<?php echo $_SERVER['REQUEST_URI'];?>/>
							<button type="submit" class="btn btn-danger del" name="deletePost" data-id=""><i class="fa fa-trash"></i></button>

					</form>

					<button type="button" class="btn btn-primary rep" data-id="<?php echo $postIndex; ?>"><i class="fa fa-reply"></i>

					</button>
					<?php } else {?>
						<button style="margin-left:43%" type="button" class="btn btn-primary rep" data-id="<?php echo $postIndex; ?>"><i class="fa fa-reply"></i>
						</button>
				<?php } ?>
					<!--<button type="button" class="btn btn-primary rep" data-id="">Reply</button> -->
			</div>



		</div>
		<p><?php echo $v1->body; ?> </p>
			<?php if($data[5]) { ?>
	    		<div class="comment_body" style="display: block";>    <!--- FOR EACH POST I PRINT THE COMMENT & USERNAME ! -->
	    			<?php foreach ($data[5] as $com) { ?>
	    				<?php if ($v1->id == $com->postID) {  ?>
	    					<hr id="commentLine" >

	    					<!-- Admin DELETE comment --->

	    					<?php if($data[7] && $data[7]->admin){ ?>
								<form method="post"  action="index.php">

					    			<input type="hidden" name="topicId" value=<?php echo $_GET['id']?>/>
					    			<input type="hidden" name="commentId" value=<?php echo $com->id; ?>/>
	    							<input type="hidden" name="redirect" value=<?php echo $_SERVER['REQUEST_URI'];?>/>
		   							<button type="submit" class="btn btn-danger delCom" name="deleteComment" data-id=""><i class="fa fa-trash"></i></button>

								</form>

	    					<?php }?>

	    					<?php foreach ($data[6] as $user) {  // Inne i user-->
	    						if ($com->userID == $user->id) { ?>
									<span>
	    								<small>
	    									<?php echo $user->username . ": "; break; ?>

	    						<?php }?>
	    					<?php } ?>
	    								<?php echo $com->body . "<br>"; ?>


	    								</small>


	    							</span>

	    				<?php } ?>
    				<?php } ?>
    			</div>
			<?php } ?>

		<?php if ($data[4]) {  ?>
		<form class="comment_reply" data-id="<?php echo $postIndex; ?>" method="post" action="index.php">
			<textarea class="form-control" rows="2" name="post_rep" ></textarea>
			<input type="hidden" class="hidden" name="test" class="post_id" value=<?php echo $v1->id?>/>
			<button type="submit" name="sub_comment" class="btn btn-primary" class="post_rep_sub">Submit</button>
			<input type="hidden" name="redirect123" value=<?php echo $_SERVER['REQUEST_URI'];?>/>
		</form>
		<div id="comment" class="comment_reply">
		</div>

		<?php } ?>

	</div>
	<?php }, $data[2], $data[3], array_keys($data[2])) ?>



	<div id="post" class="postlist">
	<?php if ($data[4]) { ?>
		<br>
		<form method="post"  action="index.php">
			<textarea class="area" name="postarea"></textarea>
			<input type="hidden" name="topicId" value=<?php echo $_GET['id']?>/>
			<input type="hidden" name="redirect" value=<?php echo $_SERVER['REQUEST_URI'];?>/>

			<input type="submit" value="Submit" name="submitText"/>
		</form>

		<?php //echo $_POST['postarea']?>
	<!--	<form method="post" id="postTextArea" action="index.php?id=<?php //echo $_GET['id'] ?>">
			<input type="submit" name="submit" value="Send" id="submit" style="float:right;margin:10px;"/>
				<textarea form="postTextArea" class="area" id="postarea" name="postarea"></textarea>
		</form>
	-->

	<?php	} ?>

	</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">
for (var i = 0; i <= <?php echo count($data[2]); ?> - 1; i++) {
    	$("form.comment_reply").hide();
		$(document).ready(function(){
	  		$(document).on("click" , "button.rep" , function(){
	  			if($(this).data("id") == $(this).parents().children().closest("form.comment_reply").data("id") && $(this).parents().children().closest("form.comment_reply").is(":hidden")){
		     		$(this).parents().children().closest("form.comment_reply").show();
	  			} else {
		     		$(this).parents().children().closest("form.comment_reply").hide();
	  			}
  		});
	});
}
</script>