<?php
class Helper_Shift_Regular{
	// 該当時間の勤務スタッフ数を求める
  public static function regular_work_staff_count($regular_shift_day_id ,$shift_type) {
    if($shift_type == 0){
        $result = DB::select('*')
            ->from('regular_user')
            ->where('regular_day_id', $regular_shift_day_id)
            ->where('edited_shift_type', 'in', array(1,2,3))
            ->execute();
        echo count($result);
    }else{
        $result = DB::select('*')
            ->from('regular_user')
            ->where_open()
            ->where('regular_day_id', $regular_shift_day_id)
            ->and_where('edited_shift_type', $shift_type)
            ->where_close()
            ->or_where_open()
            ->where('regular_day_id', $regular_shift_day_id)
            ->and_where('edited_shift_type', 3)
            ->or_where_close()
            ->execute();
        echo count($result);
    }
  }

  // 該当勤務日の合計勤務時間を求める
  public static function regular_work_time_count($regular_shift_day_id) {
    $morning = DB::select('*')
    	->from('regular_user')
    	->where('regular_day_id', $regular_shift_day_id)
    	->and_where('edited_shift_type', 1)
    	->execute();
    $afternoon = DB::select('*')
    	->from('regular_user')
    	->where('regular_day_id', $regular_shift_day_id)
    	->and_where('edited_shift_type', 2)
    	->execute();
    $full = DB::select('*')
    	->from('regular_user')
    	->where('regular_day_id', $regular_shift_day_id)
    	->and_where('edited_shift_type', 3)
    	->execute();
		echo count($morning)*3 + count($afternoon) * 4 + count($full) * 6;
  }

  // 該当イレギュラーシフトの勤務形態を出力する
  public static function regular_work_type($regular_work_type){
    if ($regular_work_type == 1) {
        echo "午前勤務";
    }elseif ($regular_work_type == 2) {
        echo "午後勤務";
    }elseif ($regular_work_type == 3) {
        echo "フル勤務";
    }elseif ($regular_work_type == 4) {
        echo "勤務無し";
    }
  }

  //　当該イレギュラーシフトの勤務形態をテーブルタグで出力する
  public static function regular_work_type_for_table($regular_work_type){
    if ($regular_work_type == 1) {
        echo "<td>午前勤務</td><td>10:00 ~ 13:00</td><td>3:00</td><td bgcolor = 'deepskyblue'></td><td></td>";
    }elseif ($regular_work_type == 2) {
        echo "<td>午後勤務</td><td>13:00 ~ 17:00</td><td>4:00</td><td></td><td bgcolor = 'deepskyblue'></td>";
    }elseif ($regular_work_type == 3) {
        echo "<td>フル勤務</td><td>10:00 ~ 17:00</td><td>6:00</td><td colspan='2' bgcolor = 'deepskyblue'></td>";
    }
  }

  // 当該イレギュラーシフトグループの特定ユーザの希望勤務日数を求める
  public static function request_work_day_count($regular_id, $user_id){
    $regular_day_id = DB::select('id')->from('regular_day')->where('regular_id', $regular_id);
    $work_day = DB::select('*')->from('regular_user')
        ->where('user_id', $user_id)
        ->and_where('request_shift_type', 'in', array(1,2,3))
        ->and_where('regular_day_id', 'in', $regular_day_id)
        ->execute();
    echo count($work_day);
  }

  // 当該イレギュラーシフトグループの特定ユーザの確定勤務日数を求める
  public static function deside_work_day_count($regular_id, $user_id){
    $regular_day_id = DB::select('id')->from('regular_day')->where('regular_id', $regular_id);
    $work_day = DB::select('*')->from('regular_user')
        ->where('user_id', $user_id)
        ->and_where('edited_shift_type', 'in', array(1,2,3))
        ->and_where('regular_day_id', 'in', $regular_day_id)
        ->execute();
    echo count($work_day);
  }

  // 当該イレギュラーシフトグループの特定ユーザの希望勤務時間を求める
  public static function request_work_time_count($regular_id, $user_id){
    $regular_day_id = DB::select('id')->from('regular_day')->where('regular_id', $regular_id);
    $morning = DB::select('*')->from('regular_user')
        ->where('user_id', $user_id)
        ->and_where('request_shift_type', 1)
        ->and_where('regular_day_id', 'in', $regular_day_id)
        ->execute();
    $afternoon = DB::select('*')->from('regular_user')
        ->where('user_id', $user_id)
        ->and_where('request_shift_type', 2)
        ->and_where('regular_day_id', 'in', $regular_day_id)
        ->execute();
    $full = DB::select('*')->from('regular_user')
        ->where('user_id', $user_id)
        ->and_where('request_shift_type', 3)
        ->and_where('regular_day_id', 'in', $regular_day_id)
        ->execute();
    echo count($morning)*3 + count($afternoon) * 4 + count($full) * 6;
  }

