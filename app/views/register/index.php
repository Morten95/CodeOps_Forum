<?php require_once '../app/views/includes/header.php'; ?>
<div class="container">
This is the body of the page


<?php if (!(isset($_SESSION['username']))) : ?>
<form action="action_page.php">
    <label for="uname"><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="uname" required>

    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="uname" required>

    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Register</button>
</form>
<?php endif; ?>

</div>
<?php require_once '../app/views/includes/footer.php'; ?>