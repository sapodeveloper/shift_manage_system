<?php

namespace Fuel\Migrations;

class Create_irregular_types
{
	public function up()
	{
		\DBUtil::create_table('irregular_type', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'irregular_type_name' => array('constraint' => 20, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'default' => 0),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'default' => 0),

		), array('id'));

		$table = 'irregular_type';
		\DB::insert($table)->set(array('irregular_type_name' => '午前勤務'))->execute();
		\DB::insert($table)->set(array('irregular_type_name' => '午後勤務'))->execute();
		\DB::insert($table)->set(array('irregular_type_name' => 'フル勤務'))->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('irregular_type');
	}
}
