<?php foreach ($irregular_shift_users as $irregular_shift_user): ?>
	<tr>
		<td><?php echo $irregular_shift_user->full_name; ?></td>
		<?php Helper_Shift_Irregular::irregular_work_type_for_table($irregular_shift_user->edited_shift_type); ?>
	</tr>
<?php endforeach; ?>
	
