<?php

class Controller_Irregular extends Controller_Application
{

	public function action_index()
	{
		$datetime = new \DateTime();
		$today = $datetime->format('Y-m-d H:i:s:');
		$data['receiving_irregulars'] = Model_Irregular::find('all', array('where' => array(array('irregular_limitdate', '>', $today), array('irregular_condition' => 1))));
		$view = View::forge('layout/application');
		$view->contents = View::forge('irregular/index', $data);
		return $view;
	}

	public function action_request($id = null)
	{
		if(empty($id)){
			Response::redirect('shift/request');
		}
		$data['id'] = $id;
		$user_id = Auth::get('id');
		$data['irregular_shift'] = Model_Irregular::find('first',array('where'=>array(array('id','=',$id))));
		$data['irregular_days'] = Model_Irregular_Day::find('all', array('where' => array(array('irregular_id', '=', $id), array('irregular_day_condition' => 1))));
		if (Input::method() == 'POST')
		{
			$i=1;
			foreach($data['irregular_days'] as $irregular_day){
				$irregular_user = Model_Irregular_User::find('last', array('where' => array(array('irregular_day_id', '=', $irregular_day->id),array('user_id', '=', $user_id))));
				$irregular_type_id[$i] = Input::post('irregular_type_id'.$i);
				$user_comment[$i] = Input::post('user_comment'.$i);
				if(empty($irregular_type_id[$i])){
					$irregular_type_id[$i]=4;
				}
				$irregular_user->user_id = $user_id;
				$irregular_user->irregular_day_id = $irregular_day->id;
				$irregular_user->request_shift_type = $irregular_type_id[$i];
				$irregular_user->edited_shift_type = $irregular_type_id[$i];
				$irregular_user->user_comment = $user_comment[$i];
				$irregular_user->condition = 0;
				$irregular_user->save();
				$i++;
			}
			Response::redirect('shift/request');
		}
		$i = 1;
		foreach($data['irregular_days'] as $irregular_day){
			$irregular_user = Model_Irregular_User::find('last', array('where' => array(array('irregular_day_id', '=', $irregular_day->id),array('user_id', '=', $user_id))));
			if(empty($irregular_user)){
				$irregular_user=Model_Irregular_User::forge()->set(array(
					'user_id' => $user_id,
					'irregular_day_id' => $irregular_day->id,
					'request_shift_type' => "4",
					'edited_shift_type' => "4",
					'user_comment' => "",
					'condition' => "0",
					'created_at' => "0",
					'updated_at' => "0",
				));
				$irregular_user->save();
				$data['set'] = "申請";
			}else{
				$data['set'] = "更新";
			}
			$data['irregular_user'][$i] = Model_Irregular_User::find('last', array('where' => array(array('irregular_day_id', '=', $irregular_day->id),array('user_id', '=', $user_id))));
			$i++;
		}
		$view = View::forge('layout/application');
		$view->contents = View::forge('irregular/request' ,$data);
		return $view; 
	}

}

?>
