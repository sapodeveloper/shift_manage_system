<?php

class Controller_Manage_Shift extends Controller_Manage
{
	public function action_index()
	{
		// 今日の日付を取得
		$datetime = new \DateTime();
		$today = $datetime->format('Y-m-d H:i:s:');
		$data['decision_irregulars'] = Model_Irregular::find('all', array('where' => array(array('irregular_condition' => 3), array('irregular_enabledate', '>', $today))));
		$data['receiving_irregulars'] = Model_Irregular::find('all', array('where' => array(array('irregular_limitdate', '>', $today), array('irregular_condition' => 1))));
		$data['irregular_shifts'] = Model_Irregular::find('all', array('order_by' => array('id' => 'desc')));
		$view = View::forge('layout/application');
		$view->contents = View::forge('manage/shift/index', $data);
		return $view;

	}

	public function action_delete1($id = null)
	{
		$regular = Model_Regular::find($id);
		$regular_days = DB::select('id')->from('regular_day')->where('regular_id', $id); 
		$query1 = DB::delete('regular_day')->where('regular_id', $id)->execute();
		$query2 = DB::delete('regular_user')->where('regular_day_id', 'in', $regular_days)->execute();
		$regular->delete();
		Response::redirect('manage/shift/index');
	}

	public function action_delete2($id = null)
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
