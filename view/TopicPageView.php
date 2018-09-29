
<?php

?>
<div class="container">
  

	<div class="postlist">
		<h1><?php echo $data[0]->title ?>	</h1>
		<hr>
		<div class="threaduser">
			<p><?php echo "User: " . $data[1]->username ?></p>
		</div>
		<p><?php echo $data[0]->body ?></p>
	</div>

	<div>					<!---//v3 v4--->
		<?php array_map(function($v1, $v2) use ($data) {  ?>  

		<div id="post" class="postlist">
			<div class="userBox">
					<p><?php echo "User: " . $v2->username; echo "<br>";?> </p>
					<p><?php echo "Admin: ";  if($v2->admin) { echo "Yes";} else { echo "No";} ?> </p>

					<form method="POST">
						
					</form>
					<div>
						<button type="button" class="btn btn-primary rep" data-id=""><i class="fa fa-reply"></i></button>
   						<!--<button type="button" class="btn btn-primary rep" data-id="">Reply</button> -->
					</div>
					
			</div>
			<p><?php echo $v1->body; ?> </p>
			
    		

    			<?php if($data[5]) { ?>
		    		<div class="comment_body" style="display: block";>    <!--- FOR EACH POST I PRINT THE COMMENT & USERNAME ! -->
		    			<?php foreach ($data[5] as $com) { ?>
		    				<?php if ($v1->id == $com->postID) {  ?>
		    					<hr id="ZohaibStyle" >
		    					<?php foreach ($data[6] as $user) {  // Inne i user--> 
		    						if ($com->userID == $user->id) { ?>
		    					
		    					
		    							<!--- *** I HAVE NO IDEA WHY THIS WORK?! *** --->
		    						
		    				
		    						<?php }?>
		    					<?php } ?>
		    					<span> 
		    						<small> <!-- Inne i POST-->
		    					<?php echo $user->username . ": " . $com->body . "<br>"; ?>
		    								</small>
		    				</span> 
		    			<?php } ?>
	    			<?php } ?>
	    			</div>
    			<?php } ?>
			
			<?php if ($data[4]) {  ?>

			<form class="comment_reply" data-id="" method="post" action="index.php">
    			<textarea class="form-control" rows="2" name="post_rep" ></textarea>
    			<input type="hidden" class="hidden" name="test" class="post_id" value=<?php echo $v1->id?>/>
    			<button type="submit" name="sub_comment" class="btn btn-primary" class="post_rep_sub">Submit</button>
    			<input type="hidden" name="redirect123" value=<?php echo $_SERVER['REQUEST_URI'];?>/>
    		</form>

    		<div id="comment" class="comment_reply">

    		<?php } ?>

    		</div>
		</div>
		<?php }, $data[2], $data[3]) ?>

					
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

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">
    $('form.comment_reply').hide();
	$(document).ready(function(){
  	$(document).on('click' , 'button.rep' , function(){
     var closestDiv = $(this).closest('div'); // also you can use $(this).parent()
     if($('form.comment_reply').is(":hidden")){
     	$('form.comment_reply').show();
     } else {
    	$('form.comment_reply').hide();
     }
     //closestDiv.fadeOut();
     //closestDiv.next('form.comment_reply').slideToggle(100);
  });
});
</script>

