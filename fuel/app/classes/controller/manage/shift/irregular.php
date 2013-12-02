<?php

class Controller_Manage_Shift_Irregular extends Controller_Manage_Shift
{

	public function action_create()
	{
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->left_side_menu = View::forge('layout/left_side_menu');
		$view->contents = View::forge('manage/shift/irregular/create');
		$view->footer = View::forge('layout/footer');
		return $view;
	}

}
