<h3><?php echo $regular_shift->regular_name; ?></h3>
<?php foreach ($regular_shift_days as $regular_shift_day): ?>
	<h4><?php echo($regular_shift_day->regular_day_name); ?></h4>
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
		<tbody id = "<?php echo $regular_shift_day->id; ?>">
			<script type="text/javascript">
				$(function() {
					var url = '../shift_detail/';
					url += <?php echo $regular_shift_day->id; ?>;
					$.ajax(url, {"complete": function(xhr,status){
						window.xhr = xhr;
						$("#<?php echo $regular_shift_day->id; ?>").html($(xhr.responseText));
					}});
				});
			</script>
		</tbody>
	</table>
<?php endforeach; ?>

