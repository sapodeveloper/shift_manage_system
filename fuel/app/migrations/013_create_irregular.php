<?php

namespace Fuel\Migrations;

class Create_irregular
{
	public function up()
	{
		\DBUtil::create_table('irregular', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'irregular_name' => array('constraint' => 45, 'type' => 'varchar'),
			'irregular_enabledate' => array('type' => 'date'),
			'irregular_limitdate' => array('type' => 'date'),
			'irregular_condition' => array('type' => 'boolean'),
			'irregular_entry_condition' => array('type' => 'boolean'),
			'created_at' => array('type' => 'int', 'constraint' => 11, 'default' => 0),
			'updated_at' => array('type' => 'int', 'constraint' => 11, 'default' => 0, 'null' => true),

		), array('id'));

		$table = 'irregular';
		// 今日の日付を取得
		$dt = new \DateTime();
		// 2週間後の日付を取得
		$next_week = $dt->add(new \DateInterval('P14D'))->format('Y-m-d');
		// 3週間後の日付を取得
		$next_2week = $dt->add(new \DateInterval('P7D'))->format('Y-m-d');
		// 4週間後の日付を取得
		$next_3week = $dt->add(new \DateInterval('P7D'))->format('Y-m-d');
		\DB::insert($table)->set(array('irregular_name' => 'テストイレギュラーシフト1', 
																	 'irregular_enabledate' => $next_2week,
																	 'irregular_limitdate' => $next_week,
																	 'irregular_condition' => 1,
																	 'irregular_entry_condition' => 2))->execute();
		\DB::insert($table)->set(array('irregular_name' => 'テストイレギュラーシフト2', 
																	 'irregular_enabledate' => $next_3week,
																	 'irregular_limitdate' => $next_2week,
																	 'irregular_condition' => 3,
																	 'irregular_entry_condition' => 1))->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('irregular');
	}
}
