<?php

//database_connection.php
global $connect;
$connect = new PDO("mysql:host=localhost;dbname=mydbname", "mydbuser", "mydbpassword");

?>
