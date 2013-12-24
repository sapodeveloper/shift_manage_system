<?php
class Helper_Mail {
    public static function send_new_user_mail($send_mail_address, $send_user_name, $send_login_name) {
    	$email = Email::forge();
			$email->from('sapodeveloper@gmail.com', 'シフト管理システム');
			$email->to($send_mail_address);
			$email->subject('新規ユーザ登録のお知らせ');
			$body = "広島工業大学ISMCサポートセンター ". $send_user_name." 様\r\r";
			$body .= "シフト管理システムへのユーザ登録がされました。\r";
			$body .= "ログインID : ". $send_login_name ."\r";
			$body .= "初期パスワード : saposen\r";
			//$body .= "URL : http://sapowork.cc.it-hiroshima.ac.jp/shift(予定) \r";
			$body .= "初回ログイン後にパスワード変更ページにリダイレクトするので、パスワードの変更をお願いします。";
			$email->body($body);
			try {
			    $email->send();
			    Helper_Log::write_log(0, $send_mail_address."へ新規登録メールを正常に送信しました。", 1);
			}
			catch (\EmailValidationFailedException $e) {
				Helper_Log::write_log(0, $send_mail_address."への新規登録メールの送信に失敗しました", 0);
			}
			catch (\EmailSendingFailedException $e) {
			  Helper_Log::write_log(0, $send_mail_address."への新規登録メールの送信に失敗しました", 0);
			}
    }

    public static function reset_password_mail($send_mail_address, $send_user_name) {
    	$email = Email::forge();
			$email->from('sapodeveloper@gmail.com', 'シフト管理システム');
			$email->to($send_mail_address);
			$email->subject('パスワードリセットのお知らせ');
			$body = "広島工業大学ISMCサポートセンター ". $send_user_name." 様\r\r";
			$body .= "シフト管理システムへのログインパスワードがリセットがされました。\r";
			$body .= "新規ログインパスワード : saposen\r";
			$body .= "ログイン後にパスワード変更ページにリダイレクトするので、パスワードの変更をお願いします。";
			$email->body($body);
			try {
			    $email->send();
			    Helper_Log::write_log(0, $send_mail_address."へ新規登録メールを正常に送信しました。", 1);
			}
			catch (\EmailValidationFailedException $e) {
				Helper_Log::write_log(0, $send_mail_address."への新規登録メールの送信に失敗しました", 0);
			}
			catch (\EmailSendingFailedException $e) {
			  Helper_Log::write_log(0, $send_mail_address."への新規登録メールの送信に失敗しました", 0);
			}
    }
}