<?php
// Include config file
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sidejob/";
require_once($path . 'connect.php');

require "register_inc.php";
?>

<?php require($path . 'templates/header.php') ?>

    <div class="wrapper mx-auto">
        <h2>Sign Up For Student</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="">
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" required>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" required>
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($phonenumber_err)) ? 'has-error' : ''; ?>">
                <label>Phone Number</label>
                <input type="text" name="phonenumber" class="form-control" value="<?php echo $phonenumber; ?>" required>
                <span class="help-block"><?php echo $phonenumber_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($role_err)) ? 'has-error' : ''; ?>">
                <label>Customer Type</label><br>
                <input type="radio" name="role" value="user" <?php if(isset($_POST['role']) && $_POST['role']=="user") { ?>checked<?php  } ?>> Student
                <input type="radio" name="role" value="employer" <?php if(isset($_POST['role']) && $_POST['role']=="employer") { ?>checked<?php  } ?>> Employer
                <span class="help-block"><?php echo $role_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>

<?php require($path . 'templates/footer.php') ?>
