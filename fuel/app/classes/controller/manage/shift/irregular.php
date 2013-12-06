<?php

class Controller_Manage_Shift_Irregular extends Controller_Manage_Shift
{

	public function action_create()
	{
		if(Input::method() == 'POST'){

			・オブジェクトの生成

			Auth::instance()->create_irregular;

			・データを取得してオブジェクトのハッシュに代入

			$->set(array(
				'id' => Input::post('id'),
				'irregular_name' => Input::post('irregular_name'),
				'irregular_enabledate' => Input::post('irregular_enabledate'),
				'irregular_limitdate' => Input::post('irregular_limitdate'),
				'create_at' => Input::post('create_at'),
				'update_at' => Input::post('update_at'),
				'irregular_condition' => 1,
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
