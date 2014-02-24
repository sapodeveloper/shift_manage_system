<?php

class Controller_Main extends Controller_Application
{
	public function action_index()
	{
		$data['decision_regulars'] = Model_Regular::get_decision_regulars(Helper_Application::get_today());
		$data['receiving_regulars'] = Model_Regular::get_receiving_regulars(Helper_Application::get_today());
		$data['receiving_irregulars'] = Model_Irregular::get_receiving_irregulars(Helper_Application::get_today());
		$data['decision_irregulars'] = Model_Irregular::get_decision_irregulars(Helper_Application::get_today());
		$view = View::forge('layout/application');
		$view->contents = View::forge('main/index', $data);
		return $view;
	}
}
