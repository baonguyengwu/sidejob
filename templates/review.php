<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sidejob/";

require_once($path . 'connect.php');

// Initialize the session
session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true )) {
	echo "Unauthorized Access";
	return;
}

if(isset($_POST) & !empty($_POST)){
	$userID = $_GET['userID'];
	$name = ($_POST['name']);
	$email = ($_SESSION['email']);
	$resultID = $_GET['resultID'];
	$review = ($_POST['review']);

  $query = "INSERT INTO `reviews` (resultID, userID, reviewer_email, reviewer_name, review) VALUES ('$resultID', '$userID', '$email', '$name', '$review')";
	$res = mysqli_query($connection, $query);
	if($res){
		$fmsg = "Your review is submitted.";
		header('location: /sidejob/index.php');
	}else{
		$fmsg = "You have already submitted a review for this user.";
	}
}
?>
<?php require_once($path . 'templates/header.php') ?>

	<div class="container">
	<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<h2 class="my-4">Review Feature</h2>
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Name</label>
				<input type="text" id="id" class="form-control" name="name" value="" required/>
			</div>
			<div class="form-group">
				<label>Reviews</label>
				<input type="text" class="form-control" name="review" value="" required/>
			</div>
			<input type="submit" class="btn btn-primary" value="Submit"/>
			<a  href="<?php echo $server; ?>index.php" class="btn btn-secondary">Cancel</a>
		</form>
	</div>

<?php require_once($path . 'templates/footer.php') ?>
