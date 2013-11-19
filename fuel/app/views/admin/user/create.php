<?php
	$department_name = array(1 => "工学部", 2 => "情報学部", 3 => "環境学部", 4 => "生命学部");
	$cource_name = array(1 => "知的情報システム学科", 2 => "情報工学科");
	$auth = array(3 => "一般スタッフ", 5 => "リーダ", 6 => "システム管理者");
?>
<meta charset="utf-8">
<h2>新規スタッフ登録</h2>
<div class="uk-grid">
	<div class="uk-width-1-2">
		<?php echo Form::open(array("action" => "admin/user/create")); ?>
			<table class="uk-table">
				<tr>
					<td class="uk-width-1-3">ログイン名(学生番号)</td>
					<td>
						<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => '', 'placeholder'=>'学生番号')); ?>
					</td>
				</tr>
				<tr>
					<td>スタッフ名</td>
					<td>
						<?php echo Form::input('frist_name', Input::post('frist_name', isset($user) ? $user->frist_name : ''), array('class' => '', 'placeholder'=>'名字')); ?>
						<?php echo Form::input('last_name', Input::post('last_name', isset($user) ? $user->last_name : ''), array('class' => '', 'placeholder'=>'名前')); ?>
					</td>
				</tr>
				<tr>
					<td>入学年度</td>
					<td>
						<?php echo Form::input('year', Input::post('year', isset($user) ? $user->year : ''), array('class' => '', 'placeholder'=>'入学年度')); ?>
					</td>
				</tr>
				<tr>
					<td>学部</td>
					<td>
						<?php echo Form::select('department_id', null, $department_name, array('class' => '', 'id' => 'department_id')); ?>
					</td>
				</tr>
				<tr>
					<td>学科</td>
					<td>
						<?php echo Form::select('cource_id', null, $cource_name, array('class' => '', 'id' => 'cource_id')); ?>
					</td>
				</tr>
				<tr>
					<td>メールアドレス</td>
					<td>
						<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => '', 'placeholder'=>'メールアドレス')); ?>
					</td>
				</tr>
				<tr>
					<td>アクセス権限</td>
					<td>
						<?php echo Form::select('group_id', null, $auth, array('class' => '', 'id' => 'group')); ?>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><?php echo Form::submit('submit', 'Save', array('class' => '')); ?></td>
				</tr>
			</table>
		<?php echo Form::close(); ?>	
	</div>
</div>
<?php echo Html::anchor('admin/user/', 'ユーザ情報'); ?>
