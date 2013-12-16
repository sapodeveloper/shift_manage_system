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
	<?php echo $contents; ?>
</body>
</html>