<?php
session_start();

if(session_id() == '' || !isset($_SESSION['sessionUsername'])) 
{
    // session isn't started
	$message = 'You were never logged in!';
	echo "<script type='text/javascript'>alert('$message');</script>";
	session_destroy();
	echo '<script>window.location.href = "index.php"</script>';
}
else
{
	$message = 'Logging out';
	unset($_SESSION['sessionUsername']);
	unset($_SESSION['sessionPassword']);
	session_destroy();
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo '<script>window.location.href = "index.php"</script>';
}

?>