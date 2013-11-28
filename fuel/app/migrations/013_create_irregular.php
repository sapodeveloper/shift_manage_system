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

		$table = 'irregular';
		// 今日の日付を取得
		$dt = new \DateTime();
		// 2週間後の日付を取得
		$next_week = $dt->add(new \DateInterval('P14D'))->format('Y-m-d H:i:s:');
		// 3週間後の日付を取得
		$next_2week = $dt->add(new \DateInterval('P7D'))->format('Y-m-d H:i:s:');
		// 4週間後の日付を取得
		$next_3week = $dt->add(new \DateInterval('P7D'))->format('Y-m-d H:i:s:');
		\DB::insert($table)->set(array('irregular_name' => 'テストイレギュラーシフト1', 
																	 'irregular_enabledate' => $next_2week,
																	 'irregular_limitdate' => $next_week,
																	 'irregular_condition' => 1))->execute();
		\DB::insert($table)->set(array('irregular_name' => 'テストイレギュラーシフト2', 
																	 'irregular_enabledate' => $next_3week,
																	 'irregular_limitdate' => $next_2week,
																	 'irregular_condition' => 1))->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('irregular');
	}
}
