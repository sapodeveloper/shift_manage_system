<?php

class Model_Irregular_Day extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'irregular_id',
		'irregular_day_date',
		'irregular_day_name',
		'irregular_day_condition',
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
	protected static $_table_name = 'irregular_days';

}
