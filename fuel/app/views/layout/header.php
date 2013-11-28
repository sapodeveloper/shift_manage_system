<?php
	$user_id = Auth::get('id');
	$user = Model_User::find($user_id);
?>
<nav class="tm-navbar uk-navbar uk-navbar-attached">
	<?php echo Html::anchor('/main', '<i class="fa fa-calendar"></i> シフト管理システム', array('class' => 'uk-navbar-brand')); ?>
	<div class="uk-navbar-flip">
		<ul class="uk-navbar-nav">
			<div class="uk-navbar-content uk-hidden-small">
				<i class="fa fa-user"></i> <?php echo $user->full_name; ?>さん&nbsp;
				<?php echo Html::anchor('auth/logout', '<button class="uk-button uk-button-danger" type="submit">ログアウト&nbsp;<i class="fa fa-sign-out"></i></button>'); ?>
			</div>
		</ul>
	</div>
</nav>

<!-- Padding -->
<div class="uk-width-medium-1-1 ">
	&nbsp;
</div>	