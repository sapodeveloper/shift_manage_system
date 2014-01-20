<article class="uk-articleuk-panel uk-panel-box">
	<table border="1" width=100% class="uk-text-center">
		<tr>
			<td class="uk-text-center" colspan="2"></td>
			<td colspan="2">最大</td>
			<td colspan="2">承認</td>
		</tr>
		<?php foreach ($irregular_shift_users as $irregular_shift_user): ?>
			<tr>
				<td><?php echo $irregular_shift_user->frist_name; ?></td>
				<td data-uk-tooltip  title="クリックでロックする"><i class="fa fa-unlock"></i></td>
				<td style="background-color: #ffb6c1;"><?php Helper_Shift::request_work_day_count($irregular_id, $irregular_shift_user->user_id); ?></td>
				<td ><?php Helper_Shift::request_work_time_count($irregular_id, $irregular_shift_user->user_id); ?>:00</td>
				<td style="background-color: #afecef;"><?php Helper_Shift::deside_work_day_count($irregular_id, $irregular_shift_user->user_id); ?></td>
				<td ><?php Helper_Shift::deside_work_time_count($irregular_id, $irregular_shift_user->user_id); ?>:00</td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td colspan="2">合計</td>
			<td colspan="2"><?php Helper_Shift::request_irregular_group_total_work_time($irregular_id); ?>:00</td>
			<td colspan="2"><?php Helper_Shift::deside_irregular_group_total_work_time($irregular_id); ?>:00</td>
		</tr>
	</table>
</article>