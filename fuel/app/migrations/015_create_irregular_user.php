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
	}

	public function down()
	{
		\DBUtil::drop_table('irregular_user');
	}
}