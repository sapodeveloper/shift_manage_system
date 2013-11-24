<?php

class Model_Irregular_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'irregular_day_id',
		'request_start',
		'request_end',
		'edited_start',
		'edited_end',
		'user_comment',
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
	protected static $_table_name = 'irregular_users';

}
