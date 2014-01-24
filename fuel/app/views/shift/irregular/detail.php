<h3><?php echo $irregular_shift->irregular_name; ?></h3>
<?php foreach ($irregular_shift_days as $irregular_shift_day): ?>
	<h4><?php echo date( 'Y年m月d日', strtotime($irregular_shift_day->irregular_day_date)); ?></h4>
	<table border="1" class="uk-table uk-width-7-10">
		<thead>
			<tr>
				<td>スタッフ名</td>
				<td>勤務形態</td>
				<td>勤務時間</td>
				<td>時間</td>
				<td>午前勤務</td>
				<td>午後勤務</td>
			</tr>
		</thead>
		<tbody id = "<?php echo $irregular_shift_day->id; ?>">
			<script type="text/javascript">
				$(function() {
					var url = '../shift_detail/';
					url += <?php echo $irregular_shift_day->id; ?>;
					$.ajax(url, {"complete": function(xhr,status){
						window.xhr = xhr;
						$("#<?php echo $irregular_shift_day->id; ?>").html($(xhr.responseText));
					}});
				});
			</script>
		</tbody>
		<tr>
			<td>名</td>
			<td colspan="2">合計勤務時間</td>
			<td><?php Helper_Shift::irregular_work_time_count($irregular_shift_day->id); ?>時間</td>
			<td><?php Helper_Shift::irregular_work_staff_count($irregular_shift_day->id ,1); ?></td>
			<td><?php Helper_Shift::irregular_work_staff_count($irregular_shift_day->id ,2); ?></td>
		</tr>
	</table>
<?php endforeach; ?>

