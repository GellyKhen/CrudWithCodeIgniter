<?php
session_start();
include('sqlconnection.php');

$username = $_POST['_txtbxUsername'];
$password = $_POST['_txtbxPassword'];
$queryAccount = "SELECT * FROM admin WHERE admin_username LIKE '$username' AND admin_password LIKE '$password' ";
$resultAccount = mysqli_query($connect, $queryAccount);

while($res = mysqli_fetch_array($resultAccount)) 
{
	$username = $res['admin_username'];
	$password = $res['admin_password'];
}
if (mysqli_num_rows($resultAccount) == 1) 
{
	$_SESSION['sessionUsername'] = $username;
	$_SESSION['sessionPassword'] = $password;
	// header('location: index.php');
	$message = 'Welcome, '.$username.'';
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo '<script>window.location.href = "dashboard.php"</script>';
}
else 
{
	$message = "No account matches the given information";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo '<script>window.location.href = "index.php"</script>';
}
?>
