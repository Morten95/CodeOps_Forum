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
      <a class="active" href="index.php"><i class="fa fa-home"></i> Home</a>



      <?php if ((isset($_SESSION['username']))) : ?>
      <a class="active" href="index.php?insert=1"><i class="fa fa-plus"></i>  Insert Topic</a>
      <?php endif; ?>
      <div class="Search bar">
      <form method="post" action="/CodeOps_Forum/index.php?search=1">
        <input type="text" name="Search">
        <input type="submit" value="Search ">
      </form>
    </div>
      <div class="login-container">
	<?php if (!(isset($_SESSION['username']))) : ?>
	<form action="index.php" method="POST">
	  <input type="text" placeholder="username" name="username" id="user">
	 <input type="password" placeholder="password" name="password" id="password">
	  <a id="register" href="/CodeOps_Forum/index.php?register=1">Register</a>
	  <button type="submit"id="log" name="log">Login</button>
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


<script type="text/javascript">
  window.onload = function () {
  
    if(document.getElementById("log"))
        document.getElementById("log").onclick = validateField
}

function validateField(){
  var usr=document.getElementById("user").value;
  var pass1=document.getElementById("password").value;

  if (usr!=""&&usr.match(/^([A-Za-zæøå0-9-]{6,})$/)) {
    document.getElementById("user").setCustomValidity(''); 
  }
  else {
    document.getElementById("user").setCustomValidity("Username not valid");
  }

  if (pass1!=""&&pass1.match(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&"¤%/()=?`^*'¨+<>\\~]{8,}$/)) {
    document.getElementById("password").setCustomValidity(''); 
  }
  else {
    document.getElementById("password").setCustomValidity("Password not valid");
  }
}

</script>