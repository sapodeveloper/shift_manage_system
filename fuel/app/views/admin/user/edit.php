<?php
	$condition_data = array(0 => '無効', 1 => '有効');
?>
<h2><?php echo $user->full_name; ?>さんのスタッフ情報編集</h2>
<div class="uk-grid">
	<div class="uk-width-2-3">
		<?php echo Form::open(array("action" => "admin/user/edit/".$user->id)); ?>
			<table class="uk-table">
				<tr>
					<td class="uk-width-1-3">ログイン名(学生番号)</td>
					<td>
						<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => '', 'placeholder'=>'学生番号','size'=>7)); ?>
					</td>
				</tr>
				<tr>
					<td>スタッフ名</td>
					<td>
						<?php echo Form::input('frist_name', Input::post('frist_name', isset($user) ? $user->frist_name : ''), array('class' => '', 'placeholder'=>'名字','size'=>5)); ?>
						<?php echo Form::input('last_name', Input::post('last_name', isset($user) ? $user->last_name : ''), array('class' => '', 'placeholder'=>'名前','size'=>5)); ?>
					</td>
				</tr>
				<tr>
					<td>入学年度</td>
					<td>
						<?php echo Form::input('year', Input::post('year', isset($user) ? $user->year : ''), array('class' => '', 'placeholder'=>'入学年度','size'=>4)); ?>
					</td>
				</tr>
				<tr id="department">
					<td>学部</td>
					<td>
						<?php echo Form::select('department_id', $user->department_id, $department_data, array('class' => '', 'id' => 'department_id')); ?>
					</td>
				</tr>
				<tr id="cource_list">
					<td>学科</td>
					<td>
						<?php echo Form::select('cource_id', $user->cource_id, $cource_data, array('class' => '', 'id' => 'cource_id')); ?>
					</td>
				</tr>
				<tr>
					<td>メールアドレス</td>
					<td>
						<?php echo $user->email; ?>
					</td>
				</tr>
				<tr>
					<td>アクセス権限</td>
					<td>
						<?php echo Form::select('auth_id', $user->auth_id, $auth_data, array('class' => '', 'id' => 'auth_id')); ?>
					</td>
				</tr>
				<tr>
					<td>状態</td>
					<td>
						<?php echo Form::select('condition', $user->condition, $condition_data, array('class' => '', 'id' => 'auth_id')); ?>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><?php echo Form::submit('submit', 'Update', array('class' => 'uk-button')); ?></td>
				</tr>
			</table>
		<?php echo Form::close(); ?>	
	</div>
</div>
<?php echo Html::anchor('admin/user/', 'ユーザ情報'); ?>
