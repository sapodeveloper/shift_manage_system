<?php

class Controller_Manage_Shift extends Controller_Manage
{
	public function action_index()
	{
		$data['irregular_shifts'] = Model_Irregular::find('all', array('order_by' => array('id' => 'desc')));
		$view = View::forge('layout/application');
		$view->contents = View::forge('manage/shift/index', $data);
		return $view;

	}

	public function action_delete($id = null)
	{
		$irregular = Model_Irregular::find($id);
		$irregular_days = DB::select('id')->from('irregular_day')->where('irregular_id', $id); 
		$query1 = DB::delete('irregular_day')->where('irregular_id', $id)->execute();
		$query2 = DB::delete('irregular_user')->where('irregular_day_id', 'in', $irregular_days)->execute();
		$irregular->delete();
		Response::redirect('manage/shift/index');
	}

	public function action_new()
	{
		$view = View::forge('layout/application');
		$view->contents = View::forge('manage/shift/new');
		return $view;
	}
}
