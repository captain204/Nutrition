<!doctype html>
<html>
        <h2 class="text-center"><?=$title;?></h2>
        <table class="table">
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Clinic Name</td><td><?php echo $clinic_name; ?></td></tr>
		<tr><td>Address</td><td><?php echo $address; ?></td></tr>
		<tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
		<tr><td></td><td><a href="<?php echo base_url();?>clinic/update/<?=($this->session->userdata('id'));?>" class="btn btn-success">Update</a></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('clinic') ?>" class="btn btn-primary">Back</a></td></tr>
	</table>
        </body>
</html>