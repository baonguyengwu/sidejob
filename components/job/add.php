<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sidejob/";

require_once($path . 'connect.php');

// Initialize the session
session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] == 'admin')) {
	echo "Unauthorized Access";
	return;
}

if(isset($_POST) & !empty($_POST)){
	$title = ($_POST['title']);
	$detail = ($_POST['description']);
	$salary = ($_POST['salary']);
	$company = ($_POST['company']);
	$email = ($_SESSION['email']);
	$userID = ($_SESSION['userID']);

	$query = "INSERT INTO `jobs` (title, description, salary, company, email, userID) VALUES ('$title', '$detail', '$salary', '$company', '$email', '$userID')";
	$res = mysqli_query($connection, $query);
	if($res){
		header('location: view.php');
	}else{
		$fmsg = "Failed to Insert data.";
		print_r($res->error_list);
	}
}
?>

<?php require_once($path . 'templates/header.php') ?>

	<div class="container">
	<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<h2 class="my-4">Add New Job</h2>
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Title</label>
				<input type="text" id="id" class="form-control" name="title" value="" required/>
			</div>
			<div class="form-group">
				<label>Description</label>
				<input type="text" id="id" class="form-control" name="description" value="" required/>
			</div>
			<div class="form-group">
				<label>Salary</label>
				<input type="text" class="form-control" name="salary" value="" required/>
			</div>
			<div class="form-group">
				<label>Company</label>
				<input type="text" class="form-control" name="company" value=""/>
			</div>
			<input type="submit" class="btn btn-primary" value="Add Job" />
		</form>
	</div>

<?php require_once($path . 'templates/footer.php') ?>