  // 当該イレギュラーシフトグループの特定ユーザの確定勤務時間を求める
  public static function deside_work_time_count($regular_id, $user_id){
    $regular_day_id = DB::select('id')->from('regular_day')->where('regular_id', $regular_id);
    $morning = DB::select('*')->from('regular_user')
        ->where('user_id', $user_id)
        ->and_where('edited_shift_type', 1)
        ->and_where('regular_day_id', 'in', $regular_day_id)
        ->execute();
    $afternoon = DB::select('*')->from('regular_user')
        ->where('user_id', $user_id)
        ->and_where('edited_shift_type', 2)
        ->and_where('regular_day_id', 'in', $regular_day_id)
        ->execute();
    $full = DB::select('*')->from('regular_user')
        ->where('user_id', $user_id)
        ->and_where('edited_shift_type', 3)
        ->and_where('regular_day_id', 'in', $regular_day_id)
        ->execute();
    echo count($morning)*3 + count($afternoon) * 4 + count($full) * 6;
  }

  // 当該イレギュラーシフトグループの希望勤務時間の合計を求める
  public static function request_regular_group_total_work_time($regular_id){
    $regular_day_id = DB::select('id')->from('regular_day')->where('regular_id', $regular_id);
    $morning = DB::select('*')
        ->from('regular_user')
        ->where('regular_day_id', 'in', $regular_day_id)
        ->and_where('request_shift_type', 1)
        ->execute();
    $afternoon = DB::select('*')
        ->from('regular_user')
        ->where('regular_day_id', 'in', $regular_day_id)
        ->and_where('request_shift_type', 2)
        ->execute();
    $full = DB::select('*')
        ->from('regular_user')
        ->where('regular_day_id', 'in', $regular_day_id)
        ->and_where('request_shift_type', 3)
        ->execute();
    echo count($morning)*3 + count($afternoon) * 4 + count($full) * 6;
  }

  // 当該イレギュラーシフトグループの確定勤務時間の合計を求める
  public static function deside_regular_group_total_work_time($regular_id){
    $regular_day_id = DB::select('id')->from('regular_day')->where('regular_id', $regular_id);
    $morning = DB::select('*')
        ->from('regular_user')
        ->where('regular_day_id', 'in', $regular_day_id)
        ->and_where('edited_shift_type', 1)
        ->execute();
    $afternoon = DB::select('*')
        ->from('regular_user')
        ->where('regular_day_id', 'in', $regular_day_id)
        ->and_where('edited_shift_type', 2)
        ->execute();
    $full = DB::select('*')
        ->from('regular_user')
        ->where('regular_day_id', 'in', $regular_day_id)
        ->and_where('edited_shift_type', 3)
        ->execute();
    echo count($morning)*3 + count($afternoon) * 4 + count($full) * 6;
  }

  // 当該レギュラーシフトグループにおいて特定ユーザが編集ロックされているか調べる
  public static function user_shifts_lock($regular_id, $user_id){
    $regular_day_id = DB::select('id')->from('regular_day')->where('regular_id', $regular_id);
    $query = DB::select('*')
        ->from('regular_user')
        ->where('user_id', $user_id)
        ->and_where('regular_day_id', 'in', $regular_day_id)
        ->and_where('condition', 1)
        ->execute();
    if(count($query)>0){
        return "true";
    }else{
        return "false";
    }
  }

  // 特定ユーザの申請が編集ロックされているか調べる
  public static function user_shift_lock($regular_user_id){
    $regular_user = Model_Regular_User::find($regular_user_id);
    if($regular_user->condition == "1"){
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

  public static function shift_table($regular_id, $user_id){
    $regular_day_ids = DB::select('id')->from('regular_day')->where('regular_id', $regular_id)->execute();
    foreach ($regular_day_ids as $regular_day_id) {
        $user_shift = DB::select('edited_shift_type')
                        ->from('regular_user')
                        ->where('regular_day_id', $regular_day_id)
                        ->and_where('user_id', $user_id)
                        ->execute();
        if($user_shift[0]["edited_shift_type"] == "1"){
            echo "<td style=\"background-color: #a9f5a9;\"><i class=\"fa fa-sun-o\"></i></td>
                <td><i class=\"fa fa-moon-o\"></i></td>";
        }elseif($user_shift[0]["edited_shift_type"] == "2"){
            echo "<td><i class=\"fa fa-sun-o\"></i></td>
                <td style=\"background-color: #a9f5a9;\"><i class=\"fa fa-moon-o\"></i></td>";
        }elseif($user_shift[0]["edited_shift_type"] == "3"){
            echo "<td style=\"background-color: #a9f5a9;\"><i class=\"fa fa-sun-o\"></i></td>
                <td style=\"background-color: #a9f5a9;\"><i class=\"fa fa-moon-o\"></i></td>";
        }elseif($user_shift[0]["edited_shift_type"] == "4"){
            echo "<td><i class=\"fa fa-sun-o\"></i></td>
                <td><i class=\"fa fa-moon-o\"></i></td>";
        }
    }
  }


}
