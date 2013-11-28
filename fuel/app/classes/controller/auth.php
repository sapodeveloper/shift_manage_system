<?php

class Controller_Auth extends Controller
{

	public function action_login()
	{
		$error = null;

        $view = View::forge('auth/login');

        $form = Fieldset::forge();

        $form->add('username', 'アカウント', array('maxlength' => 12))
            ->add_rule('required')
            ->add_rule('max_length', 12);

        $form->add('password', 'パスワード', array('type' => 'password'))
            ->add_rule('required')
            ->add_rule('max_length', 12);
        $form->add('submit', '', array('type' => 'submit', 'value' => 'ログイン'));

        $form->repopulate();

        $auth = Auth::instance();

        Auth::logout();

        if (Input::post()) {
            if ($form->validation()->run()) {
                if ($auth->login(Input::post('username'), Input::post('password'))) {
                    // ログイン成功時
                    Response::redirect('main/index');
                }
                $error = 'ログイン失敗に失敗しました';
            } else {
                $error = 'ログイン失敗に失敗しました';
            }
        }

        $view->set_safe('form', $form->build(Uri::create('/')));
        $view->set('error', $error);

        return $view;
	}

    public function action_logout()
    {
        Auth::logout();
        Response::redirect('/');
    }

}
