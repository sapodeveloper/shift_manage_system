<?php

namespace Fuel\Migrations;

class Create_irregular
{
	public function up()
	{
		\DBUtil::create_table('irregular', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'irregular_name' => array('constraint' => 45, 'type' => 'varchar'),
			'irregular_enabledate' => array('type' => 'datetime'),
			'irregular_limitdate' => array('type' => 'datetime'),
			'irregular_condition' => array('type' => 'boolean'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('irregular');
	}
}
