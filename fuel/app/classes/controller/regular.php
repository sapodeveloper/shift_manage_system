<?php

class Controller_Regular extends Controller_Application
{

	public function action_index()
	{
		$data['receiving_regulars'] = Model_Regular::get_receiving_regulars(Helper_Application::get_today());
		$view = View::forge('layout/application');
		$view->contents = View::forge('regular/index', $data);
		return $view;
	}

	public function action_request($id = null)
	{
		if(empty($id)){
			Response::redirect('shift/request');
		}
		$data['id'] = $id;
		$user_id = Auth::get('id');
		$data['regular_shift'] = Model_Regular::find($id);
		$data['regular_days'] = Model_Regular_Day::find('all', array('where' => array(array('regular_id' => $id), array('regular_day_condition' => 1))));
		if (Input::method() == 'POST')
		{
			$i=1;
			foreach($data['regular_days'] as $regular_day){
				$regular_user = Model_Regular_User::find('last', array('where' => array(array('regular_day_id'=> $regular_day->id),array('user_id' => $user_id))));
				$request_start[$i] = Input::post('request_start'.$i);
				$request_end[$i] = Input::post('request_end'.$i);
				$user_comment[$i] = Input::post('user_comment'.$i);

				$regular_user->user_id = $user_id;
				$regular_user->regular_day_id = $regular_day->id;
				$regular_user->request_start = $request_start[$i];
				$regular_user->request_end = $request_end[$i];
				$regular_user->edited_start = $request_start[$i];
				$regular_user->edited_end = $request_end[$i];
				$regular_user->user_comment = $user_comment[$i];
				$regular_user->condition = 0;
				$regular_user->save();
				$i++;
			}
			Response::redirect('shift/request');
		}
		$i = 1;
		foreach($data['regular_days'] as $regular_day){
			$regular_user = Model_Regular_User::find('last', array('where' => array(array('regular_day_id' => $regular_day->id),array('user_id' => $user_id))));
			if(empty($regular_user)){
				$regular_user=Model_Regular_User::forge()->set(array(
					'user_id' => $user_id,
					'regular_day_id' => $regular_day->id,
					'request_start' => "00:00:00",
					'request_end' => "00:00:00",
					'edited_start' => "00:00:00",
					'edited_end' => "00:00:00",
					'user_comment' => "",
					'condition' => "0",
				));
				$regular_user->save();
				$data['set'] = "申請";
			}else{
				$data['set'] = "更新";
			}
			$data['regular_user'][$i] = Model_Regular_User::find('last', array('where' => array(array('regular_day_id' => $regular_day->id),array('user_id' => $user_id))));
			$i++;
		}
		$view = View::forge('layout/application');
		$view->contents = View::forge('regular/request' ,$data);
		return $view; 
	}

	public function action_request_detail($id = null)
	{
		$data['regular_shift'] = Model_Regular::find($id);
		$regular_shift_days = DB::select('id')->from('regular_day')->where('regular_id', $id);
		$data['requests'] = Model_Regular_User::find('all', array('where' => array(array('user_id', Auth::get('id')),array('regular_day_id', 'in', $regular_shift_days))));
		$view = View::forge('layout/application');
		$view->contents = View::forge('regular/request_detail' ,$data);
		return $view;
	}

}

?>
