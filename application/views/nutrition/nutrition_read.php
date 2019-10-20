        <h2 class="text-center"><?=$title?></h2>
        <table class="table">
	    <tr><td>Firstname</td><td><?php echo $firstname; ?></td></tr>
	    <tr><td>Lastname</td><td><?php echo $lastname; ?></td></tr>
	    <tr><td>Address</td><td><?php echo $address; ?></td></tr>
		<tr><td>Weight</td><td><?php echo $weight; ?></td></tr>
	    <tr><td>Height</td><td><?php echo $height; ?></td></tr>
	    <tr><td>Age</td><td><?php echo $age; ?></td></tr>
	    <tr><td>Officer Name</td><td><?php echo $officer_name; ?></td></tr>
	    <tr><td>Officer Phone</td><td><?php echo $officer_phone; ?></td></tr>
	    <tr><td>Clinic Name</td><td><?php echo $clinic_name; ?></td></tr>
	    <tr><td>Patient Id</td><td><?php echo $patient_id; ?></td></tr>
	    <tr><td>Sex</td><td><?php echo $sex; ?></td></tr>
	    <tr><td>Date</td><td><?php echo $date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('nutrition') ?>" class="btn btn-success">Print</a></td></tr>
		<tr><td></td><td><a href="<?php echo site_url('nutrition') ?>" class="btn btn-primary">Back</a></td></tr>
	</table>
    
</html>