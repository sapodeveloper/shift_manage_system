<h6 class="uk-article-title">
	12月イレギュラーシフトの申請
</h6>
<?php echo Form::open(array("action" => "irregular/request/".$id)); ?>
<?php $i=1; ?>
<table class="uk-table uk-table-striped uk-text-bold uk-text-large">
	<thead>
		<tr>
			<td class="uk-text-center" colspan="2">
				<blockquote>勤務可能な時間帯をクリックしてください。</blockquote>
			</td>
			<td class="uk-text-center">
				<blockquote>備考</blockquote>
			</td>
		</tr>
	</thead>
	<tbody>
<?php foreach($irregular_days as $irregular_day): ?>
		<tr>
			<td class="uk-text-center"><?php echo $irregular_day->irregular_day_name; ?></td>
			<td class="uk-text-center">
				<div class="uk-button-group" data-uk-button-checkbox>
<?php if($irregular_user[$i]->request_shift_type==4){$shift_type=NULL;}else{$shift_type=$irregular_user[$i]->request_shift_type;} ?>
<?php if($shift_type%2==1){$am_active=" uk-active";}else{$am_active=NULL;} ?>
<?php if($shift_type>=2){$pm_active=" uk-active";}else{$pm_active=NULL;} ?>
					<button class="uk-button uk-button-success<?php echo $am_active; ?>" type="button" onClick=invalueAM<?php echo $i; ?>()><i class="fa fa-sun-o"></i> 10時~13時(午前)</button>
					<button class="uk-button uk-button-success<?php echo $pm_active; ?>" type="button" onClick=invaluePM<?php echo $i; ?>()><i class="fa fa-moon-o"></i> 13時~17時(午後)</button>
				</div>
			</td>
			<td class="uk-text-center">
				<?php echo Form::input('user_comment'.$i,$irregular_user[$i]->user_comment,array('class'=>''))."\n"; ?>
			</td>
			<td class="uk-text-center">
				<?php echo Form::hidden('irregular_type_id'.$i,$shift_type,array('id'=>'hidden_value'.$i))."\n"; ?>
				<?php echo Form::hidden('hidden_value'.$i.'_for_skip',1,array('id'=>'for_skip'.$i))."\n"; ?>
				<script>
					<!--
					function invalueAM<?php echo $i; ?>(){
						if(document.getElementById("for_skip<?php echo $i; ?>").value==1){
							document.getElementById("for_skip<?php echo $i; ?>").value = 0;
						}else{
							var val = Number(document.getElementById("hidden_value<?php echo $i; ?>").value);
							if(val%2==1){
								document.getElementById("hidden_value<?php echo $i; ?>").value = val-1;
							}else{
								document.getElementById("hidden_value<?php echo $i; ?>").value = val+1;
							}
						}
					}
					function invaluePM<?php echo $i; ?>(){
						if(document.getElementById("for_skip<?php echo $i; ?>").value==1){
							document.getElementById("for_skip<?php echo $i; ?>").value = 0;
						}else{
							var val = Number(document.getElementById("hidden_value<?php echo $i; ?>").value);
							document.getElementById("hidden_value<?php echo $i; ?>").value = val;
							if(val>=2){
								document.getElementById("hidden_value<?php echo $i; ?>").value = val-2;
							}else{
								document.getElementById("hidden_value<?php echo $i; ?>").value = val+2;
							}
						}
					}
					//-->
				</script>
			</td>
		</tr>
<?php $i++; ?>
<?php endforeach; ?>
	</tbody>
</table>
<button style="text-align: center;" class="uk-button uk-button-primary uk-h3" type="submit">&nbsp;&nbsp;この内容で申請する&nbsp;<i class="fa fa-share"></i>&nbsp;&nbsp;</button>
<?php echo Form::close(); ?>
<pre>
<?php //print_r($irregular_user[1]); ?>
</pre>
