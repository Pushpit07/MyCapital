<?php 

$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn, 'MyCapital');

session_start();

$username = $_SESSION["username"];
$query = mysqli_query ($conn, "SELECT id FROM users WHERE username ='$username'");
$row = mysqli_fetch_array($query);
$user_id = $row["id"];

$date2	= $_POST['date2'];
$sum2	= $_POST['sum2'];


$sql = "UPDATE users SET savings= $sum2 WHERE id='$user_id';";
mysqli_query($conn, $sql);

header("Location: add_savings.php");
?>