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

	<div>
		<?php array_map(function($v1, $v2){  ?>

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
			
			<form class="comment_reply" data-id="" method="post" action="">
    			<input type="hidden" class="hidden" value="" class="post_id">
    			<textarea class="form-control" rows="3" name="post_rep" class="post_rep"></textarea>
    			<button type="submit" class="btn btn-primary" class="post_rep_sub">Submit</button>
    		</form>

		</div>
		<?php }, $data[2], $data[3]); ?>

					
		<div id="post" class="postlist">
		<?php if ($data[4]) { ?>
			<br>
			<form method="post" id="postTextArea" action="index.php?id=<?php echo $_GET['id'] ?>">
    			<input type="submit" name="submit" value="Send" id="submit" style="float:right;margin:10px;"/>
   				<textarea form="postTextArea" class="area" id="postarea" name="postarea"></textarea>
			</form>
		
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
     	$('form.comment_reply').show()
     } else {
    	$('form.comment_reply').hide();
     }
     //closestDiv.fadeOut();
     //closestDiv.next('form.comment_reply').slideToggle(100);
  });
});
</script>
