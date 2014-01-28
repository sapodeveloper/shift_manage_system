<h6 class="uk-article-lead">[<?php echo $irregular_shift->irregular_name; ?>]の編集</h6>
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

<div class="uk-grid">
	<div class="uk-width-medium-4-6">
		<br>
		<div><?php echo $irregular_shift->irregular_name; ?></div>
		<div class="uk-alert uk-alert-success uk-text-center"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;作成日&nbsp;&nbsp;<?php echo date( 'Y年m月d日', $irregular_shift->created_at); ?></div>
		<div class="uk-alert uk-alert-danger uk-text-center"><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;入力期限&nbsp;&nbsp;<?php echo date( 'Y年m月d日', strtotime($irregular_shift->irregular_limitdate)); ?></div>
		<div>エントリー状況</div>
		<div class="uk-progress uk-progress-striped uk-progress-mini uk-progress-success ">
		<div class="uk-progress-bar  uk-progress-mini uk-progress-success " data-uk-tooltip title="40人中、10人がエントリー済みです。" style="width: 30%;"></div>
		</div>
		<div>個別勤務時間</div>
		<table border="1" width=100% class="uk-text-center">
			<tr>
				<td>名前</td>
				<?php foreach ($irregular_shift_days as $irregular_shift_day): ?>
					<td colspan="2"><?php echo $irregular_shift_day->irregular_day_name; ?></td>
				<?php endforeach; ?>
			</tr>
			<tr>
				<td>豊嶋駿仁</td>
				<td><i class="fa fa-sun-o"></i></td>
				<td><i class="fa fa-moon-o"></i></td>
				<td><i class="fa fa-sun-o"></i></td>
				<td><i class="fa fa-moon-o"></i></td>
				<td><i class="fa fa-sun-o"></i></td>
				<td><i class="fa fa-moon-o"></i></td>
				<td><i class="fa fa-sun-o"></i></td>
				<td><i class="fa fa-moon-o"></i></td>
				<td><i class="fa fa-sun-o"></i></td>
				<td><i class="fa fa-moon-o"></i></td>
			</tr>
			<tr>
				<td>三澤湧樹</td>
				<td style="background-color: #a9f5a9;"><i class="fa fa-sun-o"></i></td>
				<td style="background-color: #a9f5a9;"><i class="fa fa-moon-o"></i></td>
				<td style="background-color: #a9f5a9;"><i class="fa fa-sun-o"></i></td>
				<td style="background-color: #a9f5a9;"><i class="fa fa-moon-o"></i></td>
				<td style="background-color: #a9f5a9;"><i class="fa fa-sun-o"></i></td>
				<td style="background-color: #a9f5a9;"><i class="fa fa-moon-o"></i></td>
				<td style="background-color: #a9f5a9;"><i class="fa fa-sun-o"></i></td>
				<td style="background-color: #a9f5a9;"><i class="fa fa-moon-o"></i></td>
				<td style="background-color: #a9f5a9;"><i class="fa fa-sun-o"></i></td>
				<td style="background-color: #a9f5a9;"><i class="fa fa-moon-o"></i></td>
			<tr>
		</table>
		<br>

		<div class="uk-button-group">
			<button class="uk-button uk-button-primary" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-file-text"></i>&nbsp;PDF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
			<button class="uk-button uk-button-success" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-cloud-upload"></i>&nbsp;公開&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
			<button class="uk-button uk-button-danger" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-minus-circle"></i>&nbsp;募集停止&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
		</div>
	</div>
	<div class="uk-width-medium-2-6">
		<br>
		<table border="1" width=100% class="uk-text-center">
			<tbody>
				<tr>
					<td>スタッフ名</td>
					<td>時間</td>
					<td>日数</td>
				</tr>
				<tr>
					<td>豊嶋駿仁</td>
					<td>-</td>
					<td>-</td>
				</tr>
				<tr>
					<td>三澤湧樹</td>
					<td>30:00</td>
					<td>5</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>