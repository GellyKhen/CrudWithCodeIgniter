<?php
include("sqlconnection.php");
$id = $_POST['_hiddenID'];
$first_name = $_POST['_txtbxFirstName'];
$last_name = $_POST['_txtbxLastName'];
$employee_classification = $_POST['_txtbxEmployeeClassification'];
$imagefilename = $_POST['_hiddenImage'];
$target_fileupload = "";
if(isset($_FILES['_fileEmployeeImageEdit']))
{
	
	$target_fileupload = basename($_FILES["_fileEmployeeImageEdit"]["name"]);

	$queryAdd = "UPDATE `employee` SET `first_name` = '$first_name', `last_name` = '$last_name', `employee_classification` = '$employee_classification', `employee_image` = '$target_fileupload' WHERE `employee`.`employee_id` = $id";

	mysqli_query($connect, $queryAdd);


	// echo"<script>console.log('1');</script>";
	$target_dir = "uploads/";
	$target_fileupload = basename($_FILES["_fileEmployeeImageEdit"]["name"]);
	// echo"<script>console.log('".$target_fileupload."');</script>";
	$target_file = $target_dir . $target_fileupload;
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


	
	if (file_exists($target_file)) {
		$uploadOk = 0;
		$path = './uploads/'.$imagefilename.'';
		unlink($path);	
	}
	echo 0;
	// $check = getimagesize($_FILES["_fileEmployeeImage"]["tmp_name"]);
	// if($check !== false) {

	// 	$uploadOk = 1;
	// } else {
	// 	$uploadOk = 0;
	// }
	move_uploaded_file($_FILES["_fileEmployeeImageEdit"]["tmp_name"], $target_file);
} // end of if
else
{
	// echo"<script>console.log('2');</script>";
	//Else if there is no image
	$queryAdd = "UPDATE `employee` SET `first_name` = '$first_name', `last_name` = '$last_name', `employee_classification` = '$employee_classification' WHERE `employee`.`employee_id` = $id";
	mysqli_query($connect, $queryAdd);
}


// if ($_FILES['_fileEmployeeImage']['size'] == 0 && $_FILES['_fileEmployeeImage']['error'] == 0)
// {
// 	$queryAdd = "UPDATE `employee` SET `first_name` = '$first_name', `last_name` = '$last_name', `employee_classification` = '$employee_classification' WHERE `employee`.`employee_id` = $id";
// 	mysqli_query($connect, $queryAdd);
// }
// else
// {

// }






?>

