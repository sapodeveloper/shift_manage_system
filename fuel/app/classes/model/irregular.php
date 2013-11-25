<?php

class Model_Irregular extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'irregular_name',
		'irregular_limitdate',
		'irregular_condition',
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
	protected static $_table_name = 'irregulars';

	protected static $_has_many = array(
		'irregular_day' => array(
			'model_to' => 'irregular_day',
			'key_from' => 'id',
			'key_to' => 'irregular_id',
			'cascade_save' => true,
			'cascade_delete' => false
		),
	);

}
