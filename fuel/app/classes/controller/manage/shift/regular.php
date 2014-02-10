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
				'regular_enabledate' => $today,
				'regular_condition' => 1,
				'updated_at' => 1,
			));
			if ($regular_date->save())
				{}
				else
				{
					Session::set_flash('error', '失敗');
				}

			$regular_id = Model_Regular::find('last');
			$regular_day_date = Input::post('regular_name');

			foreach($regular_name as $name){
					$regular_date = Model_Regular_Day::forge(array(
						'regular_id' => $regular_id->id,
						'regular_day_name' => $name,
						'regular_day_condition' => 1,
						'updated_at' => 0,
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
		$view->contents = View::forge('manage/shift/regular/create');
		return $view;
	}
}
