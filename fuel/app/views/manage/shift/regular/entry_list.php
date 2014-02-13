<article class="uk-articleuk-panel uk-panel-box">
	<table border="1" width=100% class="uk-text-center">
		<tr>
			<td class="uk-text-center" colspan="2"></td>
			<td colspan="2">最大</td>
			<td colspan="2">承認</td>
		</tr>
		<?php foreach ($regular_shift_users as $regular_shift_user): ?>
			<tr>
				<td><?php echo $regular_shift_user->frist_name; ?></td>
				<?php if(Helper_Shift::user_shifts_lock($regular_id, $regular_shift_user->user_id) == "true"): ?>
					<td data-uk-tooltip  title="クリックでアンロックする" class="unlock_button" id="<?php echo $regular_shift_user->user_id; ?>" value="<?php echo $regular_id; ?>"><i class="fa fa-lock"></i></td>
				<?php else: ?>
					<td data-uk-tooltip  title="クリックでロックする" class="lock_button" id="<?php echo $regular_shift_user->user_id; ?>" value="<?php echo $regular_id; ?>"><i class="fa fa-unlock"></i></td>
				<?php endif; ?>
				<td style="background-color: #ffb6c1;"><?php Helper_Shift::request_work_day_count($regular_id, $regular_shift_user->user_id); ?></td>
				<td ><?php Helper_Shift::request_work_time_count($regular_id, $regular_shift_user->user_id); ?>:00</td>
				<td style="background-color: #afecef;"><?php Helper_Shift::deside_work_day_count($regular_id, $regular_shift_user->user_id); ?></td>
				<td ><?php Helper_Shift::deside_work_time_count($regular_id, $regular_shift_user->user_id); ?>:00</td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td colspan="2">合計</td>
			<td colspan="2"><?php Helper_Shift::request_regular_group_total_work_time($regular_id); ?>:00</td>
			<td colspan="2"><?php Helper_Shift::deside_regular_group_total_work_time($regular_id); ?>:00</td>
		</tr>
	</table>
</article>
<script type="text/javascript">
	$(function(){
		$(".lock_button").click(function(){
			user_id = $(this).attr("id");
			irregular_id = $(this).attr("value");
			url = "../lock_user_shifts/";
			url += user_id;
			url += "/"
			url += irregular_id;
			$.ajax(url, {"complete": function(){
				location.reload();
			}});
	});
		$(".unlock_button").click(function(){
			user_id = $(this).attr("id");
			irregular_id = $(this).attr("value");
			url = "../unlock_user_shifts/";
			url += user_id;
			url += "/"
			url += irregular_id;
			$.ajax(url, {"complete": function(){
				location.reload();
			}})
		})
	});
</script>
