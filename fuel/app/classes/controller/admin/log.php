<?php

class Controller_Admin_Log extends Controller_Admin
{
	public function action_index()
	{
		$data['logs'] = Model_Log::find('all', array('order_by' => array('id' => 'desc'), 'limit' => 20));
		$view = View::forge('layout/application');
		$view->contents = View::forge('admin/log/index', $data);
		return $view;
	}
}
