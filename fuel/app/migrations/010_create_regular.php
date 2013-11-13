<?php

namespace Fuel\Migrations;

class Create_regular
{
	public function up()
	{
		\DBUtil::create_table('regular', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'regular_name' => array('constraint' => 45, 'type' => 'varchar'),
			'regular_limitdate' => array('type' => 'datetime'),
			'regular_condition' => array('type' => 'boolean'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('regular');
	}
}
