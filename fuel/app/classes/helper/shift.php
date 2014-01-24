<?php
class Helper_Shift {
	// 該当時間の勤務スタッフ数を求める
  public static function irregular_work_staff_count($irregular_shift_day_id ,$shift_type) {
    if($shift_type == 0){
        $result = DB::select('*')
            ->from('irregular_user')
            ->where('irregular_day_id', $irregular_shift_day_id)
            ->where('edited_shift_type', 'in', array(1,2,3))
            ->execute();
        echo count($result);
    }else{
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

  //　当該イレギュラーシフトの勤務形態をテーブルタグで出力する
  public static function irregular_work_type_for_table($irregular_work_type){
    if ($irregular_work_type == 1) {
        echo "<td>午前勤務</td><td>10:00 ~ 13:00</td><td>3:00</td><td bgcolor = 'deepskyblue'></td><td></td>";
    }elseif ($irregular_work_type == 2) {
        echo "<td>午後勤務</td><td>13:00 ~ 17:00</td><td>4:00</td><td></td><td bgcolor = 'deepskyblue'></td>";
    }elseif ($irregular_work_type == 3) {
        echo "<td>フル勤務</td><td>10:00 ~ 17:00</td><td>6:00</td><td colspan='2' bgcolor = 'deepskyblue'></td>";
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

  // 当該レギュラーシフトグループにおいて特定ユーザが編集ロックされているか調べる
  public static function user_shifts_lock($irregular_id, $user_id){
    $irregular_day_id = DB::select('id')->from('irregular_day')->where('irregular_id', $irregular_id);
    $query = DB::select('*')
        ->from('irregular_user')
        ->where('user_id', $user_id)
        ->and_where('irregular_day_id', 'in', $irregular_day_id)
        ->and_where('condition', 1)
        ->execute();
    if(count($query)>0){
        return "true";
    }else{
        return "false";
    }
  }

  // 特定ユーザの申請が編集ロックされているか調べる
  public static function user_shift_lock($irregular_user_id){
    $irregular_user = Model_Irregular_User::find($irregular_user_id);
    if($irregular_user->condition == "1"){
        return "true";
    }else{
        return "false";
    }
  }

  // 当該シフトの状態を出力する
  public static function shift_condition($condition) {
    if ($condition == 1) {
        echo "申請受付中";
    }elseif ($condition == 2) {
        echo "編成中";
    }elseif ($condition == 3) {
        echo "確定";
    }
  }

  public static function shift_condition_color($condition) {
    if ($condition == 1) {
        echo "";
    }elseif ($condition == 2) {
        echo "uk-alert-danger";
    }elseif ($condition == 3) {
        echo "uk-alert-success";
    }
  }


}