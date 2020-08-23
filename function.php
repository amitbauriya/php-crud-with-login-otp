<?php

//function.php
include('database_connection.php');

function make_avatar($character)
{
    $path = "avatar/". time() . ".png";
	$image = imagecreate(200, 200);
	$red = rand(0, 255);
	$green = rand(0, 255);
	$blue = rand(0, 255);
    imagecolorallocate($image, $red, $green, $blue);  
    $textcolor = imagecolorallocate($image, 255,255,255);  

    imagettftext($image, 100, 0, 55, 150, $textcolor, 'font/arial.ttf', $character);  
    //header("Content-type: image/png");  
    imagepng($image, $path);
    imagedestroy($image);
    return $path;
}

function Get_user_avatar($user_id, $connect)
{
	$query = "
	SELECT user_avatar FROM register_user 
    WHERE register_user_id = '".$user_id."'
	";

	$statement = $connect->prepare($query);

	$statement->execute();

	$result = $statement->fetchAll();

	foreach($result as $row)
	{
		echo '<img src="'.$row["user_avatar"].'" width="75" class="img-thumbnail img-circle" />';
	}
}

function upload_image()
{
 if(isset($_FILES["user_image"]))
 {
  $extension = explode('.', $_FILES['user_image']['name']);
  $new_name = rand() . '.' . $extension[1];
  $destination = './upload/' . $new_name;
  move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
  return $new_name;
 }
}

function get_image_name($user_id)
{
 global $connect;
 $statement = $connect->prepare("SELECT image FROM restaurants WHERE id = '$user_id'");
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row["image"];
 }
}

function get_total_all_records()
{
 global $connect;
 $statement = $connect->prepare("SELECT * FROM restaurants");
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}

?>