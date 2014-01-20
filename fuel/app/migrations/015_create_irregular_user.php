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
			'request_shift_type' => array('constraint' => 11, 'type' => 'int'),
			'edited_shift_type' => array('constraint' => 11, 'type' => 'int'),
			'user_comment' => array('type' => 'text'),
			'condition' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('type' => 'int', 'constraint' => 11, 'default' => 0),
			'updated_at' => array('type' => 'int', 'constraint' => 11, 'default' => 0),
		), array('id'));

		$table = 'irregular_user';
		$rand_shift_type = array(1,2,3);
			for($loop = 1; $loop <= 10; $loop++){
				for ($user_id=  2; $user_id <= 7; $user_id++) { 
					\DB::insert($table)->set(array('user_id' => $user_id, 
																		 'irregular_day_id' => $loop,
																		 'request_shift_type' => $rand_shift_type[array_rand($rand_shift_type)],
																		 'edited_shift_type' => $rand_shift_type[array_rand($rand_shift_type)],
																		 'condition' => 0,
																		 'user_comment' => "test data"))->execute();
				}
			}
	}

	public function down()
	{
		\DBUtil::drop_table('irregular_user');
	}
}
