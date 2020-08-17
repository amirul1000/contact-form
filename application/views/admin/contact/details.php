<a href="<?php echo site_url('admin/contact/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Contact'); ?></h5>
<!--Data display of contact with id-->
<?php
$c = $contact;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>First Name</td>
		<td><?php echo $c['first_name']; ?></td>
	</tr>

	<tr>
		<td>Last Name</td>
		<td><?php echo $c['last_name']; ?></td>
	</tr>

	<tr>
		<td>Email</td>
		<td><?php echo $c['email']; ?></td>
	</tr>

	<tr>
		<td>Phone</td>
		<td><?php echo $c['phone']; ?></td>
	</tr>

	<tr>
		<td>Comment</td>
		<td><?php echo $c['comment']; ?></td>
	</tr>

	<tr>
		<td>Created At</td>
		<td><?php echo $c['created_at']; ?></td>
	</tr>

	<tr>
		<td>Updated At</td>
		<td><?php echo $c['updated_at']; ?></td>
	</tr>


</table>
<!--End of Data display of contact with id//-->
