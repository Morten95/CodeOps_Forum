<?php require_once '../app/views/includes/header.php'; ?>
<div class="container">
This is the body of the page

<?php if (!(isset($_SESSION['username']))) : ?>
<form action="action_page.php">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
</form>
<?php endif; ?>

</div>
<?php require_once '../app/views/includes/footer.php'; ?>