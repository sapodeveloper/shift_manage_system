<?php

class Controller_Admin_User extends Controller_Admin
{

	public function action_index()
	{
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->contents = View::forge('admin/user/index');
		$view->footer = View::forge('layout/footer');
		return $view;
	}

}
