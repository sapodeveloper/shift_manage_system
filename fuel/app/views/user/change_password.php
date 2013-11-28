<h2><?php echo $user->full_name; ?>さんのパスワード変更</h2>
<div class="uk-grid">
	<div class="uk-width-1-2">
		<?php echo Form::open(array("action" => "user/change_password")); ?>
			<table class="uk-table">
				<tr>
					<td class="uk-width-1-3">現パスワード</td>
					<td>
						<?php echo Form::password('old_password', Input::post('old_password', ''), array('class' => '')); ?>
					</td>
				</tr>
				<tr>
					<td class="uk-width-1-3">新パスワード</td>
					<td>
						<?php echo Form::password('new_password', Input::post('new_password', ''), array('class' => '')); ?>
					</td>
				</tr>
				<tr>
					<td class="uk-width-1-3">新パスワード(再度)</td>
					<td>
						<?php echo Form::password('check_new_password', Input::post('check_new_password', ''), array('class' => '')); ?>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><?php echo Form::submit('submit', 'Update', array('class' => '')); ?></td>
				</tr>
			</table>
		<?php echo Form::close(); ?>	
	</div>
</div>
<?php echo Html::anchor('user', '戻る'); ?>
