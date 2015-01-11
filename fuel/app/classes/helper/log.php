<?php
class Helper_Log {
	/*
		引数：ログタイプ、ログ、ログ管理
		戻り値：なし
		用途：処理実行時のログを残すための処理を行う
	*/
    public static function write_log($log_type, $log_message, $log_condition) {
        $log = Model_Log::forge(array(
            'log_type' => $log_type,
            'log_message' => $log_message,
            'log_condition' => $log_condition,
        ));
        $log->save();
    }
}