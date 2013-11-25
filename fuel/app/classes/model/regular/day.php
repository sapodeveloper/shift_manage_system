<?php

class Model_Regular_Day extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'regular_day_id',
		'regular_id',
		'regular_day_name',
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
	protected static $_table_name = 'regular_days';

	protected static $_belongs_to = array(
		'regular' => array(
			'model_to' => 'regular',
			'key_from' => 'regular_id',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false
		),
	);
	protected static $_has_many = array(
		'regular_user' => array(
			'model_to' => 'regular_user',
			'key_from' => 'id',
			'key_to' => 'regular_day_id',
			'cascade_save' => true,
			'cascade_delete' => false
		),
	);
}
