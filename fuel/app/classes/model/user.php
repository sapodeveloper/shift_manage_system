<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'full_name',
		'frist_name',
		'last_name',
		'group_id',
		'email',
		'password',
		'year',
		'auth_id',
		'condition',
		'department_id',
		'cource_id',
		'created_at',
		'updated_at',
		'last_login',
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
	protected static $_table_name = 'users';

	protected static $_belongs_to = array(
		'department' => array(
			'model_to' => 'Model_Department',
			'key_from' => 'department_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false
		),
		'cource' => array(
			'model_to' => 'Model_Cource',
			'key_from' => 'cource_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false
		),
		'auth' => array(
			'model_to' => 'Model_Auth',
			'key_from' => 'auth_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false
		),
		
	);
	protected static $_has_many = array(
		'regular_user' => array(
			'model_to' => 'Model_Regular_User',
			'key_from' => 'id',
			'key_to' => 'user_id',
			'cascade_save' => true,
			'cascade_delete' => false
		),
		'irregular_user' => array(
			'model_to' => 'Model_Irregular_User',
			'key_from' => 'id',
			'key_to' => 'user_id',
			'cascade_save' => true,
			'cascade_delete' => false
		),
	);
}
