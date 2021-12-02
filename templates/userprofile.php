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

$user_id = ($_SESSION['userID']);

$ReadSql = "SELECT * FROM users WHERE userID = $user_id";
$res = mysqli_query($connection, $ReadSql);

?>

<?php require($path . 'templates/header.php') ?>
	<div class="container-fluid my-4">
		<div class="row my-2">
			<h2>SideJobs - Users Information</h2>

		</div>
		<table class="table">
		<thead>
			<tr>
				<th>User ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
        <th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while($r = mysqli_fetch_assoc($res)){
		?>
			<tr>
				<th scope="row"><?php echo $r['userID']; ?></th>
				<td><?php echo $r['name']; ?></td>
				<td><?php echo $r['email']; ?></td>
				<td><?php echo $r['phone']; ?></td>
        <td>
					<a href="editprofile.php?id=<?php echo $r['userID']; ?>"><button type="button" class="btn btn-info">Edit</button></a>

					<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $r['userID']; ?>">Delete</button>

					<!-- Modal -->
					  <div class="modal fade" id="myModal<?php echo $r['userID']; ?>" role="dialog">
					    <div class="modal-dialog">

					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
                            <h5 class="modal-title">Delete User Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
					        </button>
					        </div>
					        <div class="modal-body">
					          <p>Are you sure? You will be log out!!</p>
					        </div>
					        <div class="modal-footer">
					          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					          <a href="delete_account.php?id=<?php echo $r['userID']; ?>"><button type="button" class="btn btn-danger"> Yes, Delete</button></a>
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
  <div id="confirm" class="modal hide fade">
    <div class="modal-body">
      Are you sure?
    </div>
    <div class="modal-footer">

      <button type="button" data-dismiss="modal" class="btn">Cancel</button>
    </div>
  </div>

<?php require($path . 'templates/footer.php') ?>
