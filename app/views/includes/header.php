<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<html>
	<head>
	<link rel="stylesheet" href="main.css">
	</head>
	<body>
		<div class="topnav">
		  	<a class="active" href="#home">Home</a>


			<div class="login-container">
			     <?php if (!(isset($_SESSION['username']))) : ?>
				<form action="home/auth" method="POST">
					<input type="text" placeholder="username" name="username" required>
					<input type="text" placeholder="password" name="password" required>
					<button type="submit">Login</button>
				</form>
				<?php else : ?>
 				     <p id="logged_in">Logged in as <?php echo $_SESSION['username']; ?></p>
   	      	    		     <a href="home/logout">Logout</a>
				<?php endif; ?>
			</div>

		</div>
		<h1>This is the header</h1>

