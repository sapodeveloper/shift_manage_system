<?php foreach ($regular_shift_users as $regular_shift_user): ?>
	<tr>
		<td><?php echo $regular_shift_user->users->full_name; ?></td>
		<?php Helper_Shift_Regular::regular_work_type_for_table($regular_shift_user->edited_shift_type); ?>
	</tr>
<?php endforeach; ?>
	
