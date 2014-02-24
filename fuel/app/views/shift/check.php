<h3>シフト確認</h3>
<br>
<?php if($decision_regulars): ?>
<h3>確定レギュラーシフト</h3>
<table class="uk-table uk-table-hover">
	<thead>
		<tr>
			<th>シフト名</th>
			<th>有効期限</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($decision_regulars as $regular): ?>
			<tr>
				<td><?php echo $regular->regular_name; ?></td>
				<td><?php echo Html::anchor('shift/regular/detail/'.$irregular->id, '<i class="fa fa-search"></i>&nbsp;確認',array('class'=>'uk-button uk-button-success')); ?></td>
				<td><?php echo Html::anchor('shift/regular/output_pdf/'.$irregular->id, '<i class="fa fa-file-text-o"></i>&nbsp;PDF',array('class'=>'uk-button uk-button-danger')); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endif; ?>

<br>

<?php if($decision_irregulars): ?>
<h3>確定イレギュラーシフト</h3>
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
		<?php foreach ($decision_irregulars as $irregular): ?>
			<tr>
				<td><?php echo $irregular->irregular_name; ?></td>
				<td><?php echo date( 'Y年m月d日', strtotime($irregular->irregular_enabledate)); ?></td>
				<td><?php echo Html::anchor('shift/irregular/detail/'.$irregular->id, '<i class="fa fa-search"></i>&nbsp;確認',array('class'=>'uk-button uk-button-success')); ?></td>
				<td><?php echo Html::anchor('shift/irregular/output_pdf/'.$irregular->id, '<i class="fa fa-file-text-o"></i>&nbsp;PDF',array('class'=>'uk-button uk-button-danger')); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endif; ?>
