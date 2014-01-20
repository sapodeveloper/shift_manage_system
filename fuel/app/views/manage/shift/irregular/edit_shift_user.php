<tr>
	<td rowspan="3"><?php echo $irregular_shift_user->users->full_name; ?></td>
	<td>希望</td>
	<td>
			<?php Helper_Shift::irregular_work_type($irregular_shift_user->request_shift_type); ?>
	</td>
	<td rowspan="3">
		<button class='uk-button uk-button-success update-<?php echo $irregular_shift_user->id; ?>'>更新</button>
	</td>
</tr>
<tr>
	<td>編集後</td>
	<td>
			<?php Helper_Shift::irregular_work_type($irregular_shift_user->edited_shift_type); ?>
	</td>
</tr>
<tr>
	<td>編集</td>
	<td>
		<div class="uk-button-group" id="workg<?php echo $irregular_shift_user->id; ?>" data-uk-button-checkbox>
			<?php if($irregular_shift_user->edited_shift_type == 1): ?>
				<button class="uk-button uk-button-primary uk-active check1-<?php echo $irregular_shift_user->id; ?>"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</button>
				<button class="uk-button uk-button-primary check2-<?php echo $irregular_shift_user->id; ?>"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</button>
			<?php elseif($irregular_shift_user->edited_shift_type == 2): ?>
				<button class="uk-button uk-button-primary check1-<?php echo $irregular_shift_user->id; ?>"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</button>
				<button class="uk-button uk-button-primary uk-active check2-<?php echo $irregular_shift_user->id; ?>"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</button>
			<?php elseif($irregular_shift_user->edited_shift_type == 3): ?>
				<button class="uk-button uk-button-primary uk-active check1-<?php echo $irregular_shift_user->id; ?>"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</button>
				<button class="uk-button uk-button-primary uk-active check2-<?php echo $irregular_shift_user->id; ?>"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</button>
			<?php endif; ?>
		</div>
	</td>
</tr>

<script type="text/javascript">
	$(function(){
		$(".update-<?php echo $irregular_shift_user->id; ?>").click(function(){
			if($(".check1-<?php echo $irregular_shift_user->id; ?>").hasClass("uk-active")){
				if($(".check2-<?php echo $irregular_shift_user->id; ?>").hasClass("uk-active")){
					url = "../edit_user_shift/<?php echo $irregular_shift_user->id; ?>/3"
				}else{
					url = "../edit_user_shift/<?php echo $irregular_shift_user->id; ?>/1"
				}
			}else{
				if($(".check2-<?php echo $irregular_shift_user->id; ?>").hasClass("uk-active")){
					url = "../edit_user_shift/<?php echo $irregular_shift_user->id; ?>/2"
				}else{
					url = "../edit_user_shift/<?php echo $irregular_shift_user->id; ?>/4"
				}
			}
			$.ajax(url);
			$("#<?php echo $irregular_shift_user->id; ?>").load();
		})
	});
</script>