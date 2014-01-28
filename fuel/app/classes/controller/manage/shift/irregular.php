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
					));

			if ($irregular_date->save())
				{}
				else
				{
					Session::set_flash('error', '失敗');
				}
			}

			Response::redirect('manage/shift/index'); 
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
		$view = View::forge('layout/edit_irregular_layout');
		$view->contents = View::forge('manage/shift/irregular/edit_shift_day', $data);
		return $view;
	}

	public function action_edit_shift_user()
	{
		$data['irregular_shift_user'] = Model_Irregular_User::find($this->param('irregular_user_id'));
		$view = View::forge('manage/shift/irregular/edit_shift_user', $data);
		return $view;
	}

	public function action_edit_user_shift()
	{
		$irregular_shift_user = Model_Irregular_User::find($this->param('irregular_user_id'));
		$irregular_shift_user->edited_shift_type = $this->param('irregular_type_id');
		$irregular_shift_user->save();
	}

	public function action_entry_list()
	{
		$query = DB::query('SELECT distinct irregular_user.user_id, users.frist_name 
			from irregular_user 
			inner join users on users.id = irregular_user.user_id
			where irregular_day_id in (SELECT id FROM irregular_day WHERE irregular_id = '.$this->param('id').')
			order by irregular_user.user_id');
		$data['irregular_shift_users'] = $query->as_object()->execute()->as_array();
		$data['irregular_id'] = $this->param('id');
		$view = View::forge('manage/shift/irregular/entry_list', $data);
		return $view;
	}

	public function action_lock_user_shifts()
	{
		$irregular_day_id = DB::select('id')->from('irregular_day')->where('irregular_id', $this->param('irregular_id'));
		$update_query = DB::update('irregular_user')
			->value('condition', 1)
			->where('user_id', $this->param('user_id'))
			->and_where('irregular_day_id', 'in', $irregular_day_id)
			->execute();	
	}

	public function action_unlock_user_shifts()
	{
		$irregular_day_id = DB::select('id')->from('irregular_day')->where('irregular_id', $this->param('irregular_id'));
		$update_query = DB::update('irregular_user')
			->value('condition', 0)
			->where('user_id', $this->param('user_id'))
			->and_where('irregular_day_id', 'in', $irregular_day_id)
			->execute();	
	}

	public function action_info()
	{
		$data['irregular_shift'] = Model_Irregular::find($this->param('id'));
		$data['irregular_shift_days'] = Model_Irregular_Day::find('all', array('where' => array('irregular_id' => $this->param('id'))));
		$query = DB::query('SELECT distinct irregular_user.user_id, users.full_name 
			from irregular_user 
			inner join users on users.id = irregular_user.user_id
			where irregular_day_id in (SELECT id FROM irregular_day WHERE irregular_id = '.$this->param('id').')
			order by irregular_user.user_id');
		$data['irregular_shift_users'] = $query->as_object()->execute()->as_array();
		$view = View::forge('layout/application');
		$view->contents = View::forge('manage/shift/irregular/info', $data);
		return $view;
	}

}
