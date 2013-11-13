<?php

namespace Fuel\Migrations;

class Create_irregular_day
{
	public function up()
	{
		\DBUtil::create_table('irregular_day', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'irregular_id' => array('constraint' => 11, 'type' => 'int'),
			'irregular_day_date' => array('type' => 'date'),
			'irregular_day_name' => array('constraint' => 45, 'type' => 'varchar'),
			'irregular_day_condition' => array('type' => 'boolean'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('irregular_day');
	}
}