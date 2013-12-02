<?php

class Controller_Manage extends Controller
{
	public function before()
	{
		if (Auth::check())
		{
			$user_id = Auth::get('id');
			$user_auth_type = Model_User::find($user_id);
			if($user_auth_type->auth_id < 2){
				Response::redirect('/main');
			}
		}
	}
}
