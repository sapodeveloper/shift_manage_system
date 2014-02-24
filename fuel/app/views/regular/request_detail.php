<h2>「<?php echo $regular_shift->regular_name; ?>」の申請状況</h2>
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
					<td><?php echo $request->regular_day->regular_day_name; ?></td>
					<td></td>
					<td><?php echo $request->user_comment; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo Html::anchor('regular/request/'.$regular_shift->id, '<i class="fa fa-pencil-square-o"></i>&nbsp;申請修正', array('class' => 'uk-button uk-button-primary')); ?>
<?php else: ?>
	<p>申請していません</p>
	<?php echo Html::anchor('regular/request/'.$regular_shift->id, '<i class="fa fa-upload"></i>&nbsp;申請', array('class' => 'uk-button uk-button-primary')); ?>
<?php endif; ?>
