<h3>シフト一覧</h3>
<?php if($decision_regulars): ?>
<h3>確定レギュラーシフト</h3>
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
		<?php foreach ($decision_regulars as $regular): ?>
			<tr>
				<td><?php echo $regular->irregular_name; ?></td>
				<td><?php echo date( 'Y年m月d日', strtotime($regular->regular_enabledate)); ?></td>
				<td><?php echo Html::anchor('shift/regular/detail/'.$regular->id, '確認'); ?></td>
				<td><?php echo Html::anchor('shift/regular/output_pdf/'.$regular->id, 'PDF'); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endif; ?>
<?php if($receiving_regulars): ?>
<h3>申請受付中レギュラーシフト</h3>
<table class="uk-table uk-table-hover">
	<thead>
		<tr>
			<th>シフト名</th>
			<th>申請期限</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($receiving_regulars as $r_regular): ?>
			<tr>
				<td><?php echo $r_regular->regular_name; ?></td>
				<td><?php echo date( 'Y年m月d日 H時i分', strtotime($r_regular->irregular_limitdate)); ?></td>
				<td><?php echo Html::anchor('manage/shift/delete/'.$r_regular->id, '削除', array('class' => 'btn btn-danger', 'onclick' => "return confirm('削除します。よろしいですか？')")); ?></td>
				<td><?php echo Html::anchor('shift/regular/detail/'.$r_regular->id, '確認'); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endif; ?>
<?php if($decision_irregulars): ?>
<h3>確定イレギュラーシフト</h3>
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
				<td><?php echo Html::anchor('shift/irregular/detail/'.$irregular_shift->id, '<i class="fa fa-search">&nbsp;確認',array('class'=>'uk-button uk-button-success')); ?></td>
				<td><?php echo Html::anchor('manage/shift/irregular/edit_shift/'.$irregular_shift->id.'/info', '<i class="fa fa-pencil-square-o"></i>&nbsp;シフト編集',array('class'=>'uk-button uk-button-primary')); ?></td>
				<td><?php echo Html::anchor('shift/irregular/output_pdf/'.$irregular_shift->id, '<i class="fa fa-file-text-o"></i>&nbsp;PDF',array('class'=>'uk-button uk-button-danger')); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
