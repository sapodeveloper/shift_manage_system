<?php

class Model_Irregular extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'irregular_name',
		'irregular_enabledate',
		'irregular_limitdate',
		'irregular_condition',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
	protected static $_table_name = 'irregular';

	protected static $_has_many = array(
		'irregular_day' => array(
			'model_to' => 'Model_Irregular_Day',
			'key_from' => 'id',
			'key_to' => 'irregular_id',
			'cascade_save' => true,
			'cascade_delete' => false
		),
	);

	# model function
	public static function get_receiving_irregulars($date){
		return DB::select('*')->from('irregular')
							->where('irregular_limitdate', '>', $date)
							->where('irregular_condition', 1)
							->as_object()
							->execute()
							->as_array();
	}

	public static function get_re_receiving_irregulars($date){
		return DB::select('*')->from('irregular')
							->where('irregular_condition', 2)
							->as_object()
							->execute()
							->as_array();
	}

	public static function get_decision_irregulars($date){
		return DB::select('*')->from('irregular')
							->where('irregular_enabledate', '>', $date)
							->where('irregular_condition', 4)
							->as_object()
							->execute()
							->as_array();
	}

}
