<?php

namespace Fuel\Migrations;

class Auth_Create_Authdefaults
{

	function up()
	{
		// get the driver used
		\Config::load('auth', true);

		$drivers = \Config::get('auth.driver', array());
		is_array($drivers) or $drivers = array($drivers);

		if (in_array('Ormauth', $drivers))
		{
			// get the tablename
			\Config::load('ormauth', true);
			$table = \Config::get('ormauth.table_name', 'users');

			/*
			 * create the default Groups and roles, to be compatible with standard Auth
			 */

			// create the 'Banned' group, 'banned' role
			list($group_id, $rows_affected) = \DB::insert($table.'_groups')->set(array('name' => 'Banned'))->execute();
			list($role_id, $rows_affected) = \DB::insert($table.'_roles')->set(array('name' => 'banned', 'filter' => 'D'))->execute();
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id, 'role_id' => $role_id))->execute();

			// create the 'Guests' group
			list($group_id_guest, $rows_affected) = \DB::insert($table.'_groups')->set(array('name' => 'Guests'))->execute();
			list($role_id_guest, $rows_affected) = \DB::insert($table.'_roles')->set(array('name' => 'public'))->execute();
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id_guest, 'role_id' => $role_id_guest))->execute();

			// create the 'Users' group
			list($group_id, $rows_affected) = \DB::insert($table.'_groups')->set(array('name' => 'Users'))->execute();
			list($role_id_user, $rows_affected) = \DB::insert($table.'_roles')->set(array('name' => 'user'))->execute();
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id, 'role_id' => $role_id_user))->execute();

			// create the 'Moderators' group
			list($group_id, $rows_affected) = \DB::insert($table.'_groups')->set(array('name' => 'Moderators'))->execute();
			list($role_id_mod, $rows_affected) = \DB::insert($table.'_roles')->set(array('name' => 'moderator'))->execute();
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id, 'role_id' => $role_id_user))->execute();
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id, 'role_id' => $role_id_mod))->execute();

			// create the 'Administrators' group
			list($group_id, $rows_affected) = \DB::insert($table.'_groups')->set(array('name' => 'Administrators'))->execute();
			list($role_id, $rows_affected) = \DB::insert($table.'_roles')->set(array('name' => 'administrator'))->execute();
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id, 'role_id' => $role_id_user))->execute();
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id, 'role_id' => $role_id_mod))->execute();
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id, 'role_id' => $role_id))->execute();

			// create the 'Superadmins' group
			list($group_id_admin, $rows_affected) = \DB::insert($table.'_groups')->set(array('name' => 'Super Admins'))->execute();
			list($role_id_admin, $rows_affected) = \DB::insert($table.'_roles')->set(array('name' => 'superadmin', 'filter' => 'A'))->execute();
			\DB::insert($table.'_group_roles')->set(array('group_id' => $group_id_admin, 'role_id' => $role_id_admin))->execute();

			/*
			 * create the default admin user, so we have initial access
			 */

			// create the guest account
			//list($guest_id, $affected) = \DB::insert($table)->set(
			//	array(
			//		'username' => 'guest',
			//		'password' => 'YOU CAN NOT USE THIS TO LOGIN',
			//		'email' => '',
			//		'group_id' => $group_id_guest,
			//		'last_login' => 0,
			//		'previous_login' => 0,
			//		'login_hash' => '',
			//		'user_id' => 0,
			//		'created_at' => time(),
			//		'updated_at' => 0,
			//	)
			//)->execute();

			// adjust the id's, auto_increment doesn't want to create a key with value 0
			//\DB::update($table)->set(array('id' => 0))->where('id', '=', $guest_id)->execute();

			// add guests full name to the metadata
			//\DB::insert($table.'_metadata')->set(
			//	array(
			//		'parent_id' => 0,
			//		'key' => 'fullname',
			//		'value' => 'Guest',
			//	)
			//)->execute();

			// create the administrator account if needed, and assign it the superadmin group so it has all access
			$result = \DB::select('id')->from($table)->where('username','=','admin')->execute();
			if (count($result) == 0)
			{
				\Auth::instance()->create_user('admin', 'admin', 'admin@example.org', $group_id_admin, array('fullname' => 'System administrator'));
				$values = array('full_name' => 'システム管理者', 'frist_name' => 'システム', 'last_name' => '管理者', 'department_id' => 1, 'cource_id' => 1, 'year' => 2013, 'auth_id' => 3);
				\DB::update('users')->set($values)->where('username', '=', 'admin')->execute();
			}

			// テストユーザ追加
			\Auth::instance()->create_user('nishimoto', 'admin', 'nishimoto@example.org', $group_id_admin);
			$values = array('full_name' => '西本 岳', 'frist_name' => '西本', 'last_name' => '岳', 'department_id' => 3, 'cource_id' => 8, 'year' => 2011, 'auth_id' => 3);
			\DB::update('users')->set($values)->where('username', '=', 'nishimoto')->execute();

			\Auth::instance()->create_user('nakaoku', 'admin', 'nakaoku@example.org', $group_id_admin);
			$values = array('full_name' => '中奥 貴浩', 'frist_name' => '中奥', 'last_name' => '貴浩', 'department_id' => 3, 'cource_id' => 8, 'year' => 2011, 'auth_id' => 3);
			\DB::update('users')->set($values)->where('username', '=', 'nakaoku')->execute();

			\Auth::instance()->create_user('mizawa', 'admin', 'mizawa@example.org', $group_id_admin);
			$values = array('full_name' => '三澤 湧樹', 'frist_name' => '三澤', 'last_name' => '湧樹', 'department_id' => 3, 'cource_id' => 8, 'year' => 2013, 'auth_id' => 3);
			\DB::update('users')->set($values)->where('username', '=', 'mizawa')->execute();

			\Auth::instance()->create_user('toyoshima', 'admin', 'toyoshima@example.org', $group_id_admin);
			$values = array('full_name' => '豊嶋 駿仁', 'frist_name' => '豊嶋', 'last_name' => '駿仁', 'department_id' => 2, 'cource_id' => 3, 'year' => 2013, 'auth_id' => 3);
			\DB::update('users')->set($values)->where('username', '=', 'toyoshima')->execute();

			\Auth::instance()->create_user('omori', 'admin', 'omori@example.org', $group_id_admin);
			$values = array('full_name' => '大盛 将', 'frist_name' => '大盛', 'last_name' => '将', 'department_id' => 3, 'cource_id' => 8, 'year' => 2012, 'auth_id' => 3);
			\DB::update('users')->set($values)->where('username', '=', 'omori')->execute();

			\Auth::instance()->create_user('morishita', 'admin', 'morishita@example.org', $group_id_admin);
			$values = array('full_name' => '森下 智裕', 'frist_name' => '森下', 'last_name' => '智裕', 'department_id' => 3, 'cource_id' => 9, 'year' => 2010, 'auth_id' => 3);
			\DB::update('users')->set($values)->where('username', '=', 'morishita')->execute();
			 
		}
	}

	function down()
	{
		// get the driver used
		\Config::load('auth', true);

		$drivers = \Config::get('auth.driver', array());
		is_array($drivers) or $drivers = array($drivers);

		if (in_array('Ormauth', $drivers))
		{
			// get the tablename
			\Config::load('ormauth', true);
			$table = \Config::get('ormauth.table_name', 'users');

			// empty the user, group and role tables
			\DBUtil::truncate_table($table);
			\DBUtil::truncate_table($table.'_groups');
			\DBUtil::truncate_table($table.'_roles');
			\DBUtil::truncate_table($table.'_group_roles');
		}
	}
}
