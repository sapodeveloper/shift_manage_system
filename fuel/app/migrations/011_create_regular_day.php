<?php

namespace Fuel\Migrations;

class Create_regular_day
{
	public function up()
	{
		\DBUtil::create_table('regular_day', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'regular_id' => array('constraint' => 11, 'type' => 'int'),
			'regular_day_name' => array('constraint' => 45, 'type' => 'varchar'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('regular_day');
	}
}
