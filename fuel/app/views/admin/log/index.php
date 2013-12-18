<h2>システムログ</h2>
<table class="uk-table uk-table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>ログタイプ</th>
			<th>システムメッセージ</th>
			<th>記録日時</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($logs as $log): ?>
			<?php if($log->log_condition == 0): ?>
				<tr class="uk-alert-danger">
			<?php else: ?>
				<tr>
			<?php endif; ?>
				<td><?php echo $log->id; ?></td>
				<td><?php echo $log->log_type; ?></td>
				<td><?php echo $log->log_message; ?></td>
				<td><?php echo date( 'Y年m月d日H時m分', strtotime($log->created_at)); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
