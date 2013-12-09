<?php

namespace Fuel\Migrations;

class Create_irregular_types
{
	public function up()
	{
		\DBUtil::create_table('irregular_type', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'type_name' => array('constraint' => 20, 'type' => 'varchar'),
			'type_start_time' => array('type' => 'time'),
			'type_end_time' => array('type' => 'time'),
			'type_working_time' => array('type' => 'time'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'default' => 0),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'default' => 0),

		), array('id'));

		$table = 'irregular_type';
		\DB::insert($table)->set(array('type_name' => '午前勤務','type_start_time' => '10:00:00','type_end_time' => '13:00:00','type_working_time' => '3:00:00'))->execute();
		\DB::insert($table)->set(array('type_name' => '午後勤務','type_start_time' => '13:00:00','type_end_time' => '17:00:00','type_working_time' => '4:00:00'))->execute();
		\DB::insert($table)->set(array('type_name' => 'フル勤務','type_start_time' => '10:00:00','type_end_time' => '17:00:00','type_working_time' => '6:00:00'))->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('irregular_type');
	}
}
