<html>
  <head>
    <link rel="stylesheet" href="view/css/main.css">
    <link rel="stylesheet" href="view/css/bootstrap.min.css">
    <!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="Content-Security-Policy"
        script-src 'none'; 
        media-src 'none';
        img-src *;
        content 'default-src' 'self';
    >
  </head>
  <body>
    <div class="topnav">
      <a class="active" href="index.php">Home</a>

      <?php if ((isset($_SESSION['username']))) : ?>
      <a href="index.php?insert=1">+ Insert Topic</a>     
      <?php endif; ?>

      <div class="login-container">
	<?php if (!(isset($_SESSION['username']))) : ?>
	<form action="index.php" method="POST">
	  <input type="text" placeholder="username" name="username">
	 <input type="password" placeholder="password" name="password">
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
