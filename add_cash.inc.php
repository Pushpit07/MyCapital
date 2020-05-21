<?php 

$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn, 'MyCapital');

session_start();

$username = $_SESSION["username"];
$query = mysqli_query ($conn, "SELECT id FROM users WHERE username ='$username'");
$row = mysqli_fetch_array($query);
$user_id = $row["id"];

$date1	= $_POST['date1'];
$source	= $_POST['source'];
$sum1	= $_POST['sum1'];


$sql = "UPDATE users SET balance= balance + $sum1 WHERE id='$user_id';";
mysqli_query($conn, $sql);

header("Location: header.php");
?>