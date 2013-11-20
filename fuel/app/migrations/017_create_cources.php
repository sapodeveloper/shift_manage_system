<?php

namespace Fuel\Migrations;

class Create_cources
{
	public function up()
	{
		\DBUtil::create_table('cources', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'cource_name' => array('constraint' => 255, 'type' => 'varchar'),
			'department_id' => array('constraint' => 11, 'type' => 'int'),
			'condition' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));

		$table = 'cources';

		\DB::insert($table)->set(array('cource_name' => '学科情報無し',  'department_id' => 1, 'condition' => 1))->execute();
		\DB::insert($table)->set(array('cource_name' => '電子情報工学科',  'department_id' => 2, 'condition' => 1))->execute();
		\DB::insert($table)->set(array('cource_name' => '電気システム工学科', 'department_id' => 2, 'condition' => 1))->execute();
		\DB::insert($table)->set(array('cource_name' => '機械システム工学科', 'department_id' => 2, 'condition' => 1))->execute();
		\DB::insert($table)->set(array('cource_name' => '知能機械工学科', 'department_id' => 2, 'condition' => 1))->execute();
		\DB::insert($table)->set(array('cource_name' => '都市デザイン工学科', 'department_id' => 2, 'condition' => 1))->execute();
		\DB::insert($table)->set(array('cource_name' => '建築工学科', 'department_id' => 3, 'condition' => 1))->execute();
		\DB::insert($table)->set(array('cource_name' => '情報工学科', 'department_id' => 3, 'condition' => 1))->execute();
		\DB::insert($table)->set(array('cource_name' => '知的情報システム学科', 'department_id' => 4, 'condition' => 1))->execute();
		\DB::insert($table)->set(array('cource_name' => '環境デザイン学科', 'department_id' => 4, 'condition' => 1))->execute();
		\DB::insert($table)->set(array('cource_name' => '地球環境学科', 'department_id' => 4, 'condition' => 1))->execute();
		\DB::insert($table)->set(array('cource_name' => '生体医工学科', 'department_id' => 5, 'condition' => 1))->execute();
		\DB::insert($table)->set(array('cource_name' => '食品生命科学科', 'department_id' => 5, 'condition' => 1))->execute();

	}

	public function down()
	{
		\DBUtil::drop_table('cources');
	}
}