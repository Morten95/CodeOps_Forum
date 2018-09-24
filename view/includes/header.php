<html>
  <head>
    <link rel="stylesheet" href="view/css/main.css">
    <link rel="stylesheet" href="view/css/bootstrap.min.css">
  </head>
  <body>
    <div class="topnav">
      <a class="active" href="index.php">Home</a>
      
      <div class="login-container">
	<?php if (!(isset($_SESSION['username']))) : ?>
	<form action="index.php" method="POST">
	  <input type="text" placeholder="username" name="username" required>
	  <input type="text" placeholder="password" name="password" required>
	  <a id="register" href="/CodeOps_Forum/index.php?register=1">Register</a>
	  <button type="submit">Login</button>
	</form>
	<?php else : ?>
	<form action="index.php" method="POST">
 	 <p id="LogginText">Logged in as <?php echo $_SESSION['username']; ?></p>
	  <input type="hidden" name="logout">
	  <button type="submit">Logout</button>
	</form>
	<?php endif; ?>
      </div>
    </div>
    <h1>This is the header</h1>
