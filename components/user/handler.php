<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sidejob/";
require_once ($path . 'connect.php');

// php code to Update data from mysql database Table

session_start();

if(isset($_POST['submit']))
{
   // get values form input text and number

   $email = $_POST['email'];

   $new_password = $_POST['new_password'];

   // mysql query to Update data
   $query = "UPDATE `users` SET `password`='".password_hash($new_password, PASSWORD_DEFAULT)."' WHERE `email`= '".$email."'";

   $result = mysqli_query($connection, $query);

   if($result == true)
   {
      echo 'Password is updated';
      header('location:login.php');
   }else{
      echo 'Data Not Updated';
      header('location:index.php');
   }
   mysqli_close($mysqli);
}
?>
