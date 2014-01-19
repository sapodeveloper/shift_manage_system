<script type="text/javascript">
	function edit_shift_user(value){
		var worker_id = 'work'+value
		var edit = document.getElementsByName(worker_id);
		var val1 = $(".check1", "#worker_id").hasClass("uk-active");
		alert(val1);
		
			var url = 'edit_shift_user/';
			url += value
			$.ajax(url);
		
	}
</script>
<style type="text/css">
	td {
		vertical-align: middle !important;
	}
</style>
<div id="irregular_shift_day">
	<table border="1" class="uk-table uk-width-7-10">
			<tr>
				<td>スタッフ名</td>
				<td colspan="2"></td>
				<td></td>
			</tr>
			<?php foreach ($irregular_shift_users as $irregular_shift_user): ?>
				
				<tr>
					<td rowspan="3"><?php echo $irregular_shift_user->users->full_name; ?></td>
					<td>希望</td>
					<td>
							<?php if($irregular_shift_user->request_shift_type == 1): ?>
								午前勤務
							<?php elseif($irregular_shift_user->request_shift_type == 2): ?>
								午後勤務
							<?php elseif($irregular_shift_user->request_shift_type == 3): ?>
								フル勤務
							<?php endif; ?>
					</td>
					<td rowspan="3">
						<button class='uk-button uk-button-success' onclick="javascript:edit_shift_user(<?php echo $irregular_shift_user->id; ?>);">更新</button>
					</td>
				</tr>
				<tr>
					<td>編集後</td>
					<td>
							<?php if($irregular_shift_user->edited_shift_type == 1): ?>
								午前勤務
							<?php elseif($irregular_shift_user->edited_shift_type == 2): ?>
								午後勤務
							<?php elseif($irregular_shift_user->edited_shift_type == 3): ?>
								フル勤務
							<?php endif; ?>
					</td>
				</tr>
				<tr>
					<td>編集</td>
					<td>
						<div class="uk-button-group" id="work<?php echo $irregular_shift_user->id; ?>" data-uk-button-checkbox>
							<?php if($irregular_shift_user->edited_shift_type == 1): ?>
								<button class="uk-button uk-button-primary uk-active check1"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</button>
								<button class="uk-button uk-button-primary check2"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</button>
							<?php elseif($irregular_shift_user->edited_shift_type == 2): ?>
								<button class="uk-button uk-button-primary check1"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</button>
								<button class="uk-button uk-button-primary uk-active check2"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</button>
							<?php elseif($irregular_shift_user->edited_shift_type == 3): ?>
								<button class="uk-button uk-button-primary uk-active check1"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</button>
								<button class="uk-button uk-button-primary uk-active check2"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</button>
							<?php endif; ?>
						</div>
					</td>
				</tr>
				
			<?php endforeach; ?>
	</table>
</div>