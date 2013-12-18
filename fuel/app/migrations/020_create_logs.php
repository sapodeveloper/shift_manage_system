<?php

namespace Fuel\Migrations;

class Create_logs
{
	public function up()
	{
		\DBUtil::create_table('logs', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'log_type' => array('constraint' => 11, 'type' => 'int'),
			'log_message' => array('constraint' => 255, 'type' => 'varchar'),
			'log_condition' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('logs');
	}
}