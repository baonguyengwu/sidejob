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

$ReadSql = "SELECT * FROM jobresult jr WHERE jr.empID = '$user_id'";
$res = mysqli_query($connection, $ReadSql);

?>

<?php require($path . 'templates/header.php') ?>
	<div class="container-fluid my-4">
		<div class="row my-2">
			<h2>SideJobs - Approval</h2>

		</div>
		<table class="table ">
		<thead>
			<tr>
				<th>Applicant ID</th>
				<th>Job Title</th>
				<th>Applicant Name</th>
				<th>Applicant Email</th>
				<th>Review</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while($r = mysqli_fetch_assoc($res)){
		?>
			<tr>
				<th scope="row"><?php echo $r['userID']; ?></th>
				<td><?php echo $r['jobTitle']; ?></td>
				<td><?php echo $r['studentName']; ?></td>
				<td> <a href = "mailto: <?php echo $r['studentEmail']; ?>"> Send Email to Student</a></td>
				<td> <a href = "review.php?userID=<?php echo $r['userID']?>"> Review Student </a>	</td>
				<td> <a href = "complete.php?resultID=<?php echo $r['resultID']?>"><button type="button" class="btn btn-success"> Complete</button></a></td>
			</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>


<?php require($path . 'templates/footer.php') ?>
