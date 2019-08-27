<?php

?>
<!-- main content start -->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Employee List
            </header>
            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">
                ADD AN EMPLOYEE
            </a>
            <!-- Add Employee -->
            <form method="post" enctype="multipart/form-data" id="_formAddEmployee" action="">
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
                    <label for="_fileEmployeeImageaa" class="btn btn-default" style="border-radius:50%; margin-left:25%;" title="CHANGE PROFILE PICTURE">
                      <img id="_imgprevadd" src=""  alt="" height="200" width="200" style="margin: 10px 0 10px 0; object-fit:cover;  border-radius:50%">
                  </label>
                  <br>
                  <label>Employee Picture</label>
                  <input type="file" name="_fileEmployeeImage" id="_fileEmployeeImage" class="form-control">
                  <br />
                  <label>First Name</label>
                  <input type="text" name="_txtbxFirstName" id="_txtbxFirstName" class="form-control" />
                  <br />
                  <label>Last Name</label>
                  <input type="text" name="_txtbxLastName" id="_txtbxLastName" class="form-control" />
                  <br />
                  <label>Employee Classification</label>
                  <input type="text" name="_txtbxEmployeeClassification" id="_txtbxEmployeeClassification" class="form-control" />
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
<!-- Table --> 
<table class="table table-striped table-advance table-hover" id="_tblEmployee">
    <thead>
      <tr>
        <th><i class="fa fa-user"></i>Employee ID</th>
        <th> First Name</th>
        <th>Last Name</th>
        <th>Employee Classification</th>
        <th>Employee Image</th>
        <th></th>
    </tr>
</thead>
<tbody>

</tbody>
</table>
<!-- /Table -->
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
    <form method="post" enctype="multipart/form-data" id="_formEditEmployee"> 
      <label for="_fileEmployeeImageaa" class="btn btn-default" style="border-radius:50%; margin-left:25%;" title="CHANGE PROFILE PICTURE">
        <img id="_imgprev" src=""  alt="" height="200" width="200" style="margin: 10px 0 10px 0; object-fit:cover;  border-radius:50%">
    </label>
    <br>
    <input type="file" id="_fileEmployeeImageEdit" name="_fileEmployeeImageEdit" accept="image/*" class="form-control" >
    <br />
    <label>First Name</label>
    <input type="text" name="_txtbxFirstName" id="_txtbxFirstName" class="form-control" value="" />
    <br />
    <label>Last Name</label>
    <input type="text" name="_txtbxLastName" id="_txtbxLastName" class="form-control" value=""  />
    <br />
    <label>Employee Classification</label>
    <input type="text" name="_txtbxEmployeeClassification" id="_txtbxEmployeeClassification" class="form-control" value=""  />
    <br />

    <input type="hidden" name="_hiddenImage" id="_hiddenImage" value="">
    <input type="hidden" name="_hiddenID" id="_hiddenID" value="" >

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
  <input type="submit" name="_submitEdit" id="_submitEdit" class="btn btn-primary" value="Update">

</div>
</form>
</div>
</div>
</div>
<!--           </form> -->
<!-- /Edit Employee -->

</section>
</div>
</div>
<!-- page end-->
</section>
</section>


<script type="text/javascript">

    $(function(){

        var error = "<?php echo isset($_SESSION['error']) ? $_SESSION['error'] : ''; ?>";
        let id;
        let employee_id;
        let getdata = _=>
        {
            $.post(`dataEmployee`, function(data)
            {
                let row = '';
                $(`#_tblEmployee tbody`).html("");

                data.tbl.forEach((result)=>
                {
                    row +=`<tr>
                    <td>${result.EmployeeID}</td>
                    <td>${result.FirstName}</td>
                    <td>${result.LastName}</td>
                    <td>${result.Classification}</td>
                    <td><img src="<?php echo base_url()?>uploads/${result.Image}" alt="Employee Image" style="width:200px;height:200px;object-fit: cover;"></td>
                    <td>
                    <button class="btn btn-default btn-warning btn-edit" type="button" title="Edit" id="${result.EmployeeID}" data-id="${result.EmployeeID}"> <i class="fa fa-edit"></i></button>

                    <button class="btn btn-default btn-danger btn-delete" type="button" title="Delete" id="${result.EmployeeID}" data-id="${result.EmployeeID}"> <i class="fa fa-trash-o"></i></button>
                    </td>
                    </tr>`;
                });
                $(`#_tblEmployee tbody`).html(row);
                
            },'json');
            return false;
        }
        // End oF Get Data
        getdata();
        $(document).on("click", ".btn-edit", function() {
            employee_id = $(this).data(`id`);

            $.post(`<?php echo base_url(); ?>index.php/Employee/toEditEmployee`, { employee_id: employee_id }, data=>
            {
                // alert(data.first_name);
                $(`#_formEditEmployee input[name=_hiddenID]`).val(data.employee_id);
                $(`#_imgprev`).attr('src', `<?php echo base_url()?>/uploads/${data.employee_image}`);
                $(`#_formEditEmployee input[name=_hiddenImage]`).val(data.employee_image);
                $(`#_formEditEmployee input[name=_txtbxFirstName]`).val(data.first_name);
                $(`#_formEditEmployee input[name=_txtbxLastName]`).val(data.last_name);
                $(`#_formEditEmployee input[name=_txtbxEmployeeClassification]`).val(data.employee_classification);
                $(`#EditModal`).modal("show");
            },'json');
            return false;
        }); //(END OF FUNCTION) EDIT MODAL SHOW
        $(document).on('click', ".btn-delete", function() {

            if(confirm('do you want to delete this employee?'))
            {
                let id = $(this).data(`id`);
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/Employee/deleteEmployee",
                    type: "POST",
                    // data: FormData,
                    data: {
                      id: id,
                      // employee_image: employee_image
                  },success: function(data){
                    if (data == 0) {
                        alert('success');
                        getdata();
                            // window.location.reload();
                        } else {
                            alert('Did Not Insert');
                        }
                    } //End Of Successs: function(data)
              }); //End of ajax
                return false;
            } //End of If confirm   
        }); //(END OF FUNCTION) DELETE BUTTON

        $('#_formAddEmployee').on('submit', function() {
            if(confirm('do you want to add this employee?'))
            {
                formData = new FormData( $(this)[0] );
                $.ajax({
                    type: 'POST'
                    , url: '<?php echo base_url(); ?>index.php/Employee/addEmployee'
                    , data : formData
                    , processData: false
                    , contentType: false
                    , success: function(data){
                        if (data == 0) 
                        {
                            alert('success');
                            $(`#_formAddEmployee`).trigger("reset");
                            $('#AddModal').modal('hide');
                            getdata();
                            // window.location.reload();
                        } 
                        else 
                        {
                            alert(data);
                        }
                    } //End Of Successs: function(data)
                }); //End of ajax
                return false;
            } //End of If confirm    
        }); //(END OF FUNCTION) SUBMITTING ADD

        $('#_formEditEmployee').on('submit', function() {
            let id = $('#_hiddenID').val();
            if(confirm('You sure you want to update this employee?'))
            {
              formData = new FormData( $(this)[0] );
              formData.append("id", employee_id);
              $.ajax({
                type: 'POST'
                , url: '<?php echo base_url(); ?>index.php/Employee/editEmployee'
                , data : formData
                , processData: false
                , contentType: false
                , success: function(data){
                    if (data == 0) {
                        alert('Successfully Updated');
                        $('#EditModal').modal('hide');
                        getdata();
                        // window.location.reload();
                    } else {
                        alert('Fail');
                    }
                }
            });
              return false;
          }
        }); //(END OF FUNCTION) SUBMITTING EDIT

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#_imgprev').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#_fileEmployeeImageEdit").change(function(){
            readURL(this);
        });   
        function readURL2(input) {
            if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function(e)
              {
                $('#_imgprevadd').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#_fileEmployeeImage").change(function()
    {
        readURL2(this);
    });     
}); // end of function
</script>

</body>
</html>


