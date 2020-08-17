<a href="<?php echo site_url('admin/contact/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Contact'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/contact/save/'.$contact['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="First Name" class="col-md-4 control-label">First Name</label>
			<div class="col-md-8">
				<input type="text" name="first_name"
					value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $contact['first_name']); ?>"
					class="form-control" id="first_name" />
			</div>
		</div>
		<div class="form-group">
			<label for="Last Name" class="col-md-4 control-label">Last Name</label>
			<div class="col-md-8">
				<input type="text" name="last_name"
					value="<?php echo ($this->input->post('last_name') ? $this->input->post('last_name') : $contact['last_name']); ?>"
					class="form-control" id="last_name" />
			</div>
		</div>
		<div class="form-group">
			<label for="Email" class="col-md-4 control-label">Email</label>
			<div class="col-md-8">
				<input type="text" name="email"
					value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $contact['email']); ?>"
					class="form-control" id="email" />
			</div>
		</div>
		<div class="form-group">
			<label for="Phone" class="col-md-4 control-label">Phone</label>
			<div class="col-md-8">
				<input type="text" name="phone"
					value="<?php echo ($this->input->post('phone') ? $this->input->post('phone') : $contact['phone']); ?>"
					class="form-control" id="phone" />
			</div>
		</div>
		<div class="form-group">
			<label for="Comment" class="col-md-4 control-label">Comment</label>
			<div class="col-md-8">
				<textarea name="comment" id="comment" class="form-control" rows="4" /><?php echo ($this->input->post('comment') ? $this->input->post('comment') : $contact['comment']); ?></textarea>
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($contact['id'])){?>Save<?php }else{?>Update<?php } ?></button>
	</div>
</div>
<?php echo form_close(); ?>
<!--End of Form to save data//-->
<!--JQuery-->
<script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '<?php echo base_url(); ?>public/datepicker/images/calendar.gif',
	});
</script>
