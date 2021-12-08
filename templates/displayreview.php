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
$ReadSql = "SELECT * FROM reviews WHERE userID = $user_id";
$res = mysqli_query($connection, $ReadSql);



?>

<?php require($path . 'templates/header.php') ?>
	<div class="container-fluid my-4">
		<div class="row my-2">
			<h2>Users Review</h2>
		</div>
    <div class="row main-section">
        <?php
  		$num_of_rows = mysqli_num_rows($res);
  		if ($num_of_rows > 0) {
  	    	// output data of each row
  		    while($num_of_rows > 0) {
  		    	$num_of_rows--;
  		    	$r = mysqli_fetch_assoc($res);
  					?>
  					<div class="col-md-4 col-sm-6 my-2">
  						<div class="card m-auto job" style="width: 20rem;">
  							<div class="card-body">
  								<h4 class="card-title"><?php echo $r['reviewer_name']; ?></h4>
  								<p class="card-text"><?php echo $r['reviewer_email']; ?></p>
  								<p class="card-text company"><?php echo $r['review']; ?></p>
  							</div>
  						</div>
  					</div>

  					<?php
  		    }
  		} else {
  		    echo '<div class="container">No Reviews Available</div>';
  		}
  	?>
  	</div>

<?php require($path . 'templates/footer.php') ?>
