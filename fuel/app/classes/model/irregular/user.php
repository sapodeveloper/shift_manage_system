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
	protected static $_table_name = 'irregular_users';

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
}
