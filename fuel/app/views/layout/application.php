<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php echo Asset::css('uikit.gradient.css'); ?>
	<?php echo Asset::css('font-awesome.css'); ?>
	<?php echo Asset::js('jquery.js'); ?>
	<?php echo Asset::js('uikit.js'); ?>
	<style>
		body { margin: 10px; }
	</style>
</head>
<body>
<?php echo $header; ?>
<?php echo $contents; ?>
<?php echo $footer; ?>
</body>
</html>