<?php

session_start();

if(!isset($_SESSION["user_id"]))
{
	header("location:login.php");
}

include('database_connection.php');

include('function.php');

if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 {
  $image = '';
  if($_FILES["user_image"]["name"] != '')
  {
   $image = upload_image();
  }
  $statement = $connect->prepare("
   INSERT INTO restaurants (restaurant_name, restaurant_location, image) 
   VALUES (:restaurant_name, :restaurant_location, :image)
  ");
  $result = $statement->execute(
   array(
    ':restaurant_name' => $_POST["restaurant_name"],
    ':restaurant_location' => $_POST["restaurant_location"],
    ':image'  => $image
   )
  );
  if(!empty($result))
  {
   echo 'Data Inserted';
  }
 }
 if($_POST["operation"] == "Edit")
 {
  $image = '';
  if($_FILES["user_image"]["name"] != '')
  {
   $image = upload_image();
  }
  else
  {
   $image = $_POST["hidden_user_image"];
  }
  $statement = $connect->prepare(
   "UPDATE restaurants
   SET restaurant_name = :restaurant_name, restaurant_location = :restaurant_location, image = :image  
   WHERE id = :id
   "
  );
  $result = $statement->execute(
   array(
    ':restaurant_name' => $_POST["restaurant_name"],
    ':restaurant_location' => $_POST["restaurant_location"],
    ':image'  => $image,
    ':id'   => $_POST["user_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>