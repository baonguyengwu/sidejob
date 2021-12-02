<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sidejob/";

require_once($path . 'connect.php');

// Initialize the session
session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] == 'user' || $_SESSION['role'] == 'admin')) {
	header("location: /sidejob/index.php");
	return;
}

$jobID = (isset($_GET['jobID']) ? $_GET['jobID'] : 0);

if(isset($_POST) & !empty($_POST)){
	$user_id = ($_SESSION['userID']);
	$job_id = $jobID;
	$name = ($_POST['name']);
	$email = ($_SESSION['email']);
	$experience = ($_POST['experience']);
	$certificate = ($_POST['certificate']);



	$query = "INSERT INTO `jobapplication` (userid, jobid, name, email, experience, certificate) VALUES ('$user_id', '$job_id', '$name', '$email', '$experience', '$certificate')";
	$res = mysqli_query($connection, $query);
	if($res){
		$fmsg = "The application is submitted.";
		header('location: /sidejob/index.php');
	}else{
		$fmsg = "The application is already submitted.";
		
	}
}
?>

<?php require_once($path . 'templates/header.php') ?>

	<div class="container">
	<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<h2 class="my-4">Apply for Job</h2>

		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Name</label>
				<input type="text" id="id" class="form-control" name="name" value="" required/>
			</div>
			<div class="form-group">
				<label>Experience</label>
				<input type="text" class="form-control" name="experience" value="" required/>
			</div>
			<div class="form-group">
				<label>Certificate</label>
				<input type="text" class="form-control" name="certificate" value="" required/>
			</div>
			<input type="submit" class="btn btn-primary" value="Submit"/>
			<a  href="<?php echo $server; ?>index.php" class="btn btn-secondary">Cancel</a>
		</form>
	</div>

<?php require_once($path . 'templates/footer.php') ?>
