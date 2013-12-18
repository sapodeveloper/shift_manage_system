<?php

class Controller_Admin_Log extends Controller_Admin
{
	public function action_index()
	{
		$data['logs'] = Model_Log::find('all', array('order_by' => array('created_at' => 'asc'),'limit' => 10));
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->left_side_menu = View::forge('layout/left_side_menu');
		$view->contents = View::forge('admin/log/index', $data);
		$view->footer = View::forge('layout/footer');
		return $view;
	}
}
