<?php
return array(
	//標準を認証画面に
	'_root_'  => 'auth/login',

	//manageコントローラ以下レギュラーシフト関係のルーティング
	'manage/main/' => 'manage/main/index',
	'manage/shift/regular/edit_shift/:id/info' => 'manage/shift/regular/info/:id',
	'manage/shift/regular/edit_shift/:id/entry_list' => 'manage/shift/regular/entry_list/:id',
	'manage/shift/regular/edit_shift/:id/lock_user_shifts/:user_id/:regular_id' => 'manage/shift/regular/lock_user_shifts/:user_id/:regular_id',
	'manage/shift/regular/edit_shift/:id/unlock_user_shifts/:user_id/:regular_id' => 'manage/shift/regular/unlock_user_shifts/:user_id/:regular_id',
	'manage/shift/regular/edit_shift/:id/change_entry_condition' => 'manage/shift/regular/change_entry_condition/:id',
	'manage/shift/regular/edit_shift/:id/change_condition' => 'manage/shift/regular/change_condition/:id',
	'manage/shift/regular/edit_shift/:id/edit_shift_day/:day_id' => 'manage/shift/regular/edit_shift_day/:day_id',
	'manage/shift/regular/edit_shift/:id/edit_shift_user/:regular_user_id' => 'manage/shift/regular/edit_shift_user/:regular_user_id',
	'manage/shift/regular/edit_shift/:id/edit_user_shift/:regular_user_id/:regular_type_id' => 'manage/shift/regular/edit_user_shift/:regular_user_id/:regular_type_id',
	
	//manageコントローラ以下イレギュラーシフト関係のルーティング
	'manage/main/' => 'manage/main/index',
	'manage/shift/irregular/edit_shift/:id/info' => 'manage/shift/irregular/info/:id',
	'manage/shift/irregular/edit_shift/:id/entry_list' => 'manage/shift/irregular/entry_list/:id',
	'manage/shift/irregular/edit_shift/:id/lock_user_shifts/:user_id/:irregular_id' => 'manage/shift/irregular/lock_user_shifts/:user_id/:irregular_id',
	'manage/shift/irregular/edit_shift/:id/unlock_user_shifts/:user_id/:irregular_id' => 'manage/shift/irregular/unlock_user_shifts/:user_id/:irregular_id',
	'manage/shift/irregular/edit_shift/:id/change_entry_condition' => 'manage/shift/irregular/change_entry_condition/:id',
	'manage/shift/irregular/edit_shift/:id/change_condition' => 'manage/shift/irregular/change_condition/:id',
	'manage/shift/irregular/edit_shift/:id/edit_shift_day/:day_id' => 'manage/shift/irregular/edit_shift_day/:day_id',
	'manage/shift/irregular/edit_shift/:id/edit_shift_user/:irregular_user_id' => 'manage/shift/irregular/edit_shift_user/:irregular_user_id/:irregular_day_id',
	'manage/shift/irregular/edit_shift/:id/edit_user_shift/:irregular_user_id/:irregular_type_id' => 'manage/shift/irregular/edit_user_shift/:irregular_user_id/:irregular_type_id',
);
