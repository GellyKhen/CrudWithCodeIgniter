<?php

?>
<style type="text/css">
    #disp{
        display:none;
        border-radius: 50%;
        margin-left: 30%;
        margin-right: 30%;
    }
</style>
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Employee List</header>
                    <!-- DATA TABLE ADVANCED -->
                    <div class="panel-body">
                        <div class="adv-table">
                            <a type="button"class="btn btn-primary" data-toggle="modal" data-target="#AddModal" >ADD AN EMPLOYEE</a>
                            <button class="btn btn-success generatereport" >GENERATE REPORT</button>
                            <table class="table table-bordered table-striped table2excel"  id="_tblEmployee">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-user"></i>Employee ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Employee Classification</th>
                                        <th>Date Employed</th>
                                        <th>Employee Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfooter>
                                    <tr>
                                        <th><i class="fa fa-user"></i>Employee ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Employee Classification</th>
                                        <th>Date Employed</th>
                                        <th>Employee Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfooter>
                            </table>
                            <button class="exportToExcel">Export to XLS</button>
                        </div>
                        <!-- /DATA TABLE ADVANCED -->
                        <!-- GENERATE REPORT -->
                        <form method="post" enctype="multipart/form-data" id="_formGenerateReport" action="">
                            <div class="modal fade" id="GenerateReportModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h5 class="modal-title" id="exampleModalLabel">Generate Report</h5>
                                        </div>
                                        <div class="modal-body">
                                            <label for="_fileEmployeeImageaa" class="btn btn-default" id="disp" style="border-radius:50%; margin-left:25%;" title="CHANGE PROFILE PICTURE">
                                                <img id="_imgprevadd" src=""  alt="" height="200" width="200" style="margin: 10px 0 10px 0; object-fit:cover;  border-radius:50%">
                                            </label>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6 ml-auto">
                                                    <div class="form-group">
                                                        <label for="_dateFrommployeeEmployed">From Date Of Employment</label>
                                                        <i class="fa fa-calendar">
                                                        </i>
                                                        <input type="date" name="_dateFromEmployeeEmployed" id="_dateFromEmployeeEmployed" class="form-control">
                                                        <br />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ml-auto">
                                                    <div class="form-group">
                                                        <label for="_dateToEmployeeEmployed">To Date Of Employment</label>
                                                        <i class="fa fa-calendar">
                                                        </i>
                                                        <input type="date" name="_dateToEmployeeEmployed" id="_dateToEmployeeEmployed" class="form-control">
                                                        <br />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 ml-auto">
                                                    <div class="form-group">
                                                        <label for="_txtbxNameOfFile">Name Of File</label>
                                                        <i class="fa fa-file">
                                                        </i>
                                                        <input type="text" name="_txtbxNameOfFile" id="_txtbxNameOfFile" class="form-control">
                                                        <br />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                <input type="submit" name="_submitGenerateReport" id="_submitGenerateReport" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- /GENERATE REPORT -->
                        <!-- Add Employee -->
                        <form method="post" enctype="multipart/form-data" id="_formAddEmployee" action="">
                            <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h5 class="modal-title" id="exampleModalLabel">Add An Employee</h5>
                                        </div>
                                        <div class="modal-body">
                                            <label for="_fileEmployeeImageaa" class="btn btn-default" id="disp" style="border-radius:50%; margin-left:25%;" title="CHANGE PROFILE PICTURE">
                                                <img id="_imgprevadd" src=""  alt="" height="200" width="200" style="margin: 10px 0 10px 0; object-fit:cover;  border-radius:50%">
                                            </label>
                                            <br>
                                            <div class="form-group">
                                                <label for="_fileEmployeeImage">Employee Picture</label>
                                                <input type="file" name="_fileEmployeeImage" id="_fileEmployeeImage" class="form-control">
                                                <br />
                                                <label for="_txtbxFirstName">First Name</label>
                                                <input type="text" name="_txtbxFirstName" id="_txtbxFirstName" class="form-control" />
                                                <br />
                                                <label for="_txtbxLastName">Last Name</label>
                                                <input type="text" name="_txtbxLastName" id="_txtbxLastName" class="form-control" />
                                                <br />
                                                <label for="_txtbxEmployeeClassification">Employee Classification</label>
                                                <input type="text" name="_txtbxEmployeeClassification" id="_txtbxEmployeeClassification" class="form-control" />
                                                <br />
                                                <label for="_dateEmployeeEmployed">Date Of Employment</label>
                                                <i class="fa fa-calendar">
                                                </i>
                                                <input type="date" name="_dateEmployeeEmployed" id="_dateEmployeeEmployed" class="form-control">
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
                            </div>
                        </form>
                        <!-- /Add Employee -->
                        <!-- Edit Employee -->
                        <form method="post" enctype="multipart/form-data" id="_formEditEmployee"> 
                            <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">EDIT EMPLOYEE</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>

                                        <div class="modal-body"  id="editEmployeeDetails">

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
                                            <label for="_dateEmployeeEmployed">Date Of Employment</label>
                                            <i class="fa fa-calendar">
                                            </i>
                                            <input type="date" name="_dateEmployeeEmployed" id="_dateEmployeeEmployed" class="form-control">
                                            <br />
                                            <input type="hidden" name="_hiddenImage" id="_hiddenImage" value="">
                                            <input type="hidden" name="_hiddenID" id="_hiddenID" value="" >

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                            <input type="submit" name="_submitEdit" id="_submitEdit" class="btn btn-primary" value="Update">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                        <!-- </form> -->
                        <!-- /Edit Employee -->
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>


  

<script type="text/javascript">
    $(function(){
        let base_url = '<?php echo base_url(); ?>';
        let error = "<?php echo isset($_SESSION['error']) ? $_SESSION['error'] : ''; ?>";
        let id;
        let employee_id;
        let dataTable = $('#_tblEmployee').DataTable({
            "deferRender": true,
            "serverSide": true,
            "ajax": {
                url: base_url+"index.php/Employee/dataEmployeeMSSQL",
                type: 'GET',

                data : function(d){
                }
            },
            "language": {
                search: '',
                searchPlaceholder: "Search..."
            },
            "iDisplayLength": 50,
            "aaSorting": [[ 1, "desc" ]],
        });
        // CODES BELOW ARE FOR MY SQL MEANWHILE ABOVE IS FOR MS SQL
        // let dataTable = $('#_tblEmployee').DataTable({
        //     "processing" : true,
        //     "deferRender": true,
        //     "serverSide" : true,
        //     "order" : [],
        //     "ajax" : {
        //         url:"employee/dataEmployeeMYSQL",
        //      type:"POST"
        //  }
        // });  

        $(".generatereport").click(function(e){
            $(`#GenerateReportModal`).modal("show");
        });
        $(".exportToExcel").click(function(e){
            $("#_tblEmployee").table2excel({
                exclude: ".noExl",
                name: "Worksheet Name",
                filename: "SomeFile",
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true
            }); 
        });
        $('#_formGenerateReport').on('submit', function() {
            formData = new FormData($(this)[0);
            $.ajax({
                type: 'POST'
                , url: '<?php echo base_url(); ?>index.php/Employee/generateReportEmployee'
                , data : formData
                , processData: false
                , contentType: false
                , success: function(data){
                    if (data == 0) 
                    {
                        alert('success');
                        $(`#_formGenerateReport`).trigger("reset");
                        $('#GenerateReportModal').modal('hide');
                        dataTable.ajax.reload();
                    } 
                    else 
                    {
                        alert(data);
                    }
                } 
            });
            return false;

        }); 
        $(document).on("click", ".btn-edit", function() {
            employee_id = $(this).data(`id`);
            $.post(`<?php echo base_url(); ?>index.php/Employee/toEditEmployee`, { employee_id: employee_id }, data=>
            {
                $(`#_formEditEmployee input[name=_hiddenID]`).val(data.employee_id);
                $(`#_imgprev`).attr('src', `<?php echo base_url()?>/uploads/${data.employee_image}`);
                $(`#_formEditEmployee input[name=_hiddenImage]`).val(data.employee_image);
                $(`#_formEditEmployee input[name=_txtbxFirstName]`).val(data.first_name);
                $(`#_formEditEmployee input[name=_txtbxLastName]`).val(data.last_name);
                $(`#_formEditEmployee input[name=_txtbxEmployeeClassification]`).val(data.employee_classification);
                $(`#_formEditEmployee input[name=_dateEmployeeEmployed]`).val(data.date_of_employment);
                $(`#EditModal`).modal("show");
            },'json');
            return false;
        });
        $(document).on('click', ".btn-delete", function() {

            if(confirm('do you want to delete this employee?'))
            {
                let id = $(this).data(`id`);
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/Employee/deleteEmployee",
                    type: "POST",

                    data: {
                        id: id,
                    },success: function(data){
                        if (data == 0) {
                            alert('success');
                            dataTable.ajax.reload();
                        } else {
                            alert('Did Not Insert');
                        }
                    } 
                }); 
                return false;
            }  
        });

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
                            dataTable.ajax.reload();
                        } 
                        else 
                        {
                            alert(data);
                        }
                    } 
                });
                return false;
            }    
        }); 

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
                            dataTable.ajax.reload();
                        } else {
                            alert('Fail');
                        }
                    }
                });
                return false;
            }
        }); 

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
            document.getElementById("disp").style.display = "block";
            readURL2(this);
        });     
    }); 

</script>

</body>
</html>


