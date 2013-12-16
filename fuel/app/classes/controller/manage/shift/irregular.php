<?php

class Controller_Manage_Shift_Irregular extends Controller_Manage_Shift
{

	public function action_create()
	{
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->left_side_menu = View::forge('layout/left_side_menu');
		$view->contents = View::forge('manage/shift/irregular/create');
		$view->footer = View::forge('layout/footer');
		return $view;
	}

	public function action_edit($id = null)
	{
		$data['irregular_shift'] = Model_Irregular::find($id);
		$data['irregular_shift_days'] = Model_Irregular_Day::find('all', array('where' => array('irregular_id' => $id)));
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->left_side_menu = View::forge('layout/left_side_menu');
		$view->contents = View::forge('manage/shift/irregular/edit', $data);
		$view->footer = View::forge('layout/footer');
		return $view;
	}

	public function action_edit_shift_day()
	{
		$irregular_shift_day = Model_Irregular_Day::find($this->param('day_id'));
		$data['irregular_shift_users'] = Model_Irregular_User::find('all', array('where' => array('irregular_day_id' => $irregular_shift_day->id)));
		$view = View::forge('manage/shift/irregular/edit_shift_day', $data);
		return $view;
	}

}
