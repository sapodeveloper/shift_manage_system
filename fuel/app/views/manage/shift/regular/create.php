<h3>新規レギュラーシフト作成</h3>
<br>
<div class="uk-grid">
	<div class="uk-width-1-2">
		<?php echo Form::open(array("action" => "manage/shift/regular/create")); ?>
<form method=”POST” action=””>	 
<table class="uk-table" width="800">
	<tr>
		<td><i class="fa fa-pencil"></i>
		シフト名：<?php echo Form::input('regular_name', Input::post('regular_name', isset($regular) ? $regular->regular_name : ''), array('class' => '', 'placeholder'=>'新規シフト名入力')); ?></td>
	</tr>
	<tr>
		<td colspan="2"><i class="fa fa-clock-o"></i>
		申請締切日：<input type="text" data-uk-datepicker="{ weekstart:0, format:'YYYY/MM/DD', i18n: { months:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'], weekdays:['日','月','火','水','木','金','土'] }}" size=10 placeholder="クリック" readonly name="limitdate" value="">の24:00まで</td>
	</tr>
</table>
	 
<table>
	<tr>
		<td colspan="5">クリックしてカレンダーから日時を選択してください。</td>
	</tr>
	<tr>
		<td><input type="text" data-uk-datepicker="{ weekstart:0, format:'YYYY/MM/DD', i18n: { months:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'], weekdays:['日','月','火','水','木','金','土'] }}" size=10 placeholder="開始" readonly name="irregular_start_date" value=""></td>
		<td><input type="text" data-uk-datepicker="{ weekstart:0, format:'YYYY/MM/DD', i18n: { months:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'], weekdays:['日','月','火','水','木','金','土'] }}" size=10 placeholder="終了" readonly name="regular_end_date" value=""></td>
	</tr>
</table>

<table class="uk-table" width="600">
	<tr>
		<td colspan="7"><?php echo Form::submit('submit', 'シフト作成', array('class' => '')); ?></td>
	</tr>
</table>
</form>
</div>
</div>
<?php echo Html::anchor('manage/shift/new', 'シフト作成選択'); ?>

