<?php

class Controller_Shift extends Controller_Application
{

	public function action_check()
	{
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->left_side_menu = View::forge('layout/left_side_menu');
		$view->contents = View::forge('shift/check');
		$view->footer = View::forge('layout/footer');
		return $view;
	}

	public function action_request()
	{
		$datetime = new \DateTime();
		$today = $datetime->format('Y-m-d H:i:s:');
		$data['receiving_irregulars'] = Model_Irregular::find('all', array('where' => array(array('irregular_limitdate', '>', $today), array('irregular_condition' => 1))));
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->left_side_menu = View::forge('layout/left_side_menu');
		$view->contents = View::forge('shift/request', $data);
		$view->footer = View::forge('layout/footer');
		return $view;
	}

	public function action_request_edit($id = null)
	{
		$data['irregular_days'] = Model_Irregular_Day::find('all', array('where' => array(array('irregular_id', '=', $id), array('irregular_day_condition' => 1))));
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->left_side_menu = View::forge('layout/left_side_menu');
		$view->contents = View::forge('shift/request_edit' ,$data);
		$view->footer = View::forge('layout/footer');
		return $view;
	}

}
