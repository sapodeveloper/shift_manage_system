<?php
	$condition_data = array(0 => '無効', 1 => '有効');
?>
<center><h1 class="uk-article-title"><?php echo $user->full_name; ?>さんのスタッフ情報編集</h1></center>
<br>
<?php echo Form::open(array("action" => "user/edit")); ?>
<fieldset>
	<div class="uk-grid" data-uk-grid-match>
		<div class="uk-width-medium-1-6">&nbsp;</div>
		<div class="uk-width-medium-2-6"><i class="fa fa-user"></i>&nbsp;ログイン名（学生番号）</div>
		<div class="uk-width-medium-3-6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user->username; ?></div>
	</div>
	<HR noshade>
	<div class="uk-grid" data-uk-grid-match>
		<div class="uk-width-medium-1-6">&nbsp;</div>
		<div class="uk-width-medium-2-6"><i class="fa fa-pagelines"></i>&nbsp;スタッフ名</div>
		
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
		<div class="uk-width-medium-2-6"><i class="fa fa-tags"></i>&nbsp;学科</div>
		<div class="uk-width-3-6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo Form::select('cource_id', $user->cource_id, $cource_data, array('class' => '', 'id' => 'cource_id')); ?>
		</div>
	</div>
	<HR noshade>
	<div class="uk-grid" data-uk-grid-match>
		<div class="uk-width-medium-1-6">&nbsp;</div>
		<div class="uk-width-medium-2-6"><i class="fa fa-male"></i>&nbsp;入学年度</div>
		<div class="uk-width-medium-3-6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo Form::input('year', Input::post('year', isset($user) ? $user->year : ''), array('class' => '', 'placeholder'=>'入学年度')); ?></div>
	</div>
	<HR noshade>
	<div class="uk-grid">
		<div class="uk-width-1-3">&nbsp;</div>
		<div class="uk-width-1-3">
			<button class="uk-button uk-button-primary uk-button-expand uk-button-large" type"submit">
				<i class="fa fa-upload"></i>&nbsp;Update
			</button>												
	</div>

</fieldset>
<?php echo Form::close(); ?>	

<?php echo Html::anchor('user', '<i class="fa fa-undo"></i>&nbsp;戻る', array('class' => 'uk-button uk-button-primary')); ?>
