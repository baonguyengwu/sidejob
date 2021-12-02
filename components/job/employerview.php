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

$user_id = ($_SESSION['userID']);

$ReadSql = "SELECT * FROM jobs j  WHERE j.userID = '$user_id'";

$res = mysqli_query($connection, $ReadSql);

?>

<?php require($path . 'templates/header.php') ?>
	<div class="container-fluid my-4">
		<div class="row my-2">
			<h2>SideJobs - Jobs</h2>
			<a href="employeradd.php"><button type="button" class="btn btn-primary ml-4 pl-2">Add New</button></a>
		</div>
		<table class="table ">
		<thead>
			<tr>
				<th>Job No.</th>
				<th>Title</th>
				<th>Salary</th>
				<th>Company</th>
				<th>Email</th>
				<th>Update</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while($r = mysqli_fetch_assoc($res)){
		?>
			<tr>
				<th scope="row"><?php echo $r['jobID']; ?></th>
				<td><?php echo $r['title']; ?></td>
				<td>$ <?php echo $r['salary']; ?></td>
				<td><?php echo $r['company']; ?></td>
				<td><?php echo $r['email']; ?></td>
				<td><a href="employerupdate.php?id=<?php echo $r['jobID']; ?>"><button type="button" class="btn btn-info">Edit</button></a></td>
			</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
</div>

<?php require($path . 'templates/footer.php') ?>
