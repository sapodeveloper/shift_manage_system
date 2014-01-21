<h3><?php echo $irregular_shift->irregular_name; ?></h3>
<?php $day_id = 1; ?>
<?php foreach ($irregular_shift_days as $irregular_shift_day): ?>
	<?php if($irregular_shift_users{$day_id}): ?>
		<h4><?php echo date( 'Y年m月d日', strtotime($irregular_shift_day->irregular_day_date)); ?></h4>
		<table border="1" class="uk-table uk-width-7-10">
			<tr>
				<td>スタッフ名</td>
				<td>勤務形態</td>
				<td>勤務時間</td>
				<td>時間</td>
				<td>午前勤務</td>
				<td>午後勤務</td>
			</tr>
			<?php foreach (${'irregular_shift_users'.$day_id} as $irregular_shift_user): ?>
				<tr>
					<td><?php echo $irregular_shift_user->users->full_name; ?></td>
					<?php Helper_Shift::irregular_work_type_for_table($irregular_shift_user->edited_shift_type); ?>
				</tr>
			<?php endforeach; ?>
			<tr>
				<td><?php echo count(${'irregular_shift_users'.$day_id}); ?>名</td>
				<td colspan="2">合計勤務時間</td>
				<td><?php Helper_Shift::irregular_work_time_count($irregular_shift_day->id); ?>時間</td>
				<td><?php Helper_Shift::irregular_work_staff_count($irregular_shift_day->id ,1); ?></td>
				<td><?php Helper_Shift::irregular_work_staff_count($irregular_shift_day->id ,2); ?></td>
			</tr>
		</table>
		<br />
		<?php $day_id++; ?>
	<?php endif; ?>
<?php endforeach; ?>
