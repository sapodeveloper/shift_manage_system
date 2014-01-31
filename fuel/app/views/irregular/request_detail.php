<h2>「<?php echo $irregular_shift->irregular_name; ?>」の申請状況</h2>
<?php if($requests): ?>
	<table class="uk-table uk-table-hover">
		<thead>
			<tr>
				<th>日付</th>
				<th>申請</th>
				<th>コメント</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($requests as $request): ?>
				<tr>
					<td><?php echo $request->irregular_day->irregular_day_name; ?></td>
					<td><?php Helper_Shift::irregular_work_type($request->request_shift_type); ?></td>
					<td><?php echo $request->user_comment; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo Html::anchor('irregular/request/'.$irregular_shift->id, '申請修正', array('class' => 'uk-button uk-button-primary')); ?>
<?php else: ?>
	<p>申請していません</p>
	<?php echo Html::anchor('irregular/request/'.$irregular_shift->id, '申請', array('class' => 'uk-button uk-button-primary')); ?>
<?php endif; ?>