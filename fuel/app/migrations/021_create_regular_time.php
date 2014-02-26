<?php

namespace Fuel\Migrations;

class Create_regular_time
{
	public function up()
	{
		\DBUtil::create_table('regular_time', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'regular_time' => array('type' => 'time'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('regular_time');
	}
}
