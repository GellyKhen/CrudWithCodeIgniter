<?php
include("sqlconnection.php");
$id = $_POST['employee_id'];
$queryEmployeeParticular = "SELECT * FROM employee WHERE employee_id = $id";
$resultEmployeeParticular = mysqli_query($connect, $queryEmployeeParticular); 
while($res = mysqli_fetch_array($resultEmployeeParticular))  
{  
	?>
	<label>First Name</label>
	<input type="text" name="_txtbxViewFirstName" id="_txtbxViewFirstName" class="form-control" value="<?php echo $res['first_name'] ?>"readonly/>
	<br />
	<label>Last Name</label>
	<input type="text" name="_txtbxViewLastName" id="_txtbxViewLastName" class="form-control" value="<?php echo $res['last_name'] ?>" readonly/>
	<br />
	<label>Employee Classification</label>
	<input type="text" name="_txtbxViewEmployeeClassification" id="_txtbxViewEmployeeClassification" class="form-control" value="<?php echo $res['employee_classification'] ?>" readonly/>
	<br />
<?php
}
?>