<?php
// Include config file
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sidejob/";
require_once($path . 'connect.php');

// Initialize the session
session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
	$url = 'http://' . $_SERVER['HTTP_HOST']; // Get server
    $url .= "/job/components/user/login.php";
	header('Location: ' . $url, TRUE, 302);
}

?>
<?php require($path . 'templates/header.php') ?>

    <div class="wrapper mx-auto">
        <h2>Saved Jobs</h2>
        <div class="saved-jobs">
        	<table class="table ">
				<thead>
					<tr>
						<th>Job No.</th>
						<th>Title</th>
						<th>Company</th>
						<th>Salary</th>
					</tr>
				</thead>
				<tbody>
					<!-- fill using script -->
				</tbody>
			</table>
        </div>
        <button type="button" class="btn btn-danger btn-checkout">
			<span>
				<i class="fa fa-remove"></i>
				Clear All Jobs
			</span>
		</button>
    </div>

<?php require($path . 'templates/footer.php') ?>
