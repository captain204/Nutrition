<!doctype html>
<html>
   
    <body>
        <h2 class="text-center"><?=$title;?></h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('clinic/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('clinic/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('clinic'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
        <th>Username</th>
		<th>Email</th>
		<th>Address</th>
        <th>Phone</th>
		<th>Action</th>
            </tr><?php
            foreach ($clinic_data as $clinic)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $clinic->clinic_name ?></td>
            <td><?php echo $clinic->username?></td>
			<td><?php echo $clinic->email ?></td>
			<td><?php echo $clinic->address?></td>
            <td><?php echo $clinic->phone?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('clinic/read/'.$clinic->id),'View'); 
				echo ' | '; 
				echo anchor(site_url('clinic/update/'.$clinic->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('clinic/delete/'.$clinic->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>