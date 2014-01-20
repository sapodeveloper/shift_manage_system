[<?php echo $irregular_shift->irregular_name; ?>]の編集
<br><br>
<ul class="uk-tab uk-tab-grid uk-tab-bottom" id="tab">
	<li class="uk-width-1-<?php echo count(${'irregular_shift_days'})+1; ?>">
		<?php echo Html::anchor('manage/shift/irregular/edit_shift/'.$irregular_shift->id.'/info', '概要'); ?>
	</li>
	<?php foreach ($irregular_shift_days as $irregular_shift_day): ?>
		<li class="uk-width-1-<?php echo count(${'irregular_shift_days'})+1; ?>">
			<?php echo Html::anchor('manage/shift/irregular/edit_shift/'.$irregular_shift->id.'/edit_shift_day/'.$irregular_shift_day->id, $irregular_shift_day->irregular_day_name); ?>
		</li>
	<?php endforeach; ?>
</ul>