<?php
$connection = mysqli_connect('localhost', 'root', '3leEOp33nKqz');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'sidejob');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
