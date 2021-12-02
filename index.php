<?php
require_once ('connect.php');

// Initialize the session
session_start();

?>
<?php require('templates/header.php') ?>
	<div class="d-flex mt-4 mx-4">
        <h3>Welcome to Online Job Portal,
        	<b><?php // check user login and output username
			if ($user_logged) {
				$user_id = ($_SESSION['userID']);
				$user_email = ($_SESSION['email']);
				$select_sql = "SELECT name FROM `users` WHERE userID='$user_id'";
				$result = mysqli_query($connection, $select_sql);
				if ($result->num_rows > 0) {
					$row = mysqli_fetch_assoc($result);
					echo $row["name"];
					if (!$row["name"]) {
						 echo "Guest";
					}
				}
			} else {
			    echo "Guest";
			}
        	?></b>
        </h3>
    </div>

    <div class="d-flex my-2">
	<?php // output success or failed message.
      	if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
    <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
    </div>

	<div class="row main-section">
      <?php
		$SelSql = "SELECT * FROM `jobs`";
		$res = mysqli_query($connection, $SelSql);
		$num_of_rows = mysqli_num_rows($res);

		$jobID = 0;

		if ($num_of_rows > 0) {

	    	// output data of each row
		    while($num_of_rows > 0) {
		    	$num_of_rows--;
		    	$r = mysqli_fetch_assoc($res);
					$jobID = $r['jobID'];
					?>

					<div class="col-md-4 col-sm-6 my-2">
						<div class="card m-auto job" style="width: 20rem;">
							<div class="card-body">
								<h4 class="card-title"><?php echo $r['title']; ?></h4>
								<p class="card-text"><?php echo $r['description']; ?></p>
								<p class="card-text"><?php echo $jobID; ?> </p>

								<p class="card-text company"><?php echo $r['company']; ?></p>
								<div style="display: flex; justify-content: space-between; align-items: center;">
									<div style="font-weight: 600;">$<span class="salary"><?php echo $r['salary']; ?> per hrs</span></div>
									<!-- Button save jobs -->
									<button title="Save Job" data-pid="<?php echo $r['jobID']; ?>" type="button" class="btn save-button">
										<span>
											<i class="fa fa-heart-o text-dark"></i>
										</span>
									</button>
									<!-- Button apply jobs -->
									<button type="button" class="btn apply-button">

										<span class="text-white">
											<?php
														echo "<a href='templates/apply.php?jobID={$r['jobID']}'>";
														echo "Apply";
														echo "</a>";
											?>

										</span>
									</button>
								</div>
							</div>
						</div>
					</div>

					<?php
		    }
		} else {
		    echo '<div class="container">No Jobs Available</div>';
		}
	?>
	</div>

<?php require('templates/footer.php') ?>
