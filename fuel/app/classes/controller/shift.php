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

}
