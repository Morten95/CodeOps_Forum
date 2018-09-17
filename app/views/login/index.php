<?php require_once '../app/views/includes/header.php'; ?>
<div class="container">
This is the body of the page

<?php if (!(isset($_SESSION['username']))) : ?>
<form action="auth" method="POST">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit">Login</button>
</form>
<?php endif; ?>

</div>
<?php require_once '../app/views/includes/footer.php'; ?>