<h3>シフト申請</h3>
<br>
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
				<td><?php echo $r_regular->irregular_name; ?></td>
				<td><?php echo date( 'Y年m月d日 H時i分', strtotime($r_regular->regular_limitdate)); ?></td>
				<td><?php echo Html::anchor('regular/request/'.$r_regular->id, '申請', array('class' => 'uk-button')); ?></td>
				<td><?php echo Html::anchor('regular/request_detail/'.$r_regular->id, '確認', array('class' => 'uk-button')); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endif; ?>

