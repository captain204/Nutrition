<!DOCTYPE html>
<html lang="en">
<head>
	<title>Nutrition</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/Login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/Login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/Login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/Login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/Login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
					<span class="login100-form-title p-b-70">
						Welcome
						<h4>Pankyes  Joseph Irimaya</h4>
						<h4>FCEP/2014/CS/9043</h4>
					</span>
					<span class="login100-form-avatar">
						<img src="<?php echo base_url();?>assets/Login/images/avatar-01.jpg" alt="AVATAR">
					</span>
					<?php if($this->session->flashdata('registered')):?>
						<div class="alert alert-success">
							<?php echo ($this->session->flashdata('registered'));?>
						</div>
					<?php endif;?>
					<?php if($this->session->flashdata('fail')):?>
                      <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('fail'); ?>
                      </div>
					<?php endif;?>
					<form class="login100-form validate-form" action="<?=base_url('clinic/login');?>" method="post">
                        <?php echo validation_errors('<div class ="alert alert-danger">','</div>');?>
						<div class="wrap-input100 validate-input m-t-85 m-b-35">
							<input class="input100" type="text" name="username" required>
							<span class="focus-input100" data-placeholder="Username"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-50">
							<input class="input100" type="password" name="password" required>
							<span class="focus-input100" data-placeholder="Password"></span>
						</div>

						<div class="container-login100-form-btn">
						<button type="submit" name="submit" class="btn btn-block btn-success btn-lg font-weight-medium">Login</a>

						</div>
					</form>
						<li>
							<span class="txt1">
								Don’t have an account?
							</span>
							<a href="<?=base_url();?>clinic/register?>" class="txt2">
								Register
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/Login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>assets/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/Login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/Login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/Login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/Login/js/main.js"></script>

</body>
</html>