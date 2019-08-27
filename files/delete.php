<?php
$id = $_POST['id'];
include("sqlconnection.php");

$querySelecting = "SELECT * FROM `employee` WHERE `employee`.`employee_id` = $id";
$resultSelecting = mysqli_query($connect, $querySelecting);
while ($row = mysqli_fetch_array($resultSelecting)) {
	$employee_image = $row['employee_image'];
}

$path = './uploads/'.$employee_image.'';
unlink($path);	


$queryAdd = "DELETE FROM `employee` WHERE `employee`.`employee_id` = $id ";
mysqli_query($connect, $queryAdd);

// $message = "Burado na";
// echo "<script>alert('$message');</script>";
// echo "<script>location.href = 'index.php';</script>";
?>