<?php

class Controller_Manage_Shift_Irregular extends Controller_Manage_Shift
{

	public function action_create()
	{
		if(Input::method() == 'POST')
		{
			$limitdate = Input::post('limitdate');
			$today = date("Y-m-d");
			$irregular = Model_Irregular::forge(array(
				'irregular_name' => Input::post('irregular_name'),
				'irregular_limitdate' => date("Y-m-d 23:59:59",strtotime("$limitdate")),
				'irregular_enabledate' => $today,
				'irregular_condition' => 1,
				'updated_at' => 1,
			));

			if ($irregular->save())
				{}
				else
				{
					Session::set_flash('error', '失敗');
				}

			$irregular_id = Model_Irregular::find('last');
			$irregular_day_date = Input::post('irregular_date');

			foreach($irregular_day_date as $date){
					$irregular_date = Model_Irregular_Day::forge(array(
						'irregular_id' => $irregular_id->id,
						'irregular_day_date' => $date,
						'irregular_day_name' => date("n月j日",strtotime("$date")),
						'irregular_day_condition' => 1,
						'updated_at' => 0,
					));

			if ($irregular_date->save())
				{}
				else
				{
					Session::set_flash('error', '失敗');
				}
			}

			Response::redirect('shift/check'); 
		}

		$view = View::forge('layout/application');
		$view->contents = View::forge('manage/shift/irregular/create');
		return $view;
	}

	public function action_edit_shift_day()
	{
		$data['irregular_shift'] = Model_Irregular::find($this->param('id'));
		$data['irregular_shift_days'] = Model_Irregular_Day::find('all', array('where' => array('irregular_id' => $this->param('id'))));
		$irregular_shift_day = Model_Irregular_Day::find($this->param('day_id'));
		$data['irregular_shift_users'] = Model_Irregular_User::find('all', array('where' => array('irregular_day_id' => $irregular_shift_day->id)));
		$view = View::forge('layout/application');
		$view->contents = View::forge('manage/shift/irregular/edit_shift_day', $data);
		return $view;
	}

	public function action_edit_shift_user()
	{
		$data['irregular_shift_user'] = Model_Irregular_User::find($this->param('irregular_user_id'));
		$view = View::forge('manage/shift/irregular/edit_shift_user', $data);
		return $view;
		
	}

	public function action_info()
	{
		$data['irregular_shift'] = Model_Irregular::find($this->param('id'));
		$data['irregular_shift_days'] = Model_Irregular_Day::find('all', array('where' => array('irregular_id' => $this->param('id'))));
		$view = View::forge('layout/application');
		$view->contents = View::forge('manage/shift/irregular/info', $data);
		return $view;
	}

}
