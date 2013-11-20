<?php

namespace Fuel\Migrations;

class Create_departments
{
	public function up()
	{
		\DBUtil::create_table('departments', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'department_name' => array('constraint' => 255, 'type' => 'varchar'),
			'condition' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));

		$table = 'departments';

		\DB::insert($table)->set(array('department_name' => '工学部', 'condition' => 1))->execute();
		\DB::insert($table)->set(array('department_name' => '情報学部', 'condition' => 1))->execute();
		\DB::insert($table)->set(array('department_name' => '環境学部', 'condition' => 1))->execute();
		\DB::insert($table)->set(array('department_name' => '生命学部', 'condition' => 1))->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('departments');
	}
}