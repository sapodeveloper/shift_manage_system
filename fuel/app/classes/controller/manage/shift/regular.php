<?php

class Controller_Manage_Shift_Regular extends Controller_Manage_Shift
{

	public function action_create()
	{
		if(Input::method() == 'POST')
		{
			$limitdate = Input::post('limitdate');
			$today = date("Y-m-d");
			$regular = Model_Regular::forge(array(
				'regular_name' => Input::post('regular_name'),
				'regular_limitdate' => date("Y-m-d 23:59:59",strtotime("$limitdate")),
				'regular_condition' => 1,
				'created_at' => 0,
				'updated_at' => 0,
			));

			if ($regular->save())
				{}
				else
				{
					Session::set_flash('error', '失敗');
				}


			$regular_id = Model_Regular::find('last');

			$regular_date = Model_Regular_Day::forge(array(
				'regular_id' => $regular_id->id,
				'regular_day_name' => '月',
				'created_at' => 0,
				'updated_at' => 0,
			));

			if ($regular_date->save())
				{}
				else
				{
					Session::set_flash('error', '失敗');
				}

			$regular_date = Model_Regular_Day::forge(array(
				'regular_id' => $regular_id->id,
				'regular_day_name' => '火',
				'created_at' => 0,
				'updated_at' => 0,
			));

			if ($regular_date->save())
				{}
				else
				{
					Session::set_flash('error', '失敗');
				}

			$regular_date = Model_Regular_Day::forge(array(
				'regular_id' => $regular_id->id,
				'regular_day_name' => '水',
				'created_at' => 0,
				'updated_at' => 0,
			));

			if ($regular_date->save())
				{}
				else
				{
					Session::set_flash('error', '失敗');
				}

			$regular_date = Model_Regular_Day::forge(array(
				'regular_id' => $regular_id->id,
				'regular_day_name' => '木',
				'created_at' => 0,
				'updated_at' => 0,
			));

			if ($regular_date->save())
				{}
				else
				{
					Session::set_flash('error', '失敗');
				}

			$regular_date = Model_Regular_Day::forge(array(
				'regular_id' => $regular_id->id,
				'regular_day_name' => '金',
				'created_at' => 0,
				'updated_at' => 0,
			));

			if ($regular_date->save())
				{}
				else
				{
					Session::set_flash('error', '失敗');
				}

			Response::redirect('manage/shift/index'); 
		}

		$view = View::forge('layout/application');
		$view->contents = View::forge('manage/shift/regular/create');
		return $view;
	}

	public function action_edit_shift_day()
	{
		$data['regular_shift'] = Model_Regular::find($this->param('id'));
		$data['regular_shift_days'] = Model_Regular_Day::find('all', array('where' => array('regular_id' => $this->param('id'))));
		$regular_shift_day = Model_Regular_Day::find($this->param('day_id'));
		$data['regular_shift_users'] = Model_Regular_User::find('all', array('where' => array('regular_day_id' => $regular_shift_day->id)));
		$view = View::forge('layout/edit_regular_layout');
		$view->contents = View::forge('manage/shift/regular/edit_shift_day', $data);
		return $view;
	}

	public function action_edit_shift_user()
	{
		$data['regular_shift_user'] = Model_Regular_User::find($this->param('regular_user_id'));
		$view = View::forge('manage/shift/regular/edit_shift_user', $data);
		return $view;
	}

	public function action_edit_user_shift()
	{
		$regular_shift_user = Model_Regular_User::find($this->param('regular_user_id'));
		$regular_shift_user->edited_shift_type = $this->param('regular_type_id');
		$regular_shift_user->save();
	}

	public function action_entry_list()
	{
		$query = DB::query('SELECT distinct regular_user.user_id, users.frist_name 
			from regular_user 
			inner join users on users.id = regular_user.user_id
			where regular_day_id in (SELECT id FROM regular_day WHERE regular_id = '.$this->param('id').')
			order by regular_user.user_id');
		$data['regular_shift_users'] = $query->as_object()->execute()->as_array();
		$data['regular_id'] = $this->param('id');
		$view = View::forge('manage/shift/regular/entry_list', $data);
		return $view;
	}

	public function action_lock_user_shifts()
	{
		$irregular_day_id = DB::select('id')->from('regular_day')->where('regular_id', $this->param('regular_id'));
		$update_query = DB::update('regular_user')
			->value('condition', 1)
			->where('user_id', $this->param('user_id'))
			->and_where('regular_day_id', 'in', $regular_day_id)
			->execute();	
	}

	public function action_unlock_user_shifts()
	{
		$irregular_day_id = DB::select('id')->from('regular_day')->where('regular_id', $this->param('regular_id'));
		$update_query = DB::update('regular_user')
			->value('condition', 0)
			->where('user_id', $this->param('user_id'))
			->and_where('regular_day_id', 'in', $regular_day_id)
			->execute();	
	}

	public function action_info()
	{
		$data['regular_shift'] = Model_Regular::find($this->param('id'));
		$data['regular_shift_days'] = Model_Regular_Day::find('all', array('where' => array('regular_id' => $this->param('id'))));
		$query = DB::query('SELECT distinct regular_user.user_id, users.full_name 
			from regular_user 
			inner join users on users.id = regular_user.user_id
			where regular_day_id in (SELECT id FROM regular_day WHERE regular_id = '.$this->param('id').')
			order by regular_user.user_id');
		$data['regular_shift_users'] = $query->as_object()->execute()->as_array();
		$view = View::forge('layout/application');
		$view->contents = View::forge('manage/shift/regular/info', $data);
		return $view;
	}

	public function action_change_entry_condition()
	{
		$regular_shift = Model_Regular::find($this->param('id'));
		if($regular_shift->regular_condition == 1){
			$regular_shift->regular_condition = 2;
		}else{
			$regular_shift->regular_condition = 1;
		}
		$regular_shift->save();
	}

}
