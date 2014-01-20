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

  // 該当イレギュラーシフトの勤務形態を出力する
  public static function irregular_work_type($irregular_work_type){
    if ($irregular_work_type == 1) {
        echo "午前勤務";
    }elseif ($irregular_work_type == 2) {
        echo "午後勤務";
    }elseif ($irregular_work_type == 3) {
        echo "フル勤務";
    }elseif ($irregular_work_type == 4) {
        echo "勤務無し";
    }
  }

  // 当該イレギュラーシフトグループの特定ユーザの希望勤務日数を求める
  public static function request_work_day_count($irregular_id, $user_id){
    $irregular_day_id = DB::select('id')->from('irregular_day')->where('irregular_id', $irregular_id);
    $work_day = DB::select('*')->from('irregular_user')
        ->where('user_id', $user_id)
        ->and_where('request_shift_type', 'in', array(1,2,3))
        ->and_where('irregular_day_id', 'in', $irregular_day_id)
        ->execute();
    echo count($work_day);
  }

  // 当該イレギュラーシフトグループの特定ユーザの確定勤務日数を求める
  public static function deside_work_day_count($irregular_id, $user_id){
    $irregular_day_id = DB::select('id')->from('irregular_day')->where('irregular_id', $irregular_id);
    $work_day = DB::select('*')->from('irregular_user')
        ->where('user_id', $user_id)
        ->and_where('edited_shift_type', 'in', array(1,2,3))
        ->and_where('irregular_day_id', 'in', $irregular_day_id)
        ->execute();
    echo count($work_day);
  }

  // 当該イレギュラーシフトグループの特定ユーザの希望勤務時間を求める
  public static function request_work_time_count($irregular_id, $user_id){
    $irregular_day_id = DB::select('id')->from('irregular_day')->where('irregular_id', $irregular_id);
    $morning = DB::select('*')->from('irregular_user')
        ->where('user_id', $user_id)
        ->and_where('request_shift_type', 1)
        ->and_where('irregular_day_id', 'in', $irregular_day_id)
        ->execute();
    $afternoon = DB::select('*')->from('irregular_user')
        ->where('user_id', $user_id)
        ->and_where('request_shift_type', 2)
        ->and_where('irregular_day_id', 'in', $irregular_day_id)
        ->execute();
    $full = DB::select('*')->from('irregular_user')
        ->where('user_id', $user_id)
        ->and_where('request_shift_type', 3)
        ->and_where('irregular_day_id', 'in', $irregular_day_id)
        ->execute();
    echo count($morning)*3 + count($afternoon) * 4 + count($full) * 6;
  }

  // 当該イレギュラーシフトグループの特定ユーザの確定勤務時間を求める
  public static function deside_work_time_count($irregular_id, $user_id){
    $irregular_day_id = DB::select('id')->from('irregular_day')->where('irregular_id', $irregular_id);
    $morning = DB::select('*')->from('irregular_user')
        ->where('user_id', $user_id)
        ->and_where('edited_shift_type', 1)
        ->and_where('irregular_day_id', 'in', $irregular_day_id)
        ->execute();
    $afternoon = DB::select('*')->from('irregular_user')
        ->where('user_id', $user_id)
        ->and_where('edited_shift_type', 2)
        ->and_where('irregular_day_id', 'in', $irregular_day_id)
        ->execute();
    $full = DB::select('*')->from('irregular_user')
        ->where('user_id', $user_id)
        ->and_where('edited_shift_type', 3)
        ->and_where('irregular_day_id', 'in', $irregular_day_id)
        ->execute();
    echo count($morning)*3 + count($afternoon) * 4 + count($full) * 6;
  }

  // 当該イレギュラーシフトグループの希望勤務時間の合計を求める
  public static function request_irregular_group_total_work_time($irregular_id){
    $irregular_day_id = DB::select('id')->from('irregular_day')->where('irregular_id', $irregular_id);
    $morning = DB::select('*')
        ->from('irregular_user')
        ->where('irregular_day_id', 'in', $irregular_day_id)
        ->and_where('request_shift_type', 1)
        ->execute();
    $afternoon = DB::select('*')
        ->from('irregular_user')
        ->where('irregular_day_id', 'in', $irregular_day_id)
        ->and_where('request_shift_type', 2)
        ->execute();
    $full = DB::select('*')
        ->from('irregular_user')
        ->where('irregular_day_id', 'in', $irregular_day_id)
        ->and_where('request_shift_type', 3)
        ->execute();
    echo count($morning)*3 + count($afternoon) * 4 + count($full) * 6;
  }

  // 当該イレギュラーシフトグループの確定勤務時間の合計を求める
  public static function deside_irregular_group_total_work_time($irregular_id){
    $irregular_day_id = DB::select('id')->from('irregular_day')->where('irregular_id', $irregular_id);
    $morning = DB::select('*')
        ->from('irregular_user')
        ->where('irregular_day_id', 'in', $irregular_day_id)
        ->and_where('edited_shift_type', 1)
        ->execute();
    $afternoon = DB::select('*')
        ->from('irregular_user')
        ->where('irregular_day_id', 'in', $irregular_day_id)
        ->and_where('edited_shift_type', 2)
        ->execute();
    $full = DB::select('*')
        ->from('irregular_user')
        ->where('irregular_day_id', 'in', $irregular_day_id)
        ->and_where('edited_shift_type', 3)
        ->execute();
    echo count($morning)*3 + count($afternoon) * 4 + count($full) * 6;
  }   


}