<tr>
	<td rowspan="2"><?php echo $regular_shift_user->users->full_name; ?></td>
	<td>希望 : 
	</td>
	<td>編集後 : <?php Helper_Shift::regular_work_type($regular_shift_user->edited_shift_type); ?>
	</td>
</tr>
<tr>
	<td colspan="4">
		<div class="uk-button-group" id="work<?php echo $regular_shift_user->id; ?>" data-uk-button-checkbox>
			<?php if($regular_shift_user->edited_shift_type == 1): ?>
				<button class="uk-button uk-button-primary uk-active check1-<?php echo $regular_shift_user->id; ?>"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</button>
				<button class="uk-button uk-button-primary check2-<?php echo $regular_shift_user->id; ?>"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</button>
			<?php elseif($regular_shift_user->edited_shift_type == 2): ?>
				<button class="uk-button uk-button-primary check1-<?php echo $regular_shift_user->id; ?>"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</button>
				<button class="uk-button uk-button-primary uk-active check2-<?php echo $regular_shift_user->id; ?>"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</button>
			<?php elseif($regular_shift_user->edited_shift_type == 3): ?>
				<button class="uk-button uk-button-primary uk-active check1-<?php echo $regular_shift_user->id; ?>"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</button>
				<button class="uk-button uk-button-primary uk-active check2-<?php echo $regular_shift_user->id; ?>"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</button>
			<?php elseif($regular_shift_user->edited_shift_type == 4): ?>
				<button class="uk-button uk-button-primary check1-<?php echo $regular_shift_user->id; ?>"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</button>
				<button class="uk-button uk-button-primary check2-<?php echo $regular_shift_user->id; ?>"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</button>
			<?php endif; ?>
		</div>
		<?php if(Helper_Shift::user_shift_lock($regular_shift_user->id) == "true"): ?>
			<button class='uk-button uk-button-success update-<?php echo $regular_shift_user->id; ?>' disabled>更新</button>
		<?php else: ?>
			<button class='uk-button uk-button-success update-<?php echo $regular_shift_user->id; ?>'>更新</button>
		<?php endif; ?>
	</td>
</tr>

<script type="text/javascript">
	$(function(){
		$(".update-<?php echo $regular_shift_user->id; ?>").click(function(){
			if($(".check1-<?php echo $regular_shift_user->id; ?>").hasClass("uk-active")){
				if($(".check2-<?php echo $regular_shift_user->id; ?>").hasClass("uk-active")){
					url = "../edit_user_shift/<?php echo $regular_shift_user->id; ?>/3"
				}else{
					url = "../edit_user_shift/<?php echo $regular_shift_user->id; ?>/1"
				}
			}else{
				if($(".check2-<?php echo $regular_shift_user->id; ?>").hasClass("uk-active")){
					url = "../edit_user_shift/<?php echo $regular_shift_user->id; ?>/2"
				}else{
					url = "../edit_user_shift/<?php echo $regular_shift_user->id; ?>/4"
				}
			}
			$.ajax(url, {"complete": function(){
				$("#<?php echo $regular_shift_user->id; ?>").load(
					$.ajax('../edit_shift_user/<?php echo $regular_shift_user->id; ?>', {"complete": function(xhr,status){
						window.xhr = xhr;
						$("#<?php echo $regular_shift_user->id; ?>").html($(xhr.responseText));
						$.ajax('../entry_list', {"complete": function(xhr,status){
							window.xhr = xhr;
							$("#entry_list").html($(xhr.responseText));
						}})
					}})
				);
			}});
		})
	});
</script>
