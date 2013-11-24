<?php

class Model_Regular extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'regular_id',
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
	protected static $_table_name = 'regulars';

}