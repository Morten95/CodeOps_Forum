<?php require_once '../app/views/includes/header.php'; ?>
<div class="container">
This is the body of the page

<?php echo var_dump($_SESSION); ?>

<?php if (!(isset($_SESSION['username']))) : ?>
   <h3>Welcome guest</h3>
   <a href="login/index">login</a>
   or
   <a href="register/index">register</a>
<?php endif; ?>

</div>
<?php require_once '../app/views/includes/footer.php'; ?>