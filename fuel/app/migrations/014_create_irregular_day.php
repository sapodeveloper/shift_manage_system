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
			'created_at' => array('type' => 'int', 'constraint' => 11, 'default' => 0),
			'updated_at' => array('type' => 'int', 'constraint' => 11, 'default' => 0),

		), array('id'));

		$table = 'irregular_day';
		// 今日の日付を取得
		$dt = new \DateTime();
		// 1週間後の日付を取得
		$date = $dt->add(new \DateInterval('P7D'))->format('Y-m-d');
		$date_info = $dt->format('m月d日');
		for ($irregular_shift = 1; $irregular_shift <= 2; $irregular_shift++){
			for($loop = 0; $loop < 5; $loop++){
			\DB::insert($table)->set(array('irregular_id' => $irregular_shift, 
																		 'irregular_day_date' => $date,
																		 'irregular_day_name' => $date_info,
																		 'irregular_day_condition' => 1))->execute();
			$date = $dt->add(new \DateInterval('P1D'))->format('Y-m-d');
			$date_info = $dt->format('m月d日');
			}
		}
	}

	public function down()
	{
		\DBUtil::drop_table('irregular_day');
	}
}