<meta charset="utf-8">
<h3><?php echo $regular_shift->regular_name; ?></h3>
<?php $day_id = 1; ?>
<?php foreach ($regular_shift_days as $regular_shift_day): ?>
	<?php if($regular_shift_users{$day_id}): ?>
		<h4><?php echo date( 'Y年m月d日', strtotime($regular_shift_day->regular_day_date)); ?></h4>
		<table border="1">
			<tr>
				<td>スタッフ名</td>
				<td>勤務形態</td>
				<td>勤務時間</td>
				<td>時間</td>
				<td>午前勤務</td>
				<td>午後勤務</td>
			</tr>
		
			<?php
				// 該当日の合計勤務時間
				$total_work_time = 0;
				// 該当日の午前勤務者数
				$morining_work_staff_num = 0;
				// 該当日の午後勤務者数
				$afternoon_work_staff_num = 0;
			?>
			<?php foreach (${'regular_shift_users'.$day_id} as $regular_shift_user): ?>
				<tr>
					<td><?php echo $regular_shift_user->users->full_name; ?></td>
					<?php
						if($regular_shift_user->edited_shift_type == 1){
							echo "<td>午前勤務</td><td>10:00 ~ 13:00</td><td>3:00</td><td bgcolor = 'deepskyblue'></td><td></td><td></td>";
							$total_work_time += 3;
							$morining_work_staff_num++;
						}elseif($regular_shift_user->edited_shift_type == 2){
							echo "<td>午後勤務</td><td>13:00 ~ 17:00</td><td>4:00</td><td></td><td bgcolor = 'deepskyblue'></td><td></td>";
							$total_work_time += 4;
							$afternoon_work_staff_num++;
						}elseif($regular_shift_user->edited_shift_type == 3){
							echo "<td>フル勤務</td><td>10:00 ~ 17:00</td><td>6:00</td><td bgcolor = 'deepskyblue'></td><tdbgcolor = 'deepskyblue'></td>";
							$total_work_time += 6;
							$morining_work_staff_num++;
							$afternoon_work_staff_num++;
						}
					?>
				</tr>
			<?php endforeach; ?>
			<tr>
				<td><?php echo count(${'irregular_shift_users'.$day_id}); ?>名</td>
				<td>合計勤務時間</td><td></td>
				<td><?php echo $total_work_time ?>時間</td>
				<td><?php echo $morining_work_staff_num; ?></td>
				<td><?php echo $afternoon_work_staff_num; ?></td>
			</tr>
		</table>
		<br />
		<?php $day_id++; ?>
	<?php endif; ?>
<?php endforeach; ?>
