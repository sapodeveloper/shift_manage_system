<?php
return array(
	//標準を認証画面に
	'_root_'  => 'auth/login',
	
	//manageコントローラ以下イレギュラーシフト関係のルーティング		
	'manage/shift/irregular/edit_shift/:id/info' => 'manage/shift/irregular/info/:id',
	'manage/shift/irregular/edit_shift/:id/edit_shift_day/:day_id' => 'manage/shift/irregular/edit_shift_day/:day_id',
	'manage/shift/irregular/edit_shift/:id/edit_shift_user/:irregular_user_id' => 'manage/shift/irregular/edit_shift_user/:irregular_user_id',
);