<?php
// session_start();
// if(session_id() == '' || !isset($_SESSION['sessionUsername'])) 
// {
//     // session isn't started
// }
// else
// {
//   $message = 'YOU ARE LOGGED IN, PLEASE LOG OUT PROPERLY';
?>
<!--   <script type='text/javascript'>alert('<?php echo $message ?>');</script>
  <script>window.location.href = "<?php echo site_url('Employee/dashboard'); ?>"</script> -->
  <?php
// }
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Employee">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>LOG-IN</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url().'css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'css/bootstrap-reset.css'?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url().'assets/font-awesome/css/font-awesome.css'?>" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url().'css/style.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'css/style-responsive.css'?>" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="login-body">

  <div class="container">

    <form class="form-signin" method="post" id="_formLogin" action="<?php echo base_url(); ?>index.php/Employee/login">
      <h2 class="form-signin-heading">sign in now</h2>
      <?php if($this->session->flashdata('error')): ?>
        <p>
          <?php echo $this->session->flashdata('error');?>
        </p>
      <?php endif; ?>
      <div class="login-wrap">
        <input type="text" name="_txtbxUsername" id="_txtbxUsername" class="form-control" placeholder="Username" autofocus>
        <input type="password" name="_txtbxPassword" id="_txtbxPassword" class="form-control" placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
          
          <!-- <span class="pull-right">
            <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
          </span> -->
        </label>
        <button class="btn btn-lg btn-login btn-block _submitLogin" type="submit">Sign in</button>
            <!-- <p>or you can sign in via social network</p>
            <div class="login-social-link">
                <a href="index.html" class="facebook">
                    <i class="fa fa-facebook"></i>
                    Facebook
                </a>
                <a href="index.html" class="twitter">
                    <i class="fa fa-twitter"></i>
                    Twitter
                </a>
            </div>
            <div class="registration">
                Don't have an account yet?
                <a class="" href="registration.html">
                    Create an account
                </a>
              </div> -->

            </div>

            <!-- Modal -->
<!--             <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Forgot Password ?</h4>
                  </div>
                  <div class="modal-body">
                    <p>Enter your e-mail address below to reset your password.</p>
                    <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                  </div>
                  <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                    <button class="btn btn-success" type="button">Submit</button>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- modal -->

          </form>

        </div>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url().'js/jquery.js' ?>"></script>
        <script src="<?php echo base_url().'js/bootstrap.min.js'?>"></script>
       <!--  <script type="text/javascript">
          $(function()
          {
            $('#_formLogin').on('submit', function() {
              if(confirm('do you want to add this employee?'))
              {
                formData = new FormData( $(this)[0] );
                $.ajax({
                  type: 'POST'
                  , url: '<?php echo base_url(); ?>index.php/Employee/login'
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
                $(`#_formLogin`).trigger("reset");
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
      }); //End of function
    </script> -->

       <!-- 
        <script type="text/javascript">
          $(document).ready(function(){
            $('#_formLogin').on('submit', function() {
              alert('NAGSUSUBMIT');
        // $("#butsave").attr("disabled", "disabled");
        let FormData = new FormData($(this)[0]);
          // let first_name = $('#_txtbxFirstName').val();
          // let last_name = $('#_txtbxLastName').val();
          // let employee_classification = $('#_txtbxEmployeeClassification').val();
          $.ajax({
            url: "login.php",
            type: "POST",
            data: FormData,
            processData: false,
            contentType: false,
            // data: {
            //   first_name: first_name,
            //   last_name: last_name,
            //   employee_classification: employee_classification
            //   // employee_image: employee_image
            // },
            success: function(data){
              if (data == 0) {
                // $('#_txtbxFirstName').val("");
                // $('#_txtbxLastName').val("");
                // $('#_txtbxEmployeeClassification').val("");
                // $('#_fileEmployeeImage').val("");
                alert('NAPASA NA');
              }
              else
              {
                alert('Did Not Insert');
              }
            } //End Of Successs: function(data)
          }); //End of ajax
          return false;   
       }); //End of submit add on click
          });

        </script> -->


      </body>
      </html>
