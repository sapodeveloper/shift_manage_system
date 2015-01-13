<?php
class Helper_Application {
	/*
		引数：指定なし
		返り値：実行時の日付をyyyy-mm-dd形式で返す
		用途：実行した日における任意のシフトグループを検索時に使用する
	*/
    public static function get_today() {
        $datetime = new \DateTime();
        return $datetime->format('Y-m-d');
    }
}
