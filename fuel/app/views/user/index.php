<center><h1 class="uk-article-title"><?php echo $user->full_name; ?>さんのスタッフ情報編集</h1></center>
<br>
<fieldset>
	<div class="uk-grid" data-uk-grid-match>
		<div class="uk-width-medium-1-6">&nbsp;</div>
		<div class="uk-width-medium-2-6"><i class="fa fa-tag"></i>&nbsp;ログイン名（学生番号）</div>
		<div class="uk-width-medium-3-6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user->username; ?></div>
	</div>
	<HR noshade>
	<div class="uk-grid" data-uk-grid-match>
		<div class="uk-width-medium-1-6">&nbsp;</div>
		<div class="uk-width-medium-2-6"><i class="fa fa-tag"></i>&nbsp;スタッフ名</div>
		
		<div class="uk-width-medium-3-6">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user->full_name; ?>
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
			<?php echo $user->department->department_name; ?>
		</div>
	</div>
	<HR noshade>
	<div class="uk-grid" data-uk-grid-match>
		<div class="uk-width-medium-1-6">&nbsp;</div>
		<div class="uk-width-medium-2-6"><i class="fa fa-tag"></i>&nbsp;学科</div>
		<div class="uk-width-3-6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo $user->cource->cource_name; ?>
		</div>
	</div>
	<HR noshade>
	<div class="uk-grid" data-uk-grid-match>
		<div class="uk-width-medium-1-6">&nbsp;</div>
		<div class="uk-width-medium-2-6"><i class="fa fa-tag"></i>&nbsp;入学年度</div>
		<div class="uk-width-medium-3-6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user->year; ?></div>
	</div>
	<HR noshade>
	
</fieldset>
<br>
<div class="uk-grid">

	<div class="uk-width-1-2">
		<?php echo Html::anchor('user/edit', '<i class="fa fa-eye"></i>&nbsp;ユーザ情報編集', array('class' => 'uk-button uk-button-primary uk-button-expand uk-button-large')); ?> 										
	</div>

	<div class="uk-width-1-2">
		<?php echo Html::anchor('user/change_password', '<i class="fa fa-pencil-square-o"></i>&nbsp;パスワード変更', array('class' => 'uk-button uk-button-success uk-button-expand uk-button-large')); ?>
	</div>

</div>
<br>
<i class="fa fa-users"></i> <?php echo Html::anchor('/main', '戻る'); ?><br>
