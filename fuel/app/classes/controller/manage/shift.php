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
		$view = View::forge('layout/application');
		$view->contents = View::forge('manage/shift/index', $data);
		return $view;
	}

	public function action_new()
	{
		$view = View::forge('layout/application');
		$view->contents = View::forge('manage/shift/new');
		return $view;
	}

	public function action_editable_list()
	{
		// 今日の日付を取得
		$datetime = new \DateTime();
		$today = $datetime->format('Y-m-d H:i:s:');
		$data['receiving_irregulars'] = Model_Irregular::find('all', array('where' => array(array('irregular_condition' => 1), array('irregular_enabledate', '>', $today))));
		$view = View::forge('layout/application');
		$view->contents = View::forge('manage/shift/editable_list', $data);
		return $view;
	}
}
