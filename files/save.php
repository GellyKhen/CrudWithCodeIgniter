<?php
include("sqlconnection.php");
//posting firstname - employeeclassification
$first_name = $_POST['_txtbxFirstName'];
$last_name = $_POST['_txtbxLastName'];
$employee_classification = $_POST['_txtbxEmployeeClassification'];

$target_dir = "uploads/";
$target_fileupload = basename($_FILES["_fileEmployeeImage"]["name"]);
$target_file = $target_dir . $target_fileupload;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$check = getimagesize($_FILES["_fileEmployeeImage"]["tmp_name"]);
	if($check !== false) {

		$uploadOk = 1;
	} else {

		$uploadOk = 0;
	}
if (file_exists($target_file)) {

	$uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	
// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["_fileEmployeeImage"]["tmp_name"], $target_file)) {

	} else {

	}
}


$queryAdd = "INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `employee_classification`, `employee_image`) VALUES (NULL, '$first_name', '$last_name', '$employee_classification', '$target_fileupload')";
mysqli_query($connect, $queryAdd);
?>


<?php
// //setting directory upload for image and checking if it's okay
// $target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["employee_image"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// $check = getimagesize($_FILES["employee_image"]["tmp_name"]);
// 	if($check !== false) {
// 		echo "File is an image - " . $check["mime"] . ".";
// 		$uploadOk = 1;
// 	} else {
// 		echo "File is not an image.";
// 		$uploadOk = 0;
// 	}
// if (file_exists($target_file)) {
// 	echo "Sorry, file already exists.";
// 	$uploadOk = 0;
// }


// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
	
// }
// // Check if file already exists

// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
// 	echo "Sorry, your file is too large.";
// 	$uploadOk = 0;
// }
// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// 	&& $imageFileType != "gif" ) {
// 	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
// $uploadOk = 0;
// }
// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
// 	echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
// 	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
// 		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
// 	} else {
// 		echo "Sorry, there was an error uploading your file.";
// 	}
// }
?>