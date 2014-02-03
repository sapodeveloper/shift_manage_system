<h3>シフト申請</h3>
<br>
<?php if($receiving_irregulars): ?>
<h3>申請受付中イレギュラーシフト</h3>
<table class="uk-table uk-table-hover">
	<thead>
		<tr>
			<th>シフト名</th>
			<th>申請期限</th>
			<th colspan="3"></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($receiving_irregulars as $r_irregular): ?>
			<tr>
				<td><?php echo $r_irregular->irregular_name; ?></td>
				<td><?php echo date( 'Y年m月d日', strtotime($r_irregular->irregular_limitdate)); ?></td>
				<td><?php echo Html::anchor('irregular/request/'.$r_irregular->id, '申請', array('class' => 'uk-button uk-button-primary')); ?></td>
				<td><?php echo Html::anchor('irregular/request_detail/'.$r_irregular->id, '申請確認', array('class' => 'uk-button uk-button-primary')); ?></td>
				<td><?php echo Html::anchor('shift/irregular/detail/'.$r_irregular->id, '全体確認', array('class' => 'uk-button uk-button-success')); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endif; ?>

