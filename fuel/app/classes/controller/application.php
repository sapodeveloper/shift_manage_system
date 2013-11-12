<?php

class Controller_Application extends Controller
{
	public function before()
	{
		if (!Auth::check())
		{
		    Response::redirect('/');
		}
	}
}
