<div class="header">
	<h2>Register</h2>
</div>

<form name="test" class="registerForm" method="POST" action="index.php">
	<div class="input-group">
		<label>First name</label>
		<input type="text" name="fname" id="fname" placeholder="John"> 
	</div>
	<div class="input-group">
		<label>Last name</label>
		<input type="text" name="lname" id="lname" placeholder="Test">
	</div>
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="userr" id="userr" placeholder="Username123">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" id="email" placeholder="example@mail.com"> 

	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1" id="password_1" placeholder="Minimum 8 characters">
	</div>
	<div class="input-group">
		<label>Confirm Password</label>
		<input type="password" name="password_2" id="password_2">
	</div>
	<div class="input-group">
	<button type="submit" id="reg" name="reg" class="btn">Register</button>
	</div>
 </form>

 <script type="text/javascript">
	window.onload = function () {
	
    document.getElementById("reg").onclick = validateFields;
}

function validateFields(){
	var n1=document.getElementById("fname").value;
	var n2=document.getElementById("lname").value;
	var usr=document.getElementById("userr").value;
	var email=document.getElementById("email").value;
	var pass2=document.getElementById("password_2").value;
	var pass1=document.getElementById("password_1").value;

	if (n1!=""&&n1.match(/^[A-Za-zæøåÆØÅ-]+$/)) {
		document.getElementById("fname").setCustomValidity('');	
	}
	else {
		document.getElementById("fname").setCustomValidity("Firstname not valid");
	}

	if (n2!=""&&n1.match(/^[A-Za-zæøåÆØÅ-]+$/)) {
		document.getElementById("lname").setCustomValidity('');
	}
	else {
		document.getElementById("lname").setCustomValidity("Lastname not valid");
	}

	if (usr!=""&&usr.match(/^([A-Za-zæøå0-9-]{6,})$/)) {
		document.getElementById("userr").setCustomValidity('');
	}
	else {
		document.getElementById("userr").setCustomValidity("Username not valid");
	}

	if (email!=""&&email.match(/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/)) {
		document.getElementById("email").setCustomValidity('');
	}
	else {
		document.getElementById("email").setCustomValidity("Email not valid");
	}

	if (pass1.match(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&"¤%/()=?`^*'¨+<>\\~]{8,}$/)&&pass2.match(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&"¤%/()=?`^*'¨+<>\\~]{8,}$/)) {
		if (pass1==pass2) {
			document.getElementById("password_2").setCustomValidity('');
		}
		else{
			document.getElementById("password_2").setCustomValidity("Passwords Dont Match");	
		}
	}
	else {
		document.getElementById("password_2").setCustomValidity("Atleast 1 special character, 1 lower&upper case");
	}
}

</script>