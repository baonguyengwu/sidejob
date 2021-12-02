<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sidejob/";

require_once($path . 'connect.php');

// Initialize the session
session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
	echo "Unauthorized Access";
	return;
}

$id = $_GET['id'];

$SelSql = "SELECT * FROM users WHERE userID = $id";
$res = mysqli_query($connection, $SelSql);
$r = mysqli_fetch_assoc($res);


if(isset($_POST) & !empty($_POST)){
	$name = ($_POST['name']);
	$email = ($_POST['email']);
	$phone = ($_POST['phone']);

    // Execute query
	$query = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE userID='$id'";

	$res = mysqli_query($connection, $query); // get result
	if($res){
		header('location: userprofile.php');
	}else{
		$fmsg = "Failed to Insert data.";
		print_r($res->error_list);
	}
}
?>

<?php require_once($path . 'templates/header.php') ?>

	<div class="container">
	<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<h2 class="my-4">Edit Profile</h2>
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
        <label>New Name</label>
  			<input type="text" class="form-control" name="name" value="<?php echo $r['name'];?>" required/>
      </div>
      <div class="form-group">
        <label>New Email</label>
				<input type="text" class="form-control" name="email" value="<?php echo $r['email'];?>" required/>
      </div>
      <div class="form-group">
        <label>New Phone Number</label>
				<input type="text" class="form-control" name="phone" value="<?php echo $r['phone'];?>"/>
      </div>
			<input type="submit" class="btn btn-primary" value="Update" />
      <a href="userprofile.php"><button type="button" class="btn btn-danger"> Cancel</button></a>
		</form>
	</div>

<?php require_once($path . 'templates/footer.php') ?>
