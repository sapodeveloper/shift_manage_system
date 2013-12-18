<?php
class Helper_Log {
    public static function write_log($log_type, $log_message, $log_condition) {
        $log = Model_Log::forge(array(
            'log_type' => $log_type,
            'log_message' => $log_message,
            'log_condition' => $log_condition,
        ));
        $log->save();
    }
}