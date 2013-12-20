<?php //$entrue="uk-button-primary uk-active";$enfalse="uk-button-success"; ?>
<?php $entrue="uk-button-success uk-active";$enfalse=""; ?>
<h6 class="uk-article-title">
	<?php echo $irregular_shift->irregular_name; ?>の<?php echo $set; ?>
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
				<div class="uk-button-group" >
<?php if($irregular_user[$i]->request_shift_type==4){$shift_type=0;}else{$shift_type=$irregular_user[$i]->request_shift_type;} ?>
<?php if($shift_type%2==1){$am_active=$entrue;}else{$am_active=$enfalse;} ?>
<?php if($shift_type>=2){$pm_active=$entrue;}else{$pm_active=$enfalse;} ?>
					<button class="uk-button shift_button <?php echo $am_active; ?>" type="button" value="1"><i class="fa fa-sun-o"></i> 10時~13時(午前)</button>
					<button class="uk-button shift_button <?php echo $pm_active; ?>" type="button" value="2"><i class="fa fa-moon-o"></i> 13時~17時(午後)</button>
				</div>
				<?php echo Form::hidden('irregular_type_id'.$i,$shift_type,array('class'=>'hidden_field'))."\n"; ?>
			</td>
			<td class="uk-text-center">
				<?php echo Form::input('user_comment'.$i,$irregular_user[$i]->user_comment,array('class'=>''))."\n"; ?>
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
<button style="text-align: center;" class="uk-button uk-button-primary uk-h3" type="submit">&nbsp;&nbsp;この内容で<?php echo $set; ?>する&nbsp;<i class="fa fa-share"></i>&nbsp;&nbsp;</button>
<?php echo Form::close(); ?>
<pre>
<?php //print_r($irregular_user[1]); ?>
</pre>
