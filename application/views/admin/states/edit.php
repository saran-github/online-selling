<?php $this->load->view('admin/header'); ?>
<script src="<?php echo base_url();?>js/admin/state.js" type="text/javascript"></script>
<nav>
<?php $this->load->view('admin/left_menu'); ?> 
</nav>
<section class="main-content">
	<h1>States</h1>
	    <?php
		$frmAttrs   = array("id"=>'editFrm','class' => 'edit_states');
		echo  form_open_multipart('admin/states/edit/'.$id,$frmAttrs); 
	    ?>
	    	<div>
		    	<label>Country</label>
			<select id="country_id" name="country_id">
				<option value="">--Select--</option>
				<?php foreach($countries as $key => $val)
				      {
				      	 if($val['id'] ==  $states['country_id'])
				      	 {
				?>
						<option value="<?php echo $val['id'];?>" selected><?php echo $val['country_name'];?></option>
				<?php
					 }
					 else
					 {
				?>
						<option value="<?php echo $val['id'];?>"><?php echo $val['country_name'];?></option>
				<?php		 
					 }
				      }
				?>
			</select>
			<div class="error_block" id="category_error"></div>
		</div>
	    	<div>
		    	<label for="user_id">Name</label>
			<input type="text" id="name" name="name" value="<?php echo $states['name'];?>">
			<div class="error_block" id="name_error"></div>
			
		</div>
		<div>
		    	<label for="user_id">Tax %</label>
			<input type="text" id="tax" name="tax" value="<?php echo $states['tax'];?>">
			<div class="error_block" id="tax_error"></div>
			
		</div>
	    	<div>
	    		<input type="hidden" id="id" name="id" value="<?php echo $states['id'];?>">
		    	<input type="submit" value="Submit" id="submit">
		</div>
		
	    <?=form_close()?>	   
</section>
<script>
$("#editFrm").submit(function(event){
	State.editStateValidate(event)	;
});
</script>
<?php $this->load->view('admin/footer'); ?> 
