<?php

namespace Fuel\Migrations;

class Create_regular
{
	public function up()
	{
		\DBUtil::create_table('regular', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'regular_name' => array('constraint' => 45, 'type' => 'varchar'),
			'regular_limitdate' => array('type' => 'date'),
			'regular_condition' => array('type' => 'boolean'),
			'created_at' => array('type' => 'int', 'constraint' => 11, 'default' => 0),
			'updated_at' => array('type' => 'int', 'constraint' => 11, 'default' => 0),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('regular');
	}
}
