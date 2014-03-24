<?php //$entrue="uk-button-primary uk-active";$enfalse="uk-button-success"; ?>
<?php $entrue="uk-button-success uk-active";$enfalse=""; ?>
<h6 class="uk-article-title">
	<?php echo $regular_shift->regular_name; ?>の<?php echo $set; ?>
</h6>
<?php echo Form::open(array("action" => "regular/request/".$id)); ?>
<?php $i=1; ?>
<table class="uk-table uk-table-striped uk-text-bold uk-text-large">
	<thead>
		<tr>
			<td class="uk-text-center" colspan="2">
				<blockquote>勤務可能な時間を入力してください。</blockquote>
			</td>
			<td class="uk-text-center">
				<blockquote>備考</blockquote>
			</td>
		</tr>
	</thead>
	<tbody>
<?php foreach($regular_days as $regular_day): ?>
		<tr>
			<td class="uk-text-center"><?php echo $regular_day->regular_day_name; ?></td>
			<td>
				<div class="uk-button-group">
					<button class="uk-button shift_button" type="button" value="1" name="repuest_day[]">一時限目</button>
					<button class="uk-button shift_button" type="button" value="2" name="repuest_day[]">二時限目</button>
					<button class="uk-button shift_button" type="button" value="3" name="repuest_day[]">三時限目</button>
					<button class="uk-button shift_button" type="button" value="4" name="repuest_day[]">四時限目</button>
					<button class="uk-button shift_button" type="button" value="5" name="repuest_day[]">五時限目</button>
				<div>
				<?php echo Form::hidden('request_start'.$i,$regular_user[$i]->request_start,array('class'=>'')); ?>
				<?php echo Form::hidden('request_end'.$i,$regular_user[$i]->request_end,array('class'=>'')); ?>
			</td>	
			<td class="uk-text-center">
				<?php echo Form::input('user_comment'.$i,$regular_user[$i]->user_comment,array('class'=>''))."\n"; ?>
			</td>
		</tr>
<?php $i++; ?>
<?php endforeach; ?>
	</tbody>
</table>
				<script>
					<!--
					$(function(){
						$('.shift_button').click(function(){
							$(this).toggleClass('<?php echo $entrue." ".$enfalse; ?>');
							var thisval = $(this).val();
							var hideval = $(this).parent().next(".hidden_field").val();
							var setval;
							if(thisval==1){
								if(hideval%2==0){
									setval = Number(hideval)+1;
								}else{
									setval = Number(hideval)-1;
								}
							}else{
								if(hideval<2){
									setval = Number(hideval)+2;
								}else{
									setval = Number(hideval)-2;
								}
							}
							$(this).parent().next(".hidden_field").val(setval);
//							alert("thisval = "+thisval+"\nhideval = "+hideval+"\nsetval = "+setval);
						});
					});
					//-->
				</script>
<button style="text-align: center;" class="uk-button uk-button-primary uk-h3" type="submit">&nbsp;<i class="fa fa-refresh"></i>&nbsp;この内容で<?php echo $set; ?>する&nbsp;&nbsp;&nbsp;</button>
<?php echo Form::close(); ?>
