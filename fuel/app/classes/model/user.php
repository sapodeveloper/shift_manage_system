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
		'condition',
		'department_id',
		'cource_id',
		'created_at',
		'updated_at',
		'last_login',
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
		
	);

}
