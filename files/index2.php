<!DOCTYPE html>
<html>
<head>
	<?php 
	include("sqlconnection.php");
	?>
<!-- 	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<title>C R U D</title>
	<h1>EMPLOYEE LIST</h1>
	<style type="text/css">
		#_formAddEmployee input
		{
			margin-bottom: 10px;
		}
	</style>
</head>
<body>

	<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">
		ADD AN EMPLOYEE
	</a>
	<!-- Add Employee -->
	<form method="post" enctype="multipart/form-data" id="_formAddEmployee">
		<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add An Employee</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<label>First Name</label>
						<input type="text" name="_txtbxFirstName" id="_txtbxFirstName" class="form-control" />
						<br />
						<label>Last Name</label>
						<input type="text" name="_txtbxLastName" id="_txtbxLastName" class="form-control" />
						<br />
						<label>Employee Classification</label>
						<input type="text" name="_txtbxEmployeeClassification" id="_txtbxEmployeeClassification" class="form-control" />
						<br />
						<label>Employee Picture</label>
						<input type="file" name="_fileEmployeeImage" id="_fileEmployeeImage" class="form-control">
						<br />
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
						<input type="submit" name="_submitAdd" id="_submitAdd" class="btn btn-primary">
					</div>
				</div>
			</div>
		</div>
	</form>
	
	<!-- /Add Employee -->
	
	<table class="table table-stripped">
		<thead>
			<tr>
				<th></th>
				<th>Employee ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Employee Classification</th>
				<th>Employee Image</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$queryEmployee = "SELECT * FROM employee";
			$resultEmployee = mysqli_query($connect, $queryEmployee); 
			while($row = mysqli_fetch_array($resultEmployee))  
			{  
				$id = $row['employee_id'];
				?>  
				<tr>
					<td>
						<a class="btn btn-default btn-info btn-view" href="#viewModal<?php echo $row['employee_id'];?>" type="button" title="View" id="<?php echo $row['employee_id'];?>" data-toggle="modal"> <i class="fa fa-list"></i></a> 

						<button class="btn btn-default btn-warning btn-edit" type="button" title="Edit" id="<?php echo $row['employee_id'];?>"> <i class="fa fa-edit"></i></button>

						<a title="Delete" class="btn btn-danger" title="Delete" href="delete.php?id=<?php echo $row['employee_id']; ?>" onClick="return confirm('Are you sure you want to delete?')"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
					<td><?php echo $row['employee_id']; ?></td>
					<td><?php echo $row['first_name']; ?></td>
					<td><?php echo $row['last_name']; ?></td>
					<td><?php echo $row['employee_classification']; ?></td>
					<td><img src="<?php echo $row['employee_image'] ?>" alt="Employee Image" style="width:200px;height:200px;object-fit: cover;"></td>
				</tr>
				<?php
			}
			?>
			<!--  -->
		</tbody>
	</table>
	<!-- View Employee -->
	<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="ViewModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">VIEW EMPLOYEE</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body"  id="employeeDetails">
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
						<!-- <input type="submit" name="_submitAdd" class="btn btn-primary"> -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- /View Employee -->
	<!-- Edit Employee -->
	<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">EDIT EMPLOYEE</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body"  id="editEmployeeDetails">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
					<input type="submit" name="_submitEdit" id="_submitEdit" class="btn btn-primary" value="Update">
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Employee -->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
	$(document).ready(function(){
		$(document).on('click','.btn-view',function(){
			var employee_id = $(this).attr("id");
			$.ajax({
				url:"view.php",
				method:"post",
				data:{employee_id:employee_id},
				success:function(data){
					$('#employeeDetails').html(data);
					$('#ViewModal').modal('show');
				}
			});
		});
		$(document).on('click','.btn-edit',function(){
			var employee_id = $(this).attr("id");
			$.ajax({
				url:"edit.php",
				method:"post",
				data:{employee_id:employee_id},
				success:function(data){
					$('#editEmployeeDetails').html(data);
					$('#EditModal').modal('show');
				}
			});
		});

		$('#_formAddEmployee').on('submit', function() {
				// $("#butsave").attr("disabled", "disabled");
				// let FormData = new FormData($(this)[0]);
				if(confirm('do you want to add this employee?'))
				{
					let first_name = $('#_txtbxFirstName').val();
					let last_name = $('#_txtbxLastName').val();
					let employee_classification = $('#_txtbxEmployeeClassification').val();
					// let employee_image = $('#_fileEmployeeImage').val();
					$.post(`save.php`, 
					{
						first_name: first_name,
						last_name: last_name,
						employee_classification: employee_classification 
					}
					, function(data) 
					{
						if (data == 0) 
						{
							alert('success');
							$('#AddModal').modal('hide');
							$('#_txtbxFirstName').val("");
							$('#_txtbxLastName').val("");
							$('#_txtbxEmployeeClassification').val("");
							window.location.reload();
						}
						else
						{
							alert('FAil');
						}
					},'json')

					$.ajax({
						url: "save.php",
						type: "POST",
						// data: FormData,
						data: {
							first_name: first_name,
							last_name: last_name,
							employee_classification: employee_classification
							// employee_image: employee_image
						},
						success: function(data){
							if (data == 0) {
								alert('success');
								$('#AddModal').modal('hide');
								$(`#_formAddEmployee`).trigger("reset");
								// $('#_txtbxFirstName').val("");
								// $('#_txtbxLastName').val("");
								// $('#_txtbxEmployeeClassification').val("");
								// $('#_fileEmployeeImage').val("");
								window.location.reload();
							}
							else
							{
								alert('FAil');
							}
						} //End Of Successs: function(data)
					}); //End of ajax
					return false;
				} //End of If confirm		



				$('#_submitEdit').on('click', function() {
				// $("#butsave").attr("disabled", "disabled");
				var id = $('#_hiddenEditID').val();
				if(confirm('Confirm Editing Employee'))
				{
					var first_name = $('#_txtbxEditFirstName').val();
					var last_name = $('#_txtbxEditLastName').val();
					var employee_classification = $('#_txtbxEditEmployeeClassification').val();
					$.ajax({
						url: "update.php",
						type: "POST",
						data: {
							id: id,
							first_name: first_name,
							last_name: last_name,
							employee_classification: employee_classification
						},
						success: function(data){
							if (data == 0) {
								alert('success');
								$('#EditModal').modal('hide');
								$('#_txtbxEditFirstName').val("");
								$('#_txtbxEditLastName').val("");
								$('#_txtbxEditEmployeeClassification').val("");
								window.location.reload();
							}
							else
							{
								alert('Fail');
							}
						}
					});
					return false;
				}
			});




			});
		</script>

<!-- <script>
	$(document).ready(function() {
		
	});
</script> -->

</html>