<?php

class Controller_Shift extends Controller_Application
{

	public function action_check()
	{
		// 今日の日付を取得
		$datetime = new \DateTime();
		$today = $datetime->format('Y-m-d H:i:s:');
		$data['decision_irregulars'] = Model_Irregular::find('all', array('where' => array(array('irregular_condition' => 3), array('irregular_enabledate', '>', $today))));
		$view = View::forge('layout/application');
		$view->contents = View::forge('shift/check', $data);
		return $view;
	}

	public function action_request()
	{
		$datetime = new \DateTime();
		$today = $datetime->format('Y-m-d');
		$data['receiving_irregulars'] = Model_Irregular::find('all', array('where' => array(array('irregular_limitdate', '>', $today), array('irregular_condition' => 1))));
		$view = View::forge('layout/application');
		$view->contents = View::forge('shift/request', $data);
		return $view;
	}

}
