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
		return View::forge('main/index');
	}

}
