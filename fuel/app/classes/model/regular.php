<?php

class Model_Regular extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'regular_name',
		'regular_limitdate',
		'regular_condition',
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
	protected static $_table_name = 'regular';

	protected static $_has_many = array(
		'regular_day' => array(
			'model_to' => 'Model_Regular_Day',
			'key_from' => 'id',
			'key_to' => 'regular_id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
	);

}
