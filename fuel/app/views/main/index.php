<meta charset="utf-8">
ログイン後のページ
<br>
<?php echo Auth::get_screen_name(); ?><br>
<?php echo Auth::get_email(); ?><br>
<?php echo Html::anchor('auth/logout', 'ログアウト'); ?>