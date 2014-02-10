<h3>シフト一覧</h3>
<h4>イレギュラーシフト一覧</h4>
<table>
	<thead>
		<tr>
			<td>シフト名</td>
			<td>状態</td>
			<td colspan="4">操作<td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($irregular_shifts as $irregular_shift): ?>
			<tr class="<?php Helper_Shift::shift_condition_color($irregular_shift->irregular_condition); ?>">
				<td><?php echo $irregular_shift->irregular_name; ?></td>
				<td><?php Helper_Shift::shift_condition($irregular_shift->irregular_condition); ?></td>
				<td><?php echo Html::anchor('shift/irregular/detial/'.$irregular_shift->id, '<i class="fa fa-search">&nbsp;確認',array('class'=>'uk-button uk-button-success')); ?></td>
				<td><?php echo Html::anchor('manage/shift/irregular/edit_shift/'.$irregular_shift->id.'/info', '<i class="fa fa-pencil-square-o">&nbsp;シフト編集',array('class'=>'uk-button uk-button-primary')); ?></td>
				<td><?php echo Html::anchor('shift/irregularoutput_pdf/'.$irregular_shift->id, '<i class="fa fa-file-text-o"></i>&nbsp;PDF',array('class'=>'uk-button uk-button-danger')) ?></td>
				<td><button class='uk-button uk-button-danger' onclick="javascript:delete(<?php echo $irregular_shift->id; ?>);"><i class="fa fa-trash-o"></i>&nbsp;削除</button></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
