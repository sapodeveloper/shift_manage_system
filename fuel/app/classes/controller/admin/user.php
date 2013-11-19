<?php

class Controller_Admin_User extends Controller_Admin
{

	public function action_index()
	{
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->contents = View::forge('admin/user/index');
		$view->footer = View::forge('layout/footer');
		return $view;
	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			# create_userによるセキュア登録
			Auth::instance()->create_user(Input::post('username'), 'saposen', Input::post('email'));
			# 追加登録
			$full_name = Input::post('frist_name') . ' ' . Input::post('last_name');
			$user = Model_User::find('last', array('where' => array(array('username', Input::post('username')))));
			$user->set(array(
				'full_name' => $full_name,
				'frist_name' => Input::post('frist_name'),
				'last_name' => Input::post('last_name'),
				'year' => Input::post('year'),
				'department_id' => Input::post('department_id'),
				'cource_id' => Input::post('cource_id'),
				'group_id' => Input::post('group_id'),
				'condition' => 1,
			));

			if ($user->save())
			{
				Response::redirect('admin/user');
			}

			else
			{
				Session::set_flash('error', 'Could not save event.');
			}
		}
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->contents = View::forge('admin/user/create');
		$view->footer = View::forge('layout/footer');
		return $view;
	}

}
