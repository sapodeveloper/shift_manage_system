<?php

class Controller_Admin_User extends Controller_Admin
{

	public function action_index()
	{
		$data['users'] = Model_User::find('all');
		$view = View::forge('layout/application');
		$view->contents = View::forge('admin/user/index', $data);
		return $view;
	}

	public function action_view($id = null)
	{
		$data['user'] = Model_User::find($id);
		$view = View::forge('layout/application');
		$view->contents = View::forge('admin/user/view', $data);
		return $view;
	}

	public function action_edit($id = null)
	{
		if (Input::method() == 'POST')
		{
			$full_name = Input::post('frist_name') . ' ' . Input::post('last_name');
			$user = Model_User::find($id);
			$user->full_name = $full_name;
			$user->frist_name = Input::post('frist_name');
			$user->last_name = Input::post('last_name');
			$user->department_id = Input::post('department_id');
			$user->cource_id = Input::post('cource_id');
			$user->year = Input::post('year');
			$user->auth_id = Input::post('auth_id');
			$user->condition = Input::post('condition');
			if($user->save()){
				Helper_Log::write_log(1, $user->full_name."さんの情報を正常に更新しました。", 1);
				Session::set_flash('success', $user->full_name."さんの情報を正常に更新しました。");
			}else{
				Helper_Log::write_log(1, $user->full_name."さんの情報の情報更新に失敗しました。", 0);
				Session::set_flash('error', $user->full_name."さんの情報の情報更新に失敗しました。");
			}
			Response::redirect('admin/user');
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
		$data['user'] = Model_User::find($id);
		$view = View::forge('layout/application');
		$view->contents = View::forge('admin/user/edit', $data);
		return $view;
	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			# create_userによるセキュア登録
			Auth::instance()->create_user(Input::post('username'), 'saposen', Input::post('username'). '@cc.it-hiroshima.ac.jp');
			# 追加登録
			$full_name = Input::post('frist_name') . ' ' . Input::post('last_name');
			$user = Model_User::find('last', array('where' => array(array('username', Input::post('username')))));
			if(Input::post('department_id')){
				$cource_id = Input::post('cource_id');
			}else{
				$cource_id = 1;
			}
			$user->set(array(
				'full_name' => $full_name,
				'frist_name' => Input::post('frist_name'),
				'last_name' => Input::post('last_name'),
				'year' => Input::post('year'),
				'department_id' => Input::post('department_id'),
				'cource_id' => $cource_id,
				'group_id' => Input::post('group_id'),
				'condition' => 1,
			));

			if ($user->save())
			{
				Helper_Mail::send_new_user_mail(Input::post('username'). '@cc.it-hiroshima.ac.jp', $user->full_name, Input::post('username'));
				Helper_Log::write_log(1, $user->full_name."さんを新規登録しました。", 1);
				Session::set_flash('success', $user->full_name."さんを新規登録しました");
				Response::redirect('admin/user');
			}
			else
			{
				Helper_Log::write_log(1, $user->full_name."さんの新規登録に失敗しました。", 0);
				Session::set_flash('error', $user->full_name."さんの新規登録に失敗しました");
			}
		}

		$department_data = Model_Department::find('all', array('where' => array('condition' => 1)));
		if($department_data){
			foreach($department_data as $row):
				$select_data['department_data'][$row->id]=$row->department_name;
			endforeach;
		}

		$auth_data = Model_Auth::find('all', array('where' => array('condition' => 1)));
		if($auth_data){
			foreach($auth_data as $row):
				$select_data['auth_data'][$row->id]=$row->auth_type;
			endforeach;
		}

		$view = View::forge('layout/application');
		$view->contents = View::forge('admin/user/create', $select_data);
		return $view;
	}

	public function action_department_cource($id = null)
	{
		$cource_data = Model_Cource::find('all', array('where' => array('department_id' => $id)));
		if($cource_data){
			foreach($cource_data as $row):
				$select_data['cource_data'][$row->id]=$row->cource_name;
			endforeach;
		}
 		$view=View::forge('admin/user/cource_list', $select_data);
 		return $view;
	}

	public function action_reset_password($id = null)
	{
		$user = Model_User::find($id);
		$new_password = Auth::reset_password($user->username);
		Auth::change_password($new_password, "saposen", $user->username);
		Helper_Mail::reset_password_mail($user->email, $user->full_name);
		Helper_Log::write_log(0, $user->full_name."さんのパスワードをリセットしました", 1);
	}

}
