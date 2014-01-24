<h3>編集可能シフト一覧</h3>
<?php if($receiving_irregulars): ?>
<h3>申請受付中イレギュラーシフト</h3>
<table class="uk-table uk-table-hover">
	<thead>
		<tr>
			<th>シフト名</th>
			<th>申請期限</th>
			<th>状態</th>
			<th colspan="2"></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($receiving_irregulars as $r_irregular): ?>
			<tr>
				<td><?php echo $r_irregular->irregular_name; ?></td>
				<td><?php echo date( 'Y年m月d日', strtotime($r_irregular->irregular_limitdate)); ?></td>
				<td></td>
				<td><?php echo Html::anchor('manage/shift/irregular/edit_shift/'.$r_irregular->id.'/info', '編集', array('class' => 'uk-button')); ?></td>
				<td><a href="#" class="uk-button">申請受付を終了する</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endif; ?>

<br>
