<?php

class Controller_Shift extends Controller_Application
{

	public function action_check()
	{
		$data['decision_regulars'] = Model_Regular::get_decision_regulars(Helper_Application::get_today());
		$data['decision_irregulars'] = Model_Irregular::get_decision_irregulars(Helper_Application::get_today());
		$view = View::forge('layout/application');
		$view->contents = View::forge('shift/check', $data);
		return $view;
	}

	public function action_request()
	{
		$data['receiving_regulars'] = Model_Regular::get_receiving_regulars(Helper_Application::get_today());
		$data['receiving_irregulars'] = Model_Irregular::get_receiving_irregulars(Helper_Application::get_today());
		$data['re_receiving_irregulars'] = Model_Irregular::get_re_receiving_irregulars(Helper_Application::get_today());
		$view = View::forge('layout/application');
		$view->contents = View::forge('shift/request', $data);
		return $view;
	}

}
