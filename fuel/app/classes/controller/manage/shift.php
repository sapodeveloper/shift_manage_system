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
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->left_side_menu = View::forge('layout/left_side_menu');
		$view->contents = View::forge('manage/shift/editable_list');
		$view->footer = View::forge('layout/footer');
		return $view;
	}
}
