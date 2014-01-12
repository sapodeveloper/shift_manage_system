<?php

class Controller_Main extends Controller_Application
{
	public function action_index()
	{
		// 今日の日付を取得
		$datetime = new \DateTime();
		// 1週間後の日付を取得
		$today = $datetime->format('Y-m-d H:i:s:');
		$data['receiving_irregulars'] = Model_Irregular::find('all', array('where' => array(array('irregular_limitdate', '>', $today), array('irregular_condition' => 1))));
		$data['decision_irregulars'] = Model_Irregular::find('all', array('where' => array('irregular_condition' => 3)));
		$view = View::forge('layout/application');
		$view->contents = View::forge('main/index', $data);
		return $view;
	}
}
