<?php

$server = 'http://' . $_SERVER['SERVER_NAME'] . '/sidejob/';

$user_logged = false;

?>
<!DOCTYPE html>
<html>

<head>
	<title>SideJobs</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo $server; ?>css/style.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<style type="text/css">
		body {
			font: 14px sans-serif;
		}

		.wrapper {
			width: 350px;
			padding: 20px;
		}
	</style>
</head>

<body>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<a class="navbar-brand" href="<?php echo $server; ?>index.php">SideJobs</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>

  <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto" id="navbar">
			<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
				$user_logged = true;
				if ($_SESSION['role'] == 'admin') { ?>
					<li class="nav-item">
						<a class="nav-link text-dark" href="<?php echo $server; ?>templates/userview.php">Users</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-dark" href="<?php echo $server; ?>components/job/view.php">Jobs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-dark" href="<?php echo $server; ?>templates/application.php">Application</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-dark" href="<?php echo $server; ?>templates/approvaladmin.php">Approval</a>
					</li>
			<?php }
				elseif ($_SESSION['role'] == 'employer') {?>
					<li class="nav-item">
						<a class="nav-link text-dark" href="<?php echo $server; ?>templates/userprofile.php">User Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-dark" href="<?php echo $server; ?>components/job/employerview.php">Jobs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-dark" href="<?php echo $server; ?>templates/application.php">Application</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-dark" href="<?php echo $server; ?>templates/approvalview.php">Approval</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-dark" href="<?php echo $server; ?>templates/displayreview.php">Your Reviews</a>
					</li>
			<?php	}
				elseif ($_SESSION['role'] == 'user') {?>
					<li class="nav-item">
						<a class="nav-link text-dark" href="<?php echo $server; ?>templates/userprofile.php">User Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-dark" href="<?php echo $server; ?>templates/studentresult.php">Result</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-dark" href="<?php echo $server; ?>templates/displayreview.php">Your Reviews</a>
					</li>
				<?php	}
			} ?>

		</ul>
		<ul class="navbar-nav">
			<div class="d-flex my-2 my-lg-0">
				<input id="searchInput" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button id="searchBtn" class="btn btn-outline-light m-2 my-sm-0" type="button">Search</button>
			</div>
		</ul>
		<ul class="navbar-nav">
			<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] == 'user') {?>
			<li class="nav-item save mr-4">
				<a class="nav-link btn bg-warning" href="<?php echo $server; ?>templates/save.php">
					<span class="text-white">0 </span>
					<i class="fa fa-heart text-white" style="font-size: 18px;"></i>
				</a>
			</li><?php
		} ?>

			<?php
			if ($user_logged) { ?>
				<li class="nav-item mr-sm-1">
					<a class="nav-link btn btn-dark text-white" href="<?php echo $server; ?>components/user/reset-password.php"><span><i class="fa fa-user text-white"></i></span> Reset Password</a>
				</li>
				<li class="nav-item mr-sm-2">
					<a class="nav-link btn btn-dark text-white" href="<?php echo $server; ?>components/user/logout.php"><span><i class="fa fa-sign-out text-white"></i></span>Sign Out</a>
				</li>
			<?php } else { ?>
				<li class="nav-item mr-sm-2">
					<a class="nav-link btn btn-primary text-white" href="<?php echo $server; ?>components/user/login.php"><span><i class="fa fa-sign-in text-white"></i></span>Sign In</a>
				</li>
			<?php } ?>
		</ul>
		</nav>


</body>
