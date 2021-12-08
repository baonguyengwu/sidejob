<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sidejob/";

require_once($path . 'connect.php');

$id = $_GET['id'];
$DelSql = "DELETE FROM jobresult WHERE resultID=$id";
$res = mysqli_query($connection, $DelSql);
if($res){
	header('location: studentresult.php');
}else{
	echo "Failed to delete";
}
?>
