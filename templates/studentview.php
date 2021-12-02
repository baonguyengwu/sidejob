<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sidejob/";

require_once($path . 'connect.php');

// Initialize the session
session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] == 'user')) {
	echo "Unauthorized Access";
	return;
}

$user_id = ($_SESSION['userID']);

$ReadSql = "SELECT * FROM jobresult jr WHERE jr.userID = '$user_id'";
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
				<th>Job ID</th>
				<th>Job Title</th>
				<th>Employer Company</th>
				<th>Employer Email</th>
				<th>Review</th>
        <th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while($r = mysqli_fetch_assoc($res)){
		?>
			<tr>
				<th scope="row"><?php echo $r['jobID']; ?></th>
				<td><?php echo $r['jobTitle']; ?></td>
				<td><?php echo $r['employerCompany']; ?></td>
				<td> <a href = "mailto: <?php echo $r['employerEmail']; ?>">Send Email to Student</a></td>
				<td>
				</td>
        <td>
				</td>
			</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>


<?php require($path . 'templates/footer.php') ?>
