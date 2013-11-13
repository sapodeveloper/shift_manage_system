<?php

class Controller_User extends Controller_Application
{

	public function action_index()
	{
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->contents = View::forge('user/index');
		$view->footer = View::forge('layout/footer');
		return $view;
	}

}
