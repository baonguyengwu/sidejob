<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sidejob/";

require_once($path . 'connect.php');

// Initialize the session
session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] == 'employer')) {
	echo "Unauthorized Access";
	return;
}

$id = $_GET['id'];

$SelSql = "SELECT * FROM `jobs` WHERE jobID=$id";
$res = mysqli_query($connection, $SelSql);
$r = mysqli_fetch_assoc($res);


if(isset($_POST) & !empty($_POST)){
	$title = ($_POST['title']);
	$salary = ($_POST['salary']);
	$company = ($_POST['company']);

    // Execute query
	$query = "UPDATE `jobs` SET title='$title', salary='$salary', company='$company' WHERE jobID='$id'";

	$res = mysqli_query($connection, $query); // get result
	if($res){
		header('location: employerview.php');
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
				<input type="text" class="form-control" name="title" value="<?php echo $r['title'];?>" required/>
      </div>
      <div class="form-group">
        <label>New Salary</label>
				<input type="text" class="form-control" name="salary" value="<?php echo $r['salary'];?>" required/>
      </div>
      <div class="form-group">
        <labelCcompany</label>
				<input type="text" class="form-control" name="company" value="<?php echo $r['company'];?>"/>
      </div>

			<input type="submit" class="btn btn-primary" value="Update" />
		</form>
	</div>

<?php require_once($path . 'templates/footer.php') ?>
