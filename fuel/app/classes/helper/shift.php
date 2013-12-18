<?php
class Helper_Shift {
	// 該当時間の勤務スタッフ数を求める
  public static function irregular_work_staff_count($irregular_shift_day_id ,$shift_type) {
    $result = DB::select('*')
    	->from('irregular_user')
    	->where_open()
    	->where('irregular_day_id', $irregular_shift_day_id)
    	->and_where('edited_shift_type', $shift_type)
    	->where_close()
    	->or_where_open()
    	->where('irregular_day_id', $irregular_shift_day_id)
    	->and_where('edited_shift_type', 3)
    	->or_where_close()
    	->execute();
		echo count($result);
  }

  // 該当勤務日の合計勤務時間を求める
  public static function irregular_work_time_count($irregular_shift_day_id) {
    $morning = DB::select('*')
    	->from('irregular_user')
    	->where('irregular_day_id', $irregular_shift_day_id)
    	->and_where('edited_shift_type', 1)
    	->execute();
    $afternoon = DB::select('*')
    	->from('irregular_user')
    	->where('irregular_day_id', $irregular_shift_day_id)
    	->and_where('edited_shift_type', 2)
    	->execute();
    $full = DB::select('*')
    	->from('irregular_user')
    	->where('irregular_day_id', $irregular_shift_day_id)
    	->and_where('edited_shift_type', 3)
    	->execute();
		echo count($morning)*3 + count($afternoon) * 4 + count($full) * 6;
  }
}