<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sidejob/";

require_once($path . 'connect.php');

$id = $_GET['id'];
$DelSql = "DELETE FROM users WHERE userID=$id";
$res = mysqli_query($connection, $DelSql);
if($res){
	header('location: userview.php');
}else{
	echo "Failed to delete";
}
?>
