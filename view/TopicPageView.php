<div class="container">
  

	<div class="postlist">
		<h1><?php echo $data[0]->title ?>	</h1>
		<hr>
		<div class="userBox">
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

					<form id="reply">
  						<input type="image" onclick="openTextBox()" src="view/css/reply.png" alt="Submit" width="20" height="20">
					</form>
					<script type="text/javascript">
						function openTextBox(){
    						echo ""
    					}
					</script>


			</div>
			<p><?php echo $v1->body; ?> </p>
		</div>
		<?php }, $data[2], $data[3]); ?>

		
		<div id="post" class="postlist">
		<?php if ($data[4]) { ?>
			<br>
			<textarea class="area"></textarea>
		<?php	} ?>
	
		</div>


	</div>


	


</div>

