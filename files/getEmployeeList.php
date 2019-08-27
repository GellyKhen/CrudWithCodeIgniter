	<?php
	include('sqlconnection.php');
	$sql = "SELECT * FROM employee";
	$queryresult = mysqli_query($connect, $sql)or die('Error in query: ' .mysql_error());
	$data['tbl'] = [];
	// $data['tbl2'] = [];
	if(mysqli_num_rows($queryresult))
	{
		while($row = mysqli_fetch_object($queryresult))
		{
			// echo "<tr>";
			// echo "<td>".ucwords($row->test_name)."</td>";
			// echo "<td>".ucwords($row->test_age)."</td>";
			// echo "<td>".ucwords($row->test_address)."</td>";
			// echo "<td><form method='post'><input name='id' type='hidden' value='".ucwords($row->test_ID)."'><input type='submit' name='btn-delete' value='Delete'>&nbsp;<input type='submit' name='btn-edit' value='Edit'></form></td>";
			// echo "</tr>";
			// $data[] = array(
			// 	'id' => $row->test_ID
			// 	, 'name' => $row->test_name
			// 	, 'age' => $row->test_age
			// 	, 'address' => $row->test_address
			// );

			$data['tbl'][] = array(
				'employee_id' => $row->employee_id
				, 'first_name' => $row->first_name
				, 'last_name' => $row->last_name
				, 'employee_classification' => $row->employee_classification
				, 'employee_image' => $row->employee_image
			);
			// $data['tbl2'][] = array(
			// 	'id' => $row->test_ID
			// 	, 'name' => $row->test_name.' 2'
			// 	, 'age' => $row->test_age
			// 	, 'address' => $row->test_address
			// );
		}
		echo json_encode($data);
	}