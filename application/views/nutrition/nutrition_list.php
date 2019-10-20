
        <?php if($this->session->userdata('name')):?>
        <div class="alert alert-success">
                <?php echo ($this->session->userdata('name'));?>
        </div>
        <?php endif;?>
        <?php if($this->session->flashdata('login')):?>
        <div class="alert alert-success">
                <?php echo ($this->session->flashdata('login'));?>
        </div>
        <?php endif;?>
        <h2 class="text-center"><?=$title;?></h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('nutrition/create'),'Add', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('nutrition/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('nutrition'); ?>" class="btn btn-default">Reset</a>
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
		<th>Firstname</th>
		<th>Lastname</th>
		<th>Address</th>
		<th>Patient Id</th>
		<th>Date</th>
		<th>Action</th>
            </tr><?php
            foreach ($nutrition_data as $nutrition)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $nutrition->firstname ?></td>
			<td><?php echo $nutrition->lastname ?></td>
            <td><?php echo $nutrition->address ?></td>
			<td><?php echo $nutrition->patient_id ?></td>
			<td><?php echo $nutrition->date ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('nutrition/read/'.$nutrition->id),'View'); 
				echo ' | '; 
				echo anchor(site_url('nutrition/update/'.$nutrition->id),'Update'); 
				echo ' | '; 
                echo anchor(site_url('nutrition/result/'.$nutrition->id),'Result'); 
				echo ' | ';
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