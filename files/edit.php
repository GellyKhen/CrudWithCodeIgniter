<?php
include("sqlconnection.php");
$employee_id = $_POST['employee_id'];
$queryEmployeeParticularly = "SELECT * FROM employee WHERE employee_id = $employee_id";
$resultEmployeeParticularly = mysqli_query($connect, $queryEmployeeParticularly); 
// while($res1 = mysqli_fetch_array($resultEmployeeParticularly))  
// {  

// }
if(mysqli_num_rows($resultEmployeeParticularly))
	{
		$row = mysqli_fetch_object($resultEmployeeParticularly);		
		$data = array(
			'employee_id' => $row->employee_id
			, 'first_name' => $row->first_name
			, 'last_name' => $row->last_name
			, 'employee_classification' => $row->employee_classification
			, 'employee_image' => $row->employee_image
		);
		echo json_encode($data);
	}