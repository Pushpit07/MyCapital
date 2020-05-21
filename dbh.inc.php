<?php

$servername = "us-cdbr-east-06.cleardb.net";
$dbUsername = "b4f40b3662d6a7";
$dbPassword = "4ee6b859";
$dbName = "heroku_0ae366c24d3c517";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$conn){
	die("Connection failed: ".mysqli_connect_error());
}
?>
