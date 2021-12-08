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
			<h2>SideJobs - Student Result</h2>

		</div>
		<table class="table ">
		<thead>
			<tr>
				<th>Job ID</th>
				<th>Job Title</th>
				<th>Employer Company</th>
				<th>Employer Reviews</th>
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
				<td><a href = "review_other.php?userID=<?php echo $r['empID']?>">Click here to see Employer reviews</a></td>
				<td> <a href = "mailto: <?php echo $r['employerEmail']; ?>"> Send Email to Employer</a></td>
				<td> <a href = "review.php?userID=<?php echo $r['empID']?>"> Review Employer </a>	</td>
        <td>
						<a href="del_result_app.php?id=<?php echo $r['resultID']; ?>"><button type="button" class="btn btn-success">Complete Job</button></a>
						<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $r['resultID']; ?>">Reject</button>
							<!-- Modal -->
							<div class="modal fade" id="myModal<?php echo $r['resultID']; ?>" role="dialog">
							<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
									<div class="modal-header">
						        <h5 class="modal-title">Delete Approval Application</h5>
						       	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						        	<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>Are you sure? The Approval will be delete from your account.</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
										<a href="del_result_app.php?id=<?php echo $r['resultID']; ?>"><button type="button" class="btn btn-danger"> Yes, Reject</button></a>
									</div>
									</div>
									</div>
									</div>

				</td>
			</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
</div>
<div id="confirm" class="modal hide fade">
	<div class="modal-body">
		Are you sure?
	</div>
	<div class="modal-footer">

		<button type="button" data-dismiss="modal" class="btn">Cancel</button>
	</div>
</div>

<?php require($path . 'templates/footer.php') ?>
