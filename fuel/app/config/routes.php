<?php
return array(
	'_root_'  => 'auth/login',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
	'manage/shift/irregular/edit/edit_shift_user/:irregular_user_id' => 'manage/shift/irregular/edit_shift_user/:irregular_user_id',
	'manage/shift/irregular/edit/:id/info' => 'manage/shift/irregular/info/:id',
	'manage/shift/irregular/edit/:id/edit_shift_day/:day_id' => 'manage/shift/irregular/edit_shift_day/:day_id',
	'manage/shift/irregular/edit/:id/edit_shift_user/:irregular_user_id' => 'manage/shift/irregular/edit_shift_user/:irregular_user_id',
);