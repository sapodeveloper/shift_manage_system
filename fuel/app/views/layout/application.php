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
	<?php echo $header; ?>
	<!-- Contents -->	
	<div class="uk-grid" data-uk-grid-margin>
		<!-- Side NavigationBar -->
		<div class="uk-width-medium-1-5">
			<div class="uk-panel uk-panel-box">
				<?php echo $left_side_menu; ?>
			</div>
		</div>
		<div class="tm-main uk-width-medium-4-5">
			<div class="uk-grid">
				<div class="uk-width-medium-10-10">
					<article class="uk-articleuk-panel uk-panel-box">
						<?php echo $contents; ?>
					</article>
				</div>
			</div>
		</div>
	</div>	
	<?php echo $footer; ?>
</body>
</html>