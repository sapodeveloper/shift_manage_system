<h3>シフト一覧</h3>
<h4>イレギュラーシフト一覧</h4>
<table class="uk-table uk-table-hover">
	<thead>
		<tr>
			<td>シフト名</td>
			<td>状態</td>
			<td colspan="3">操作</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($irregular_shifts as $irregular_shift): ?>
			<tr class="<?php Helper_Shift::shift_condition_color($irregular_shift->irregular_condition); ?>">
				<td><?php echo $irregular_shift->irregular_name; ?></td>
				<td><?php Helper_Shift::shift_condition($irregular_shift->irregular_condition); ?></td>
				<td><?php echo Html::anchor('shift/irregular/detail/'.$irregular_shift->id, '確認',array('class'=>'uk-button')); ?></td>
				<td><?php echo Html::anchor('manage/shift/irregular/edit_shift/'.$irregular_shift->id.'/info', '編集',array('class'=>'uk-button')); ?></td>
				<td><?php echo Html::anchor('shift/irregular/output_pdf/'.$irregular_shift->id, 'PDF',array('class'=>'uk-button')); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
