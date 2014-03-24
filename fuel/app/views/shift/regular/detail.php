<h3><?php echo $regular_shift->regular_name; ?></h3>
<?php foreach ($regular_shift_days as $regular_shift_day): ?>
	<h4><?php echo($regular_shift_day->regular_day_name); ?>曜日</h4>
	<table border="1" class="uk-table uk-width-7-10">
		<thead>
			<tr>
				<td>スタッフ名</td>
				<td>勤務形態</td>
				<td>勤務時間</td>
				<td>時間</td>
				<td>一時限目</td>
				<td>二時限目</td>
				<td>三時限目</td>
				<td>四時限目</td>
				<td>五時限目</td>
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

