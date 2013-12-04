<?php

class Controller_Manage_Shift_Irregular extends Controller_Manage_Shift
{

	public function action_create()
	{
		if(Input::method() == 'POST'){
			・オブジェクトの生成
			Auth::instance()->create_user(Input::post('username'), 'saposen', Input::post('email'));

			・データを取得してオブジェクトのハッシュに代入

			$->set(array(
				'' => Input::post(''),
				'' => Input::post(''),
				'' => Input::post(''),
				'' => Input::post(''),
				'' => Input::post(''),
				'' => Input::post(''),
				'' => Input::post(''),
			));

		if ($user->save())
			{
				Response::redirect('');
			}

			else
			{
				Response::redirect('');
			}
			・ヒントはadmin/userやuserのコントローラを参考にしてねby　edyとよぽー
		}

		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->left_side_menu = View::forge('layout/left_side_menu');
		$view->contents = View::forge('manage/shift/irregular/create');
		$view->footer = View::forge('layout/footer');
		return $view;
	}

}
