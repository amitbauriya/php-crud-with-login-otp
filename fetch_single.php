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
 $output = array();
 $statement = $connect->prepare(
  "SELECT * FROM restaurants 
  WHERE id = '".$_POST["user_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["restaurant_name"] = $row["restaurant_name"];
  $output["restaurant_location"] = $row["restaurant_location"];
  if($row["image"] != '')
  {
   $output['user_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
  }
  else
  {
   $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
  }
 }
 echo json_encode($output);
}
?>