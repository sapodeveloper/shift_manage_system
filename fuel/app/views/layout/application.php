
<!DOCTYPE html>
<html lang="ja" >
	<head>
			<meta charset="utf-8">
			<title>シフト管理システム</title>
			<?php echo Asset::css('uikit.gradient.css'); ?>
			<?php echo Asset::css('font-awesome.css'); ?>
			<?php echo Asset::css('base/jquery.ui.all.css'); ?>
			<?php echo Asset::js('jquery.js'); ?>
			<?php echo Asset::js('uikit.js'); ?>
			<?php echo Asset::js('ui/jquery-ui.js'); ?>
			<?php echo Asset::js('ui/i18n/jquery.ui.datepicker-ja.js'); ?>
			<?php echo Asset::js('jquery.tooltipster.js'); ?>
		  <script>
		    jQuery( function() {
				  jQuery( '#jquery-ui-datepicker' ) . datepicker();
				});
		  </script>
	</head>
	<body class="tm-background">

	<!-- Navigation Bar-->
	<nav class="tm-navbar uk-navbar uk-navbar-attached">
		<?php echo Html::anchor('/main', '<i class="fa fa-calendar"></i> シフト管理システム', array('class' => 'uk-navbar-brand')); ?>
		<ul class="uk-navbar-nav">
			<li class="uk-parent" data-uk-dropdown>
				<a href=""><i class="fa fa-user"></i>&nbsp;個人関連</a>
					<div class="uk-dropdown uk-dropdown-navbar">
						<ul class="uk-nav uk-nav-navbar">
							<li><?php echo Html::anchor('shift/check', '<i class="fa fa-eye"></i>&nbsp;シフト確認'); ?></li>
							<li><?php echo Html::anchor('shift/request', '<i class="fa fa-pencil-square-o"></i>&nbsp;シフト入力'); ?></li>
							<li><?php echo Html::anchor('user', '<i class="fa fa-wrench"></i>&nbsp;個人設定'); ?></li>
						</ul>
					</div>
			</li>
			<li class="uk-parent" data-uk-dropdown>
				<a href=""><i class="fa fa-pencil"></i>&nbsp;リーダ関連</a>
					<div class="uk-dropdown uk-dropdown-navbar">
						<ul class="uk-nav uk-nav-navbar">
							<li><?php echo Html::anchor('manage/shift', '<i class="fa fa-list"></i>&nbsp;シフト一覧'); ?></li>
							<li><?php echo Html::anchor('manage/shift/new', '<i class="fa fa-sun-o"></i>&nbsp;シフト作成'); ?></li>
							<li><?php echo Html::anchor('manage/shift/editable_list', '<i class="fa fa-inbox"></i>&nbsp;シフト編成'); ?></li>
						</ul>
					</div>
			</li>
			<li class="uk-parent" data-uk-dropdown>
				<a href=""><i class="fa fa-cogs"></i>&nbsp;内部項目</a>
					<div class="uk-dropdown uk-dropdown-navbar">
						<ul class="uk-nav uk-nav-navbar">
							<li><?php echo Html::anchor('admin/user', '<i class="fa fa-sort-alpha-asc"></i>&nbsp;名簿管理'); ?></li>
							<li><?php echo Html::anchor('admin/log', '<i class="fa fa-list-alt"></i>&nbsp;ログ管理'); ?></li>
						</ul>
					</div>
			</li>
		</ul>
		<?php
			$user_id = Auth::get('id');
			$user = Model_User::find($user_id);
		?>
		<div class="uk-navbar-flip">			
			<ul class="uk-navbar-nav">
				<div class="uk-navbar-content uk-hidden-small">
					<i class="fa fa-user"></i><?php echo $user->full_name; ?>さん&nbsp;
					<?php echo Html::anchor('auth/logout', '<button class="uk-button uk-button-danger" type="submit">ログアウト&nbsp;<i class="fa fa-sign-out"></i></button>'); ?>
				</div>
			</ul>
		</div>
	</nav>
	
	<!-- Padding -->
	<br>
	
	<!-- Contents -->
	<div class="uk-grid" data-uk-grid-margin>
		<div class="tm-main uk-width-medium-1-1">
			<div class="uk-grid">
				<div class="uk-width-medium-2-10">&nbsp;</div>
				<div class="uk-width-medium-6-10">
					<?php if (Session::get_flash('success')): ?>
						<div class="uk-alert uk-alert-success" data-uk-alert>
							<a href="" class="uk-alert-close uk-close"></a>
							<p>
								<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
							</p>
						</div>
					<?php endif; ?>
					<?php if (Session::get_flash('error')): ?>
						<div class="uk-alert uk-alert-danger" data-uk-alert>
							<a href="" class="uk-alert-close uk-close"></a>
							<p>
							<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
							</p>
						</div>
					<?php endif; ?>
					<article class="uk-articleuk-panel uk-panel-box">
						<?php echo $contents; ?>
					</article>
				</div>
				<div class="uk-width-medium-2-10">
				</div>							
			</div>	
		</div>
	</div>
	
	<!-- footer -->
	<footer>
		<div style="text-align: center; font-size: small;">
			<h6>Copyright ©<?php echo date('Y'); ?> HIT ISMC Support Center All Rights Reserved.</h6>
		</div>
	</footer>
	
	</body>
</html>