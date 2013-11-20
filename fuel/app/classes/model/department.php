<?php

class Model_Department extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'department_name',
		'condition',
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
	protected static $_table_name = 'departments';

	protected static $_belongs_to = array(
		'user' => array(
			'model_to' => 'Model_User',
			'key_from' => 'id',
			'key_to' => 'department_id',
			'cascade_save' => false,
			'cascade_delete' => false
		)
	);


}
