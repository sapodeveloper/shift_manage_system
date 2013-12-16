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
						<div class="uk-button-group" data-uk-button-checkbox>
							<?php if($irregular_shift_user->request_shift_type == 1): ?>
								<button class="uk-button uk-button-success uk-active"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</button>
								<button class="uk-button uk-button-success"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</button>
							<?php elseif($irregular_shift_user->request_shift_type == 2): ?>
								<button class="uk-button uk-button-success"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</button>
								<button class="uk-button uk-button-success uk-active"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</button>
							<?php elseif($irregular_shift_user->request_shift_type == 3): ?>
								<button class="uk-button uk-button-success uk-active"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</button>
								<button class="uk-button uk-button-success uk-active"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</button>
							<?php endif; ?>
						</div>
					</td>
					<td rowspan="2">
						<button class="uk-button uk-button-success">更新</button>
					</td>
				</tr>
				<tr>
					<td>編集</td>
					<td>
						<div class="uk-button-group" data-uk-button-checkbox>
							<?php if($irregular_shift_user->edited_shift_type == 1): ?>
								<button class="uk-button uk-button-primary uk-active"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</button>
								<button class="uk-button uk-button-primary"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</button>
							<?php elseif($irregular_shift_user->edited_shift_type == 2): ?>
								<button class="uk-button uk-button-primary"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</button>
								<button class="uk-button uk-button-primary uk-active"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</button>
							<?php elseif($irregular_shift_user->edited_shift_type == 3): ?>
								<button class="uk-button uk-button-primary uk-active"><i class="fa fa-sun-o"></i> 10時〜13時（午前）</button>
								<button class="uk-button uk-button-primary uk-active"><i class="fa fa-moon-o"></i> 13時〜17時（午後）</button>
							<?php endif; ?>
						</div>
					</td>
				</tr>
				</tr>
			<?php endforeach; ?>
	</table>
</div>