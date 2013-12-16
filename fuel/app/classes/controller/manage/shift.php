<?php

class Controller_Manage_Shift extends Controller_Manage
{
	public function action_index()
	{
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->left_side_menu = View::forge('layout/left_side_menu');
		$view->contents = View::forge('manage/shift/index');
		$view->footer = View::forge('layout/footer');
		return $view;
	}

	public function action_new()
	{
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->left_side_menu = View::forge('layout/left_side_menu');
		$view->contents = View::forge('manage/shift/new');
		$view->footer = View::forge('layout/footer');
		return $view;
	}

	public function action_editable_list()
	{
		// 今日の日付を取得
		$datetime = new \DateTime();
		$today = $datetime->format('Y-m-d H:i:s:');
		$data['receiving_irregulars'] = Model_Irregular::find('all', array('where' => array(array('irregular_condition' => 1), array('irregular_enabledate', '>', $today))));
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->left_side_menu = View::forge('layout/left_side_menu');
		$view->contents = View::forge('manage/shift/editable_list', $data);
		$view->footer = View::forge('layout/footer');
		return $view;
	}
}
