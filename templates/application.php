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

$user_id = ($_SESSION['userID']);

$ReadSql = "SELECT ja.userid, ja.jobid, ja.name, ja.email, ja.experience, ja.date
						FROM jobapplication ja JOIN jobs j  ON ja.jobid = j.jobID WHERE j.userID = $user_id";

$res = mysqli_query($connection, $ReadSql);

?>

<?php require($path . 'templates/header.php') ?>
	<div class="container-fluid my-4">
		<div class="row my-2">
			<h2>Sidejob - Application</h2>

		</div>
		<table class="table ">
		<thead>
			<tr>
				<th>UserID</th>
				<th>JobID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Experience</th>
				<th>Applicant Reviews</th>
				<th>Date</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while($r = mysqli_fetch_assoc($res)){
		?>
			<tr>
				<td><?php echo $r['userid']; ?></td>
				<td><?php echo $r['jobid']; ?></td>
				<td><?php echo $r['name']; ?></td>
				<td><?php echo $r['email']; ?></td>
				<td><?php echo $r['experience']; ?></td>
				<td><a href = "review_other.php?userID=<?php echo $r['userid']?>">Click here to see Applicant reviews</a></td>
				<td><?php
				$r['date'] = date("m/d/Y");
				echo $r['date'];
				?></td>
				<td>
					<a href="accept.php?userid=<?php echo $r['userid']; ?>&jobid=<?php echo $r['jobid']; ?>"><button type="button" class="btn btn-info">Accept</button></a>
					<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $r['userid']; ?>">Reject</button>
					<!-- Modal -->
					  <div class="modal fade" id="myModal<?php echo $r['userid']; ?>" role="dialog">
					    <div class="modal-dialog">

					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
                            <h5 class="modal-title">Reject Applicant</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
					        </button>
					        </div>
					        <div class="modal-body">
					          <p>Are you sure?</p>
					        </div>
					        <div class="modal-footer">
					          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					          <a href="del_app.php?userid=<?php echo $r['userid']; ?>&jobid=<?php echo $r['jobid']; ?>"><button type="button" class="btn btn-danger"> Yes</button></a>
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

<?php require($path . 'templates/footer.php') ?>
