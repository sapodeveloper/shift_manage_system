<?php

namespace Fuel\Migrations;

class Create_irregular_user
{
	public function up()
	{
		\DBUtil::create_table('irregular_user', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'irregular_day_id' => array('constraint' => 11, 'type' => 'int'),
			'request_start' => array('constraint' => 11, 'type' => 'int'),
			'request_end' => array('constraint' => 11, 'type' => 'int'),
			'edited_start' => array('constraint' => 11, 'type' => 'int'),
			'edited_end' => array('constraint' => 11, 'type' => 'int'),
			'user_comment' => array('type' => 'text'),

		), array('id'));

		$table = 'irregular_user';
		$end_time = array(6, 7, 8, 9);
		for ($irregular_shift = 1; $irregular_shift <= 2; $irregular_shift++){
			for($loop = 1; $loop <= 10; $loop++){
				for ($user_id=  2; $user_id <= 7; $user_id++) { 
					\DB::insert($table)->set(array('user_id' => $user_id, 
																		 'irregular_day_id' => $loop,
																		 'request_start' => 1,
																		 'request_end' => $end_time[array_rand($end_time)],
																		 'edited_start' => 1,
																		 'edited_end' => $end_time[array_rand($end_time)],
																		 'user_comment' => "test data"))->execute();
				}
			}
		}
	}

	public function down()
	{
		\DBUtil::drop_table('irregular_user');
	}
}