<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sidejob/";

require_once($path . 'connect.php');

$userid = $_GET['userid'];
$jobid = $_GET['jobid'];
$DelSql = "DELETE FROM `jobapplication` WHERE userid = $userid AND jobid = $jobid";
$res = mysqli_query($connection, $DelSql);
if($res){
	header('location: application.php');
}else{
	echo "Failed to delete";
}
?>
