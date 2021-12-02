<?php
// Include config file
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sidejob/";

?>

<?php require($path . 'templates/header.php') ?>

    <div class="wrapper mx-auto">
        <h2>Forgot Password</h2>
        <p>Please fill this form to reset new password.</p>
        <form action="handler.php" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="" required>
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control" value="" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="submit" name="submit">
                <input type="reset" class="btn btn-default" value="reset">
            </div>
            <p>Want to cancel <a href="login.php">Return here</a>.</p>
        </form>
    </div>

<?php require($path . 'templates/footer.php') ?>
