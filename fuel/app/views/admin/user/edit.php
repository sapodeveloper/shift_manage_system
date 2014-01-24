<?php
	$condition_data = array(0 => '無効', 1 => '有効');
?>
<center><h1 class="uk-article-title"><?php echo $user->full_name; ?>さんのスタッフ情報編集</h1></center>
<br>
<?php echo Form::open(array("action" => "admin/user/edit/".$user->id)); ?>
<fieldset>
	<div class="uk-grid" data-uk-grid-match>
		<div class="uk-width-medium-1-6">&nbsp;</div>
		<div class="uk-width-medium-2-6"><i class="fa fa-tag"></i>&nbsp;ログイン名（学生番号）</div>
		<div class="uk-width-medium-3-6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => '', 'placeholder'=>'学生番号')); ?></div>
	</div>
	<HR noshade>
	<div class="uk-grid" data-uk-grid-match>
		<div class="uk-width-medium-1-6">&nbsp;</div>
		<div class="uk-width-medium-2-6"><i class="fa fa-tag"></i>&nbsp;スタッフ名</div>
		
		<div class="uk-width-medium-3-6">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Form::input('frist_name', Input::post('frist_name', isset($user) ? $user->frist_name : ''), array('class' => '', 'placeholder'=>'名字', 'size' => 5)); ?>
						&nbsp;&nbsp;<?php echo Form::input('last_name', Input::post('last_name', isset($user) ? $user->last_name : ''), array('class' => '', 'placeholder'=>'名前', 'size' => 5)); ?>
		</div>
	</div>
	<HR noshade>
	<div class="uk-grid" data-uk-grid-match>
		<div class="uk-width-medium-1-6">&nbsp;</div>
		<div class="uk-width-medium-2-6"><i class="fa fa-envelope-o"></i>&nbsp;メールアドレス</div>
		<div class="uk-width-medium-3-6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user->email; ?></div>
	</div>
	<HR noshade>
	<div class="uk-grid" data-uk-grid-match>
		<div class="uk-width-medium-1-6">&nbsp;</div>
		<div class="uk-width-medium-2-6"><i class="fa fa-tag"></i>&nbsp;学部</div>
		<div class="uk-width-medium-3-6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo Form::select('department_id', $user->department_id, $department_data, array('class' => '', 'id' => 'department_id')); ?>
		</div>
	</div>
	<HR noshade>
	<div class="uk-grid" data-uk-grid-match>
		<div class="uk-width-medium-1-6">&nbsp;</div>
		<div class="uk-width-medium-2-6"><i class="fa fa-tag"></i>&nbsp;学科</div>
		<div class="uk-width-3-6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo Form::select('cource_id', $user->cource_id, $cource_data, array('class' => '', 'id' => 'cource_id')); ?>
		</div>
	</div>
	<HR noshade>
	<div class="uk-grid" data-uk-grid-match>
		<div class="uk-width-medium-1-6">&nbsp;</div>
		<div class="uk-width-medium-2-6"><i class="fa fa-tag"></i>&nbsp;入学年度</div>
		<div class="uk-width-medium-3-6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Form::input('year', Input::post('year', isset($user) ? $user->year : ''), array('class' => '', 'placeholder'=>'入学年度')); ?></div>
	</div>
	<HR noshade>
	<div class="uk-grid" data-uk-grid-match>
		<div class="uk-width-medium-1-6">&nbsp;</div>
		<div class="uk-width-medium-2-6"><i class="fa fa-tag"></i>&nbsp;アクセス権限</div>
		<div class="uk-width-medium-3-6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Form::select('auth_id', $user->auth_id, $auth_data, array('class' => '', 'id' => 'auth_id')); ?></div>
	</div>
	<HR noshade>
	<div class="uk-grid" data-uk-grid-match>
		<div class="uk-width-medium-1-6">&nbsp;</div>
		<div class="uk-width-medium-2-6"><i class="fa fa-tag"></i>&nbsp;状態</div>
		<div class="uk-width-medium-3-6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Form::select('condition', $user->condition, $condition_data, array('class' => '', 'id' => 'auth_id')); ?></div>
	</div>
	<HR noshade>
	<div class="uk-grid">
		<div class="uk-width-1-3">&nbsp;</div>
		<div class="uk-width-1-3">
			<button class="uk-button uk-button-primary uk-button-expand uk-button-large" type"submit">
				Update&nbsp;<i class="fa fa-sign-in"></i>
			</button>												
	</div>

</fieldset>
<?php echo Form::close(); ?>	
<br>
<?php echo Html::anchor('admin/user/', 'ユーザ情報',array('class'=>'uk-button')); ?>
