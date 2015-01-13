<?php
class Helper_Mail {
	/*
		引数：送付先アドレス、送付先ユーザ名、送付先ユーザログインID
		戻り値：なし
		用途：新規ユーザに対してメールを送信する
	*/
    public static function send_new_user_mail($send_mail_address, $send_user_name, $send_login_name) {
    	$email = Email::forge();
			// $emailオブジェクトに対して送信元、送信先、タイトルを設定する
			$email->from('sapodeveloper@gmail.com', 'シフト管理システム');
			$email->to($send_mail_address);
			$email->subject('新規ユーザ登録のお知らせ');
			// $bodyに本文を記載する
			$body = "広島工業大学ISMCサポートセンター ". $send_user_name." 様\r\r";
			$body .= "シフト管理システムへのユーザ登録がされました。\r";
			$body .= "ログインID : ". $send_login_name ."\r";
			$body .= "初期パスワード : saposen\r";
			//$body .= "URL : http://sapowork.cc.it-hiroshima.ac.jp/shift(予定) \r";
			$body .= "初回ログイン後にパスワード変更ページにリダイレクトするので、パスワードの変更をお願いします。";
			// $emailのbodyオブジェクトに対して記載した本文を設定する
			$email->body($body);
			// メールを送信
			try {
				// 送信処理
			    $email->send();
			    Helper_Log::write_log(0, $send_mail_address."へ新規登録メールを正常に送信しました。", 1);
			}
			catch (\EmailValidationFailedException $e) {
				// バリデーションエラー
				Helper_Log::write_log(0, $send_mail_address."への新規登録メールの送信に失敗しました", 0);
			}
			catch (\EmailSendingFailedException $e) {
				// 送信エラー
				Helper_Log::write_log(0, $send_mail_address."への新規登録メールの送信に失敗しました", 0);
			}
    }

    /*
		引数：送付先アドレス、送付先ユーザ名
		戻り値：なし
		用途：パスワードリセットしたユーザにメッセージを送信する
	*/
    public static function reset_password_mail($send_mail_address, $send_user_name) {
    	$email = Email::forge();
			// $emailオブジェクトに対して送信元、送信先、タイトルを設定する
			$email->from('sapodeveloper@gmail.com', 'シフト管理システム');
			$email->to($send_mail_address);
			$email->subject('パスワードリセットのお知らせ');
			// $bodyに本文を記載する
			$body = "広島工業大学ISMCサポートセンター ". $send_user_name." 様\r\r";
			$body .= "シフト管理システムへのログインパスワードがリセットがされました。\r";
			$body .= "新規ログインパスワード : saposen\r";
			$body .= "ログイン後にパスワード変更ページにリダイレクトするので、パスワードの変更をお願いします。";
			// $emailのbodyオブジェクトに対して記載した本文を設定する
			$email->body($body);
			// メールを送信
			try {
				// 送信処理
			    $email->send();
			    Helper_Log::write_log(0, $send_mail_address."へパスワードリセットメールを正常に送信しました。", 1);
			}
			catch (\EmailValidationFailedException $e) {
				// バリデーションエラー
				Helper_Log::write_log(0, $send_mail_address."へのパスワードリセットメールの送信に失敗しました", 0);
			}
			catch (\EmailSendingFailedException $e) {
				// 送信エラー
				Helper_Log::write_log(0, $send_mail_address."へのパスワードリセットメールの送信に失敗しました", 0);
			}
    }
}