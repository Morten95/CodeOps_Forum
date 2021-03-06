<div class="container">


	<div class="postlist">
		<h1><?php echo htmlentities($data[0]->title, ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>	</h1>
		<hr>
		<div class="threaduser">
			<p><?php echo "User: " . $data[1]->username ?></p>
		</div>
		<p><?php echo htmlentities($data[0]->body, ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></p>
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
					
			</div>



		</div>
		<p><?php echo htmlentities($v1->body, ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> </p>
			<?php if($data[5]) { ?>
	    		<div class="comment_body" style="display: block";>   
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

	    					<?php foreach ($data[6] as $user) {  // FOR EACH POST I PRINT THE COMMENT & USERNAME !
	    						if ($com->userID == $user->id) { ?>
									<span>
	    								<small>
	    									<?php echo $user->username . ": "; break; ?>

	    						<?php }?>
	    					<?php } ?>
	    								<?php echo htmlentities($com->body, ENT_QUOTES | ENT_HTML5, 'UTF-8') . "<br>"; ?>


	    								</small>


	    							</span>

	    				<?php } ?>
    				<?php } ?>
    			</div>
			<?php } ?>

		<?php if ($data[4]) {  ?>
		<form class="comment_reply"  style="display: none;" data-id="<?php echo $postIndex; ?>" method="post" action="index.php">
			<textarea class="form-control" rows="2" name="post_rep" id="post_rep" required=""></textarea>
			<input type="hidden" class="hidden" name="test" class="post_id" value=<?php echo $v1->id?>/>
			<button type="submit" name="sub_comment" id="sub_comment" class="btn btn-primary" class="post_rep_sub">Submit</button>
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
			<textarea class="area" name="postarea" id="postarea"></textarea>
			<input type="hidden" name="topicId" value=<?php echo $_GET['id']?>/>
			<input type="hidden" name="redirect" value=<?php echo $_SERVER['REQUEST_URI'];?>/>

			<input style="margin-left: 48%;" type="submit" value="Submit" name="submitText" id="submitText"/>
		</form>
	<?php	} ?>

	</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">
  window.onload = function () {
  
    if(document.getElementById("submitText"))
        document.getElementById("submitText").onclick = validateField;

    if (document.getElementById("sub_comment")) 
    	document.getElementById("sub_comment").onclick = validateComment;
}

function validateComment(){
	var commentArea=document.getElementById("post_rep").value;

	if (commentArea && $.trim(commentArea).length != 0 && $(this).data("id")) {
		document.getElementById("post_rep").setCustomValidity('');
	}
	else{
		document.getElementById("post_rep").setCustomValidity("Can not post empty comment")
	}
}

function validateField(){
  var postArea =document.getElementById("postarea").value;

  if (postArea && $.trim(postArea).length != 0) {
    document.getElementById("postarea").setCustomValidity(''); 
  }
  else {
    document.getElementById("postarea").setCustomValidity("Can not post an empty text box");
  }
}

$(document).ready(function(){
	$(document).on("click" , "button.rep" , function(){
		if($(this).data("id") == $(this).parents().children().closest("form.comment_reply").data("id")){
     		$(this).parents().children().closest("form.comment_reply").toggle();
		}
	});
});
</script>