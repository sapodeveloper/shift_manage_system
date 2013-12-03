<?php

class Model_Irregular_Type extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'irregular_type_name',
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
	protected static $_table_name = 'irregular_types';

	protected static $_has_many = array(
		'irregular_user' => array(
			'model_to' => 'Model_Irregular_User',
			'key_from' => 'id',
			'key_to' => 'irregular_day_id',
			'cascade_save' => true,
			'cascade_delete' => false
		),
	);

}
