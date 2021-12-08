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

$userID = $_GET['userid'];
$jobID = $_GET['jobid'];

$query = "SELECT * from users where userID = $userID";
$res = mysqli_query($connection, $query);
$r = mysqli_fetch_assoc($res);

$studentName = $r['name'];
$studentEmail = $r['email'];

$query2 = "SELECT * from jobs where jobID = $jobID";
$res2 = mysqli_query($connection, $query2);
$r_job = mysqli_fetch_assoc($res2);

$jobTitle = $r_job['title'];
$employerCompany = $r_job['company'];
$employerEmail = $r_job['email'];
$empID = $r_job['userID'];

$queryResult = "INSERT INTO `jobresult` (userID, jobID, empID, jobTitle, studentName, employerCompany, studentEmail, employerEmail) VALUES ('$userID', '$jobID', '$empID', '$jobTitle', '$studentName', '$employerCompany', '$studentEmail', '$employerEmail')";
$result = mysqli_query($connection, $queryResult);
if($result){
	$DelSql = "DELETE FROM `jobapplication` WHERE userid = $userID AND jobid = $jobID";
	$res_del = mysqli_query($connection, $DelSql);
	if($res_del){
		header('location: application.php');
	}
}else{
	$fmsg = "Failed to Insert data.";
	print_r($result->error_list);
}

?>
