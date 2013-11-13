<?php

class Controller_Admin extends Controller
{
	public function before()
	{
		if (!Auth::check() && Auth::member(6))
		{
		    Response::redirect('/main');
		}
	}
}
