<?php

namespace Fuel\Migrations;

class Create_auths
{
	public function up()
	{
		\DBUtil::create_table('auths', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'auth_type' => array('constraint' => 255, 'type' => 'varchar'),
			'condition' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));

		$table = 'auths';
		\DB::insert($table)->set(array('auth_type' => '一般スタッフ', 'condition' => 1))->execute();
		\DB::insert($table)->set(array('auth_type' => 'リーダ級スタッフ', 'condition' => 1))->execute();
		\DB::insert($table)->set(array('auth_type' => 'システム管理者', 'condition' => 1))->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('auths');
	}
}