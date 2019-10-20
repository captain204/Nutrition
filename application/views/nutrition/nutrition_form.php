
        <h2 class="text-center"><?=$title;?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Firstname <?php echo form_error('firstname') ?></label>
            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname" value="<?php echo $firstname; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lastname <?php echo form_error('lastname') ?></label>
            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname" value="<?php echo $lastname; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Address <?php echo form_error('address') ?></label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $address; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Weight <?php echo form_error('weight') ?></label>
            <input type="text" class="form-control" name="weight" id="weight" placeholder="Enter weight in kilograms eg 65" value="<?php echo $weight; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Height <?php echo form_error('height') ?></label>
            <input type="text" class="form-control" name="height" id="height" placeholder="Enter height in meters eg 1.70" value="<?php echo $height; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Age <?php echo form_error('age') ?></label>
            <input type="text" class="form-control" name="age" id="age" placeholder="Age" value="<?php echo $age; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Officer Name <?php echo form_error('officer_name') ?></label>
            <input type="text" class="form-control" name="officer_name" id="officer_name" placeholder="Officer Name" value="<?php echo $officer_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Phone <?php echo form_error('officer_phone') ?></label>
            <input type="text" class="form-control" name="officer_phone" id="officer_phone" placeholder="Phone" value="<?php echo $officer_phone; ?>" />
        </div>
        <?php if($this->session->userdata('name')):?>
            <input type="hidden" class="form-control" name="clinic_name" id="clinic_name" placeholder="Clinic Name" value="<?php echo ($this->session->userdata('name'));?>" />    
        <?php endif;?>       
	    <div class="form-group">
            <input type="hidden" class="form-control" name="patient_id" id="patient_id" placeholder="Patient Id" value="<?php for($i = 0; $i<9; $i++){$a = mt_rand(1,9);echo($a); }?>" />
        </div>
	    <div class="form-group">
            <label for="date">Sex <?php echo form_error('sex') ?></label>
            <select class="form-control" name="sex" value="<?php echo $sex; ?>" >
                <option value="male">Male</option>
                <option value="female">Female</option>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('nutrition') ?>" class="btn btn-danger">Cancel</a>
	</form>
    </body>
</html>