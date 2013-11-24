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

}
