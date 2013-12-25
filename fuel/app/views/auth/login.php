<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>シフト管理システム</title>
	<?php echo Asset::css('uikit.gradient.css'); ?>
	<?php echo Asset::css('font-awesome.css'); ?>
	<?php echo Asset::css('base/jquery.ui.all.css'); ?>
	<?php echo Asset::css('reset.css'); ?>
	<?php echo Asset::css('style.css'); ?>
	<?php echo Asset::css('tooltipster.css'); ?>
	<?php echo Asset::js('jquery.js'); ?>
	<?php echo Asset::js('uikit.js'); ?>
	<?php echo Asset::js('ui/jquery-ui.js'); ?>
	<?php echo Asset::js('ui/i18n/jquery.ui.datepicker-ja.js'); ?>
	<?php echo Asset::js('jquery.tooltipster.js'); ?>
  <script>
      $(document).ready(function() {
           $('.org-tooltip').tooltipster({});
      });
  </script>
</head>
<body class="tm-background">
	<nav class="tm-navbar uk-navbar uk-navbar-attached">
		<?php echo Html::anchor('/main', '<i class="fa fa-calendar"></i> シフト管理システム', array('class' => 'uk-navbar-brand')); ?>
	</nav>

	<!-- Padding -->
	<div class="uk-width-medium-1-1 ">
		&nbsp;
	</div>	
	<div class="uk-grid" data-uk-grid-margin>
		<div class="uk-grid">
			<div class="uk-width-medium-2-10">&nbsp;</div>
			<div class="tm-main uk-width-medium-6-10">
						
				<article class="uk-articleuk-panel uk-panel-box">
				<!-- ログイン画面1 -->
						<br>
					<center>
						<h1 class="uk-article-title"> ログイン画面 </h1>
						<?php if (Session::get_flash('error')): ?>
							<div class="uk-alert uk-alert-danger" data-uk-alert>
								<a href="" class="uk-alert-close uk-close"></a>
								<p>
								<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
								</p>
							</div>
						<?php endif; ?>
							<br>
						<?php echo Form::open(array("action" => "auth/login", "class" => "uk-form")); ?>
							<fieldset>
								<i class="fa fa-tag"></i> 学籍番号　　<?php echo Form::input('username', '', array('placeholder'=>'学籍番号を入力')); ?>
									<br>
									<br>
								<i class="fa fa-key"></i> パスワード　<?php echo Form::password('password', '', array('placeholder'=>'パスワードを入力')); ?>
									<br>
									<br>
								<div style="text-align:">
									<button style="text-align: center;" class="uk-button uk-button-primary uk-h3" type="submit">
										<font color="white">ログインする&nbsp;</font>
										<i class="fa fa-sign-in"></i>
									</button>
								</div>
							</fieldset>
						<?php echo Form::close(); ?>
					</center>
				</article>
			</div>
		</div>
	</div>
	<br>
	<!-- footer -->
	<footer>
		<div style="text-align: center; ">
			<h6>Copyright ©<?php echo date('Y'); ?> HIT ISMC Support Center All Rights Reserved.</h6>
		</div>
	</footer>
</body>
</html>