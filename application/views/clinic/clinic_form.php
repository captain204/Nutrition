        <h2 class="text-center"> <?php echo $button ?> <?=$title;?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Address <?php echo form_error('address') ?></label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $address; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Phone <?php echo form_error('phone') ?></label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
        </div>
        <div class="form-group">
            <label for="clinic_name">Clinic Name<?php echo form_error('clinic_name') ?></label>
            <input type="text" class="form-control" name="clinic_name" id="clinic_name" placeholder="Enter Clinic Name" value="<?php echo $clinic_name; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('clinic') ?>" class="btn btn-danger">Cancel</a>
	</form>
    </body>
</html>