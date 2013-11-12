<?php

class Controller_Main extends Controller_Application
{
	public function action_index()
	{
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->contents = View::forge('main/index');
		$view->footer = View::forge('layout/footer');
		return $view;
	}
}
