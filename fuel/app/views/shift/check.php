<h3>シフト確認</h3>
<?php if($decision_irregulars): ?>
<h3>確定イレギュラーシフト</h3>
<table class="uk-table uk-table-hover">
	<thead>
		<tr>
			<th>シフト名</th>
			<th>有効期限</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($decision_irregulars as $irregular): ?>
			<tr>
				<td><?php echo $irregular->irregular_name; ?></td>
				<td><?php echo date( 'Y年m月d日', strtotime($irregular->irregular_enabledate)); ?></td>
				<td><?php echo Html::anchor('shift/irregular/detail/'.$irregular->id, '確認'); ?></td>
				<td><?php echo Html::anchor('shift/irregular/output_pdf/'.$irregular->id, 'PDF'); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endif; ?>