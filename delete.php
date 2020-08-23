<?php

session_start();

if(!isset($_SESSION["user_id"]))
{
	header("location:login.php");
}

include('database_connection.php');

include('function.php');

if(isset($_POST["user_id"]))
{
 $image = get_image_name($_POST["user_id"]);
 if($image != '')
 {
  unlink("upload/" . $image);
 }
 $statement = $connect->prepare(
  "DELETE FROM restaurants WHERE id = :id"
 );
 $result = $statement->execute(
  array(
   ':id' => $_POST["user_id"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Data Deleted';
 }
}



?>
   