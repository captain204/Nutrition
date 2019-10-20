<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Nutrition</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../node_modules/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../node_modules/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../../node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/themes/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth">
          <div class="row w-100">
            <div class="col-lg-8 mx-auto">
              <div class="row">
                <div class="col-lg-6 bg-white">
                  <?php if($this->session->flashdata('registered')):?>
                    <div class="alert alert-success">
                      <?php echo ($this->session->flashdata('registered'));?>
                    </div>
                  <?php endif;?>
                  <div class="auth-form-light text-left p-5">
                    <?php if($this->session->flashdata('fail')):?>
                      <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('fail'); ?>
                      </div>
                    <?php endif;?>
                    <h2> Login</h2>
                    <img src="images/faces/face6.jpg" alt="">
                       <form  action="<?=base_url('clinic/login');?>" method="post">
                        <?php echo validation_errors('<div class ="alert alert-danger">','</div>');?>
                        <div class="form-group">
                          <label for="Username">Username</label>
                          <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Username">
                          <i class="mdi mdi-account"></i>
                        </div>
                        <div class="form-group">
                          <label for="Password">Password</label>
                          <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                          <i class="mdi mdi-eye"></i>
                        </div>
                        <div class="mt-5">
                          <button type="submit" name="submit" class="btn btn-block btn-success btn-lg font-weight-medium">Login</a>
                        </div>
                      </form>    
                      <a href="<?=base_url();?>clinic/register?>" class="auth-link text-black">Dont have an  account? <span class="font-weight-medium">Register here</span></a>              
                  </div>
                </div>
                <div class="col-lg-6 login-half-bg d-flex flex-row">
                  <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <!-- endinject -->
</body>

</html>
