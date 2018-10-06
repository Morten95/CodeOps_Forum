<div class="header">
	<h2>Register</h2>
</div>

<form class="registerForm" method="POST" action="index.php">
	<div class="input-group">
		<label>First name</label>
		<input type="text" name="fname">
		<div class="input-group">
		<label>Last name</label>
		<input type="text" name="lname">
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="user" placeholder="Username123">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" placeholder="example@mail.com"> <!-- virker ikke hundre prosent ^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+.[A-Za-z]$ -->
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1" id="password_1" placeholder="minimum 6 characters">
	</div>
	<div class="input-group">
		<label>Confirm Password</label>
		<input type="password" name="password_2" id="password_2">
	</div>
	<div class="input-group">
	<button type="submit" name="reg" class="btn">Register</button>
	</div>
 </form>

 <script type="text/javascript">
window.onload = function () {
    document.getElementById("password_1").onchange = validatePassword;
    document.getElementById("password_2").onchange = validatePassword;
}

function validatePassword(){
var pass2=document.getElementById("password_2").value;
var pass1=document.getElementById("password_1").value;
if(pass1!=pass2)
    document.getElementById("password_2").setCustomValidity("Passwords Don't Match");
else
    document.getElementById("password_2").setCustomValidity('');	 
//empty string means no validation error
}
</script>

