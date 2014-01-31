<?php

class Controller_Auth extends Controller
{

	public function action_login()
	{
		$error = null;

        $view = View::forge('auth/login');

        $auth = Auth::instance();

        Auth::logout();

        if (Input::post()) {
            if ($auth->login(Input::post('username'), Input::post('password'))) {
                // ログイン成功時
                $user = Model_User::find('first', array('where' => array('username' => Input::post('username'))));
                Helper_Log::write_log(1, $user->full_name."さんが正常にログインしました。", 1);
                if(Input::post('password') == "saposen"){
                    Response::redirect('user/change_password');
                }else{
                    Response::redirect('main');
                }
            }
            Helper_Log::write_log(1, Input::post('username')."さんがログインに失敗しました。", 0);
            Session::set_flash('error', '学籍番号 もしくは パスワード が間違っています');
        }
        return $view;
	}

    public function action_logout()
    {
        $user_id = Auth::get('id');
        $user = Model_User::find($user_id);
        Helper_Log::write_log(1, $user->full_name."さんがログアウトしました。", 1);
        Auth::logout();
        Response::redirect('/');
    }

}
