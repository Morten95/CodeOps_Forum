<?php session_start(); ?>
<html>
	<head>
	</head>
	<body>
		<h1>This is the header</h1>

<?php if (isset($_SESSION['username'])) : ?>
   <h3>You are already logged in as <?php echo $_SESSION['username']; ?></h3>
   <a href="asdf">logout</a>
<?php endif; ?>