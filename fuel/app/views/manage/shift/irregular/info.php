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
			<?php foreach ($irregular_shift_users as $irregular_shift_user): ?>
				<tr>
					<td><?php echo $irregular_shift_user->full_name; ?></td>
					<?php Helper_Shift_Irregular::shift_table($irregular_shift->id, $irregular_shift_user->user_id); ?>
				</tr>
			<?php endforeach; ?>
		</table>
		<br>

		<div class="uk-button-group">
			<?php echo Html::anchor('shift/irregular/output_pdf/'.$irregular_shift->id, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-file-text"></i>&nbsp;PDF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',array('class'=>'uk-button uk-button-primary', 'target'=>'_blank')); ?>
			<?php if($irregular_shift->irregular_condition == 3): ?>
				<button class="uk-button uk-button-success condition" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-cloud-upload"></i>&nbsp;公開&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
			<?php else: ?>
				<button class="uk-button uk-button-warning condition" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-cloud-upload"></i>&nbsp;非公開&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
			<?php endif; ?>
			<?php if($irregular_shift->irregular_condition == 1): ?>
				<button class="uk-button uk-button-danger public" id="<?php echo $irregular_shift->id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-minus-circle"></i>&nbsp;募集停止&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
			<?php else: ?>
				<button class="uk-button uk-button-success public" id="<?php echo $irregular_shift->id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-plus-circle"></i>&nbsp;募集再開&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
			<?php endif; ?>
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
				<?php foreach ($irregular_shift_users as $irregular_shift_user): ?>
					<tr>
						<td><?php echo $irregular_shift_user->full_name; ?></td>
						<td><?php echo Helper_Shift_Irregular::deside_work_time_count($irregular_shift->id, $irregular_shift_user->user_id); ?></td>
						<td><?php echo Helper_Shift_Irregular::deside_work_day_count($irregular_shift->id, $irregular_shift_user->user_id); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$(".public").click(function(){
			url = "change_entry_condition/";
			$.ajax(url, {"complete": function(){
				location.reload();
			}});
		});

		$(".conditon").click(function(){
			url = "change_condition/";
			$.ajax(url, {"complete": function(){
				location.reload();
			}});
		});
	});
</script>
