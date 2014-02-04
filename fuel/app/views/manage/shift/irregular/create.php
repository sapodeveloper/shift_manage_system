<h3>新規イレギュラーシフト作成</h3>
<br>
<div class="uk-grid">
	<div class="uk-width-1-1">
		<?php echo Form::open(array("action" => "manage/shift/irregular/create")); ?>
	 
	<table class="uk-table" >
		<tr>
			<td><i class="fa fa-pencil"></i>&nbsp;シフト名：</td>
			<td><?php echo Form::input('irregular_name', Input::post('irregular_name', isset($irregular) ? $irregular->irregular_name : ''), array('class' => '', 'placeholder'=>'新規シフト名入力')); ?></td>
		</tr>
		<tr>
			<td><i class="fa fa-clock-o"></i>&nbsp;申請締切日：</td>
			<td><input type="text" data-uk-datepicker="{ weekstart:0, format:'YYYY/MM/DD', i18n: { months:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'], weekdays:['日','月','火','水','木','金','土'] }}" size=10 placeholder="入力期限" readonly name="limitdate" value=""></td>
		</tr>
		<tr>
			<td rowspan="5"><i class="fa fa-clock-o"></i>&nbsp;入力日</td>
			<td><input type="text" data-uk-datepicker="{ weekstart:0, format:'YYYY/MM/DD', i18n: { months:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'], weekdays:['日','月','火','水','木','金','土'] }}" size=10 placeholder="1日目" readonly name="irregular_date[]" value=""></td>
		</tr>
		<tr>
			<td><input type="text" data-uk-datepicker="{ weekstart:0, format:'YYYY/MM/DD', i18n: { months:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'], weekdays:['日','月','火','水','木','金','土'] }}" size=10 placeholder="2日目" readonly name="irregular_date[]" value=""></td>
		</tr>
		<tr>
			<td><input type="text" data-uk-datepicker="{ weekstart:0, format:'YYYY/MM/DD', i18n: { months:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'], weekdays:['日','月','火','水','木','金','土'] }}" size=10 placeholder="3日目" readonly name="irregular_date[]" value=""></td>
		</tr>
		<tr>
			<td><input type="text" data-uk-datepicker="{ weekstart:0, format:'YYYY/MM/DD', i18n: { months:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'], weekdays:['日','月','火','水','木','金','土'] }}" size=10 placeholder="4日目" readonly name="irregular_date[]" value=""></td>
		</tr>
		<tr>
			<td><input type="text" data-uk-datepicker="{ weekstart:0, format:'YYYY/MM/DD', i18n: { months:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'], weekdays:['日','月','火','水','木','金','土'] }}" size=10 placeholder="5日目" readonly name="irregular_date[]" value=""></td>
		</tr>
		<tr>
			<td colspan="2">
				<button class="uk-button uk-button-primary" type="submit">
					<i class="fa fa-pencil"></i>&nbsp;シフト作成
				</button>
			</td>
		</tr>
	</table>
	<?php echo Form::close(); ?>
	</div>
</div>
<?php echo Html::anchor('manage/shift/new', '<i class="fa fa-check-square-o"></i>&nbsp;シフト作成選択',array('class'=>'uk-button uk-button-success')); ?>

