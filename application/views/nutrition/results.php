<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Nutrition Status</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../node_modules/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../node_modules/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../../node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../node_modules/bootstrap-table/dist/bootstrap-table.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  
  <link rel="stylesheet" href="<?php echo base_url();?>assets/themes/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                        <div class="col-md-8 offset-2">
                          <h2 class="text-center"><?=$title?></h2>
                          <table class="table text-center">
                            <tr><td>Firstname</td><td><?php echo $firstname; ?></td></tr>
                            <tr><td>Lastname</td><td><?php echo $lastname; ?></td></tr>
                            <tr><td>Patient Id</td><td><?php echo $patient_id; ?></td></tr>
                            <tr><td>Address</td><td><?php echo $address; ?></td></tr>
                            <tr><td>Height</td><td><?php echo $height; ?></td></tr>
                            <tr><td>Weight</td><td><?php echo $weight; ?></td></tr>
                            <tr><td>BMI</td><td><?php echo $bmi; ?></td></tr>
                            <tr><td>Age</td><td><?php echo $age; ?></td></tr>
                            <tr><td>Officer Name</td><td><?php echo $officer_name; ?></td></tr>
                          </table>
                          <h2 class="text-center"> Status: <?=$status;?>  </h2>
                          <p> <?=$remarks;?> </p>
                          <div class="text-center">
                            <button onClick="window.print()" class="btn btn-success text-center">Print</button>
                            <a href="<?php echo site_url('nutrition') ?>" class="btn btn-primary">Back</a>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>

  <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../../js/jq.tablesort.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/tablesorter.js"></script>
  <!-- End custom js for this page-->
  </body>



    
</html>