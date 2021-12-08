<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sidejob/";

require_once($path . 'connect.php');

$resultID = $_GET['resultID'];
$DelSql = "DELETE FROM `jobresult` WHERE resultID = $resultID";
$res = mysqli_query($connection, $DelSql);
if($res){
	header('location: /sidejob/index.php');
}else{
	echo "Failed to delete";
}
?>
