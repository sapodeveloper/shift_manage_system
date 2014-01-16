<script type="text/javascript">
	function edit_shift_user(value){
		
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
					<td rowspan="2"><?php echo $irregular_shift_user->users->full_name; ?></td>
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
					<td rowspan="2">
						<button class='uk-button uk-button-success' onclick="javascript:edit_shift_user(<?php echo $irregular_shift_user->id; ?>);">更新</button>
					</td>
				</tr>
				<tr>
					<td>編集</td>
					<td>
						<div class="uk-button-group" data-uk-button-checkbox>
							<?php if($irregular_shift_user->edited_shift_type == 1): ?>
								<div class="uk-button uk-button-primary uk-active"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</div>
								<div class="uk-button uk-button-primary"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</div>
							<?php elseif($irregular_shift_user->edited_shift_type == 2): ?>
								<div class="uk-button uk-button-primary"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</div>
								<div class="uk-button uk-button-primary uk-active"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</div>
							<?php elseif($irregular_shift_user->edited_shift_type == 3): ?>
								<div class="uk-button uk-button-primary uk-active"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</div>
								<div class="uk-button uk-button-primary uk-active"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</div>
							<?php endif; ?>
						</div>
					</td>
				</tr>
				
			<?php endforeach; ?>
	</table>
</div>