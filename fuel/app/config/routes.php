<?php
return array(
	'_root_'  => 'auth/login',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
	'manage/shift/irregular/edit/edit_shift_day/:day_id' => 'manage/shift/irregular/edit_shift_day/:day_id',
);