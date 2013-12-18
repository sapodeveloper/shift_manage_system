<?php

class Controller_User extends Controller_Application
{

	public function action_index()
	{
		$user_id = Auth::get('id');
		$data['user'] = Model_User::find($user_id);
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->left_side_menu = View::forge('layout/left_side_menu');
		$view->contents = View::forge('user/index', $data);
		$view->footer = View::forge('layout/footer');
		return $view;
	}

	public function action_edit()
	{
		$user_id = Auth::get('id');
		$data['user'] = Model_User::find($user_id);
		if (Input::method() == 'POST')
		{
			$full_name = Input::post('frist_name') . ' ' . Input::post('last_name');
			$email = Input::post('email');
			$user = Model_User::find($user_id);
			$user->username = Input::post('username');
			$user->full_name = $full_name;
			$user->frist_name = Input::post('frist_name');
			$user->last_name = Input::post('last_name');
			$user->department_id = Input::post('department_id');
			$user->cource_id = Input::post('cource_id');
			if($user->email != $email)
			{
				$user->email = $email;
			}
			$user->year = Input::post('year');
			if($user->save()){
				Helper_Log::write_log(1, $user->full_name."さんの情報を正常に更新しました。", 1);
			}else{
				Helper_Log::write_log(1, $user->full_name."さんの情報の情報更新に失敗しました。", 0);
			}
			Response::redirect('user');
		}
		$department_data = Model_Department::find('all', array('where' => array('condition' => 1)));
		if($department_data){
			foreach($department_data as $row):
				$data['department_data'][$row->id]=$row->department_name;
			endforeach;
		}
		$cource_data = Model_Cource::find('all', array('where' => array('condition' => 1)));
		if($cource_data){
			foreach($cource_data as $row):
				$data['cource_data'][$row->id]=$row->cource_name;
			endforeach;
		}
		$auth_data = Model_Auth::find('all', array('where' => array('condition' => 1)));
		if($auth_data){
			foreach($auth_data as $row):
				$data['auth_data'][$row->id]=$row->auth_type;
			endforeach;
		}
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->left_side_menu = View::forge('layout/left_side_menu');
		$view->contents = View::forge('user/edit', $data);
		$view->footer = View::forge('layout/footer');
		return $view;
	}

	public function action_change_password()
	{
		$user_id = Auth::get('id');
		$data['user'] = Model_User::find($user_id);
		if (Input::method() == 'POST')
		{
			$old_password = Input::post('old_password');
			$new_password = Input::post('new_password');
			$check_new_password = Input::post('check_new_password');
			$user = Model_User::find($user_id);
			if($new_password == $check_new_password)
			{
				if(Auth::change_password($old_password, $new_password, $user->username)){
					Helper_Log::write_log(1, $user->full_name."さんのパスワードを正常に更新しました。", 1);
				}else{
					Helper_Log::write_log(1, $user->full_name."さんのパスワードの更新に失敗しました。", 0);
				}
				Response::redirect('user');
			}
		}
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->left_side_menu = View::forge('layout/left_side_menu');
		$view->contents = View::forge('user/change_password', $data);
		$view->footer = View::forge('layout/footer');
		return $view;
	}

}
