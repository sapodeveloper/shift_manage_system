<h3>シフト一覧</h3>
<h4>レギュラーシフト一覧</h4>
<table class="uk-table" >
	<thead>
		<tr>
			<td>シフト名</td>
			<td>状態</td>
			<td colspan="4">操作<td>
		</tr>
	</thead>
	<tbody>
	<?php foreach($regular_shifts as $regular_shift): ?>
		<tr class="<?php Helper_Shift_Regular::shift_condition_color($regular_shift->regular_condition); ?>">
			<td><?php echo $regular_shift->regular_name; ?></td>
			<td><?php Helper_Shift_Regular::shift_condition($regular_shift->regular_condition); ?></td>
			<td><?php echo Html::anchor('shift/regular/detail/'.$regular_shift->id, '<i class="fa fa-search">&nbsp;確認',array('class'=>'uk-button uk-button-success')); ?></td>
				<td><?php echo Html::anchor('manage/shift/regular/edit_shift/'.$regular_shift->id.'/info', '<i class="fa fa-pencil-square-o">&nbsp;シフト編集',array('class'=>'uk-button uk-button-primary')); ?></td>
				<td><?php echo Html::anchor('shift/regular/output_pdf/'.$regular_shift->id, '<i class="fa fa-file-text-o"></i>&nbsp;PDF',array('class'=>'uk-button uk-button-danger')) ?></td>
				<td><?php echo Html::anchor('manage/shift/delete_regular/'.$regular_shift->id, '<i class="fa fa-trash-o"></i>&nbsp;削除', array('class' => 'uk-button uk-danger', 'onclick' => "return confirm('削除します。よろしいですか？')")); ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
<h4>イレギュラーシフト一覧</h4>
<table class="uk-table" >
	<thead>
		<tr>
			<td>シフト名</td>
			<td>状態</td>
			<td colspan="4">操作<td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($irregular_shifts as $irregular_shift): ?>
			<tr class="<?php Helper_Shift_Irregular::shift_condition_color($irregular_shift->irregular_condition); ?>">
				<td><?php echo $irregular_shift->irregular_name; ?></td>
				<td><?php Helper_Shift_Irregular::shift_condition($irregular_shift->irregular_condition); ?></td>
				<td><?php echo Html::anchor('shift/irregular/detail/'.$irregular_shift->id, '<i class="fa fa-search">&nbsp;確認',array('class'=>'uk-button uk-button-success')); ?></td>
				<td><?php echo Html::anchor('manage/shift/irregular/edit_shift/'.$irregular_shift->id.'/info', '<i class="fa fa-pencil-square-o">&nbsp;シフト編集',array('class'=>'uk-button uk-button-primary')); ?></td>
				<td><?php echo Html::anchor('shift/irregular/output_pdf/'.$irregular_shift->id, '<i class="fa fa-file-text-o"></i>&nbsp;PDF',array('class'=>'uk-button uk-button-danger')) ?></td>
				<td><?php echo Html::anchor('manage/shift/delete_irregular/'.$irregular_shift->id, '<i class="fa fa-trash-o"></i>&nbsp;削除', array('class' => 'uk-button uk-danger', 'onclick' => "return confirm('削除します。よろしいですか？')")); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
