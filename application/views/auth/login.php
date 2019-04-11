<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Jquery.ui -->
  <link href="<?php echo base_url() ?>/assets/jquery-ui/jquery-ui.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/jquery-ui/jquery-ui.theme.min.css" rel="stylesheet">

  <!-- Jquery Confirm -->
  <link href="<?php echo base_url() ?>/assets/css/jquery-confirm.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?php echo base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Select2 -->
  <link href="<?php echo base_url() ?>/assets/css/select2/select2.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/css/select2/select2.min.css.4.0.0.css" rel="stylesheet">


  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1><?php echo lang('login_heading');?></h1>
                    <p><?php echo lang('login_subheading');?></p>
                  </div>
                  
                  <div id="infoMessage"><?php echo $message;?></div>

                  <form class="user" action="<?php echo base_url(); ?>auth/login" method="post" accept-charset="utf-8">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="identity" aria-describedby="identity" name="identity" placeholder="Enter Email/Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value=" Login">
                  </form>
                  <hr>
                  <div class="text-center">
                    <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Jquery.ui -->
<script src="<?php echo base_url() ?>/assets/jquery-ui/jquery-ui.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>/assets/js/sb-admin-2.min.js"></script>

<!-- Jquery Confirm -->
<script src="<?php echo base_url() ?>/assets/js/jquery-confirm.min.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url() ?>/assets/js/select2/select2.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/select2/select2.min.js.4.0.0.js"></script>

 <!-- Page level plugins -->
 <!-- <script src="<?php // echo base_url() ?>/assets/vendor/chart.js/Chart.min.js"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="<?php // echo base_url() ?>/assets/js/demo/chart-area-demo.js"></script> -->
<!-- <script src="<?php // echo base_url() ?>/assets/js/demo/chart-pie-demo.js"></script> -->

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>


</body>

</html>
