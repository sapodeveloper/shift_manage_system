<?php

class Model_Irregular_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'irregular_day_id',
		'request_shift_type',
		'edited_shift_type',
		'user_comment',
		'created_at',
		'updated_at',
		'condition',
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
	protected static $_table_name = 'irregular_user';

	protected static $_belongs_to = array(
		'users' => array(
			'model_to' => 'Model_User',
			'key_from' => 'user_id',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false
		),
		'irregular_day' => array(
			'model_to' => 'Model_Irregular_Day',
			'key_from' => 'irregular_day_id',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false
		),
		'request_irregular_type' => array(
			'model_to' => 'Model_Irregular_Type',
			'key_from' => 'request_shift_type',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false
		),
		'edited_irregular_type' => array(
			'model_to' => 'Model_Irregular_Type',
			'key_from' => 'edited_shift_type',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false
		),
	);

	# model function
	public static function get_order_users_data($irregular_shift_day_id){
		return DB::query('SELECT * from irregular_user 
			inner join users on users.id = irregular_user.user_id
			where irregular_day_id = '.$irregular_shift_day_id.'
			order by users.year, users.username')->as_object()->execute()->as_array();
	}

	public static function get_order_users_shift_group_data($irregular_shift_id){
		return DB::query('SELECT distinct irregular_user.user_id, users.full_name,users.frist_name 
			from irregular_user 
			inner join users on users.id = irregular_user.user_id
			where irregular_day_id in (SELECT id FROM irregular_day WHERE irregular_id = '.$irregular_shift_id.')
			order by users.year, users.username')->as_object()->execute()->as_array();
	}

	public static function get_user_shift_data($irregular_day_id, $user_id){
		return DB::select('*')->from('irregular_user')->where('irregular_day_id', $irregular_day_id)->where('user_id', $user_id)->execute();
	}
}
