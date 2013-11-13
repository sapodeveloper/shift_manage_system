<meta charset="utf-8">
ログイン後のページ
<br>
<?php echo Auth::get_screen_name(); ?><br>
<?php echo Auth::get_email(); ?><br>
<?php echo Html::anchor('user', '個人設定'); ?><br>
<?php echo Html::anchor('admin/user', '名簿管理'); ?><br>
<?php echo Html::anchor('auth/logout', 'ログアウト'); ?>