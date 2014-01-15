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
		$view->contents = View::forge('manage/shift/irregular/create');
		return $view;
	}

	public function action_edit($id = null)
	{
		$data['irregular_shift'] = Model_Irregular::find($id);
		$data['irregular_shift_days'] = Model_Irregular_Day::find('all', array('where' => array('irregular_id' => $id)));
		$view = View::forge('layout/application');
		$view->contents = View::forge('manage/shift/irregular/edit', $data);
		return $view;
	}

	public function action_edit_shift_day()
	{
		$irregular_shift_day = Model_Irregular_Day::find($this->param('day_id'));
		$data['irregular_shift_users'] = Model_Irregular_User::find('all', array('where' => array('irregular_day_id' => $irregular_shift_day->id)));
		$view = View::forge('manage/shift/irregular/edit_shift_day', $data);
		return $view;
	}

	public function action_edit_shift_user()
	{
		
	}

}
