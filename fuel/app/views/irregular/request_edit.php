<h3>シフト申請</h3>
<table>
<?php foreach($irregular_days as $irregular_day): ?>
	<tr>
		<td><?php echo $irregular_day->irregular_day_name; ?></td>
		<td><?php echo Html::anchor('irregular/request_edit/'.$irregular_day->id, '入力', array('class' => 'uk-button')); ?></td>
	</tr>
<?php endforeach; ?>
</table>
<pre>
<?php //print_r($irregular); ?>
</pre>
