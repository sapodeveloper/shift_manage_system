<?php

class Controller_Main extends Controller
{
	public function before()
	{
		if (!Auth::check())
		{
		    Response::redirect('/');
		}
	}

	public function action_index()
	{
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->contents = View::forge('main/index');
		$view->footer = View::forge('layout/footer');
		return $view;
	}

}
