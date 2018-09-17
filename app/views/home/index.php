<?php include '../app/views/includes/header.php'; ?>
<div class="container">
This is the body of the page

<?php echo var_dump($_SESSION); ?>

<div id="post" class="postlist">
		<div class="column">
							<h2>Column 3</h2>
									<p>Some text..</p>
												</div>
															<div class="column">
																		<h2>Column 4</h2>
																						<p>Some text..</p>
																									</div>
																											</div>

</div>
<?php require_once '../app/views/includes/footer.php'; ?>