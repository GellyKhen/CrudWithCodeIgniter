<?php
require("sqlconnection.php");
require("header.php");
require("sidebar.php");
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
              <!-- <tr>
                <td><a href="#">Vector Ltd</a></td>
                <td class="hidden-phone">Lorem Ipsum dorolo imit</td>
                <td>12120.00$ </td>
                <td><span class="label label-info label-mini">Due</span></td>
                <td>
                  <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                </td>
              </tr>
              <tr>
                <td>
                  <a href="#">
                    Adimin co
                  </a>
                </td>
                <td class="hidden-phone">Lorem Ipsum dorolo</td>
                <td>56456.00$ </td>
                <td><span class="label label-warning label-mini">Due</span></td>
                <td>
                  <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                </td>
              </tr> -->
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
          <!--           <form  id="edit-modal"> -->
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
                      <input type="file" id="_fileEmployeeImageEdit" name="_fileEmployeeImageEdit" accept="image/*" >
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
                     <!--  <label>Employee Picture</label>
                      <input type="file" name="_fileEmployeeImage" id="_fileEmployeeImage" class="form-control">
                      <br /> -->
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



  <!--main content end-->
  <!--main content end-->
  <?php
  require("footer.php");
  ?>

  <script type="text/javascript">
    $(function()
    {
      let id;
      let getdata = _=>{
        $.post(`getEmployeeList.php`, function(data)
        {
          let row = '';
          data.tbl.forEach((result)=>
          {
            row += 
            `<tr>
            <td>${result.employee_id}</td>
            <td>${result.first_name}</td>
            <td>${result.last_name}</td>
            <td>${result.employee_classification}</td>
            <td><img src="./uploads/${result.employee_image}" alt="Employee Image" style="width:200px;height:200px;object-fit: cover;"></td>
            <td>

            <button class="btn btn-default btn-warning btn-edit" type="button" title="Edit" id="${result.employee_id}" data-id="${result.employee_id}"> <i class="fa fa-edit"></i></button>

            <button class="btn btn-default btn-danger btn-delete" type="button" title="Delete" id="${result.employee_id}" data-id="${result.employee_id}"> <i class="fa fa-trash-o"></i></button>
            </td>
            </tr>`;
          });
           // <a title="Delete" class="btn btn-danger" title="Delete" href="delete.php?id=${result.employee_id}" onClick="return confirm('Are you sure you want to delete?')"><span class="glyphicon glyphicon-trash"></span>${result.employee_id}</a>
           $(`table#_tblEmployee tbody`).html(row);
         },'json');
                // <button class="btn btn-default btn-info btn-view" href="#viewModal${result.employee_id}" type="button" title="View" id="${result.employee_id}" data-id="${result.employee_id}"><i class="fa fa-list"></i></button> 
                return false;
              }
              getdata();
              $(document).on("click", ".btn-edit", function()
              {
        // $(this).data(`id`, `123`);
        // alert($(this).data(`id`));
        // $(this).attr(`data-id`, `123`)
        // alert($(this).attr(`data-id`))
        employee_id = $(this).data(`id`);
        $.post(`edit.php`, { employee_id: employee_id }, data=>
        {
          alert(data.first_name);
          $(`#_formEditEmployee input[name=_hiddenID]`).val(data.employee_id);
          $(`#_imgprev`).attr('src', `./uploads/${data.employee_image}`);
          $(`#_formEditEmployee input[name=_hiddenImage]`).val(data.employee_image);
          $(`#_formEditEmployee input[name=_txtbxFirstName]`).val(data.first_name);
          $(`#_formEditEmployee input[name=_txtbxLastName]`).val(data.last_name);
          $(`#_formEditEmployee input[name=_txtbxEmployeeClassification]`).val(data.employee_classification);
          $(`#EditModal`).modal("show");
        },'json');
        return false;
      });
              $(document).on('click', ".btn-delete", function() {
        // $("#butsave").attr("disabled", "disabled");
        // let FormData = new FormData($(this)[0]);
        if(confirm('do you want to delete this employee?'))
        {
          let id = $(this).data(`id`);
          $.ajax({
            url: "delete.php",
            type: "POST",
            // data: FormData,
            data: {
              id: id,
              // employee_image: employee_image
            },
            success: function(data){
              if (data == 0) {

                // $('#_txtbxFirstName').val("");
                // $('#_txtbxLastName').val("");
                // $('#_txtbxEmployeeClassification').val("");
                // $('#_fileEmployeeImage').val("");
                alert('success');
                getdata();
                // window.location.reload();
              }
              else
              {
                alert('Did Not Insert');
              }
            } //End Of Successs: function(data)
          }); //End of ajax
          return false;
        } //End of If confirm   
       }); //End of submit add on click

              $('#_formAddEmployee').on('submit', function() {
        // $("#butsave").attr("disabled", "disabled");
        // let FormData = new FormData($(this)[0]);
        if(confirm('do you want to add this employee?'))
        {
          formData = new FormData( $(this)[0] );
          // let first_name = $('#_txtbxFirstName').val();
          // let last_name = $('#_txtbxLastName').val();
          // let employee_classification = $('#_txtbxEmployeeClassification').val();
          $.ajax({
            // url: "save.php",
            // type: "POST",
            // // data: FormData,
            // data: {
            //   first_name: first_name,
            //   last_name: last_name,
            //   employee_classification: employee_classification
            //   // employee_image: employee_image
            // },
            type: 'POST'
            , url: 'save.php'
            , data : formData
            , processData: false
            , contentType: false
            , 
            success: function(data){
              if (data == 0) {

                // $('#_txtbxFirstName').val("");
                // $('#_txtbxLastName').val("");
                // $('#_txtbxEmployeeClassification').val("");
                // $('#_fileEmployeeImage').val("");
                alert('success');
                
                $(`#_formAddEmployee`).trigger("reset");
                $('#AddModal').modal('hide');
                getdata();
                window.location.reload();
              }
              else
              {
                alert('Did Not Insert');
              }
            } //End Of Successs: function(data)
          }); //End of ajax
          return false;
        } //End of If confirm   
       }); //End of submit add on click

              $('#_formEditEmployee').on('submit', function() {
        // $("#butsave").attr("disabled", "disabled");
        let id = $('#_hiddenID').val();
        if(confirm('You sure you want to update this employee?'))
        {
          formData = new FormData( $(this)[0] );
          // var first_name = $('#_txtbxEditFirstName').val();
          // var last_name = $('#_txtbxEditLastName').val();
          // var employee_classification = $('#_txtbxEditEmployeeClassification').val();
          $.ajax({
            type: 'POST'
            , url: 'update.php'
            , data : formData
            , processData: false
            , contentType: false
            , 
            success: function(data){
              console.log("success");
              console.log(data);
              if (data == 0) {
                alert('PASSED THE DATA');
                // $('#_txtbxEditFirstName').val("");
                // $('#_txtbxEditLastName').val("");
                // $('#_txtbxEditEmployeeClassification').val("");
                $('#EditModal').modal('hide');
                getdata();
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
              function readURL(input)
              {
                if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function(e)
                  {
                    $('#_imgprev').attr('src', e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);
                }
              }
              $("#_fileEmployeeImageEdit").change(function()
              {
                readURL(this);
              });   
              function readURL2(input)
              {
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
<!-- 

    <script>
      $(document).ready(function(){

    // $(document).on('click','.btn-view',function(){
    //   let employee_id = $(this).data("id");
    //   $.ajax({
    //     url:"view.php",
    //     method:"post",
    //     data:{employee_id:employee_id},
    //     success:function(data){
    //       $('#employeeDetails').html(data);
    //       $('#ViewModal').modal('show');
    //     }
    //   });
    // });


  });
</script> -->

</body>
</html>


