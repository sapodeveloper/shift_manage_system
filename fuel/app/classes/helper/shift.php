<?php
class Helper_Shift {
    /*
        引数：シフトグループ種別(0=イレギュラー,1=レギュラー),シフトグループID
        戻り値：指定シフトグループに存在しているユーザ数
        用途：指定したシフトグループに申請しているユーザ数を重複なしでカウントする
    */
    public static function request_shift_distinct_staff_count($shift_type, $shift_id){
        if($shift_type == 0){
            $shift_group_ids = DB::select('id')->from('irregular_day')->where('irregular_id', $shift_id);
            $result = DB::select('user_id')
                                ->from('irregular_user')
                                ->where('irregular_day_id', 'in', $shift_group_ids)
                                ->distinct(true)
                                ->execute();
        }elseif($shift_type == 1){
            $shift_group_ids = DB::select('id')->from('regular_day')->where('regular_id', $shift_id);
            $result = DB::select('user_id')
                                ->from('regular_user')
                                ->where('regular_day_id', 'in', $shift_group_ids)
                                ->distinct(true)
                                ->execute();
        }
        echo count($result);
    }

    /*
        引数：イレギュラーシフトグループの任意日ID、勤務形態(1=AM,2=PM,3=FULL)
        戻り値：イレギュラーシフトグループの任意日IDの勤務時間帯別スタッフ数を返す
        用途：任意のイレギュラー任意日の勤務時間別スタッフ数を返す
    */
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

    /*
        引数：イレギュラーシフトグループの任意日ID
        戻り値：イレギュラーシフトグループの任意日IDの全フタッフの稼働時間を返す
        用途：イレギュラーシフトグループの任意日IDの稼働数を合計して返す
        備考：最後のecho部分は対応要検討
    */
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

    /*
        引数：イレギュラー勤務形態
        戻り値：勤務形態に応じた勤務名を返す
        用途：イレギュラー勤務形態IDを取得して該当する勤務形態名を返す
    */
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

    /*
        引数：イレギュラー勤務形態
        戻り値：勤務形態に応じた勤務名をHTML形式で返す
        用途：イレギュラー勤務形態IDを取得して該当する勤務形態名をHTML形式で返す
    */
  public static function irregular_work_type_for_table($irregular_work_type){
    if ($irregular_work_type == 1) {
        echo "<td>午前勤務</td><td>10:00 ~ 13:00</td><td>3:00</td><td bgcolor = 'deepskyblue'></td><td></td>";
    }elseif ($irregular_work_type == 2) {
        echo "<td>午後勤務</td><td>13:00 ~ 17:00</td><td>4:00</td><td></td><td bgcolor = 'deepskyblue'></td>";
    }elseif ($irregular_work_type == 3) {
        echo "<td>フル勤務</td><td>10:00 ~ 17:00</td><td>6:00</td><td colspan='2' bgcolor = 'deepskyblue'></td>";
    }
  }

    /*
        引数：イレギュラーシフトグループの任意日ID、ユーザID
        戻り値：任意のイレギュラーシフトグループの任意のユーザの勤務日数を返す 
        用途：イレギュラーシフト編集時に該当イレギュラーシフトの任意ユーザの勤務日数を返す
        備考：未確定イレギュラーシフトにおけるカウント処理(request_shift_typeを確認する)
    */
  public static function request_work_day_count($irregular_id, $user_id){
    $irregular_day_id = DB::select('id')->from('irregular_day')->where('irregular_id', $irregular_id);
    $work_day = DB::select('*')->from('irregular_user')
        ->where('user_id', $user_id)
        ->and_where('request_shift_type', 'in', array(1,2,3))
        ->and_where('irregular_day_id', 'in', $irregular_day_id)
        ->execute();
    echo count($work_day);
  }

    /*
        引数：イレギュラーシフトグループの任意日ID、ユーザID
        戻り値：任意のイレギュラーシフトグループの任意のユーザの勤務日数を返す 
        用途：イレギュラーシフト確認時に該当イレギュラーシフトの任意ユーザの勤務日数を返す
        備考：確定イレギュラーシフトにおけるカウント処理(edited_shift_typeを確認する)
    */
  public static function deside_work_day_count($irregular_id, $user_id){
    $irregular_day_id = DB::select('id')->from('irregular_day')->where('irregular_id', $irregular_id);
    $work_day = DB::select('*')->from('irregular_user')
        ->where('user_id', $user_id)
        ->and_where('edited_shift_type', 'in', array(1,2,3))
        ->and_where('irregular_day_id', 'in', $irregular_day_id)
        ->execute();
    echo count($work_day);
  }

    /*
        引数：イレギュラーシフトグループの任意日ID、ユーザID
        戻り値：任意のイレギュラーシフトグループの任意のユーザの勤務時間を返す
        用途：イレギュラーシフト編集時に該当イレギュラーシフトの任意ユーザの勤務時間を返す
        備考：未確定イレギュラーシフトにおけるカウント処理(request_shift_typeを確認する)
    */
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

    /*
        引数：イレギュラーシフトグループの任意日ID、ユーザID
        戻り値：任意のイレギュラーシフトグループの任意のユーザの勤務時間を返す
        用途：イレギュラーシフト確認時に該当イレギュラーシフトの任意ユーザの勤務時間を返す
        備考：確定イレギュラーシフトにおけるカウント処理(edited_shift_typeを確認する)
    */
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

    /*
        引数：イレギュラーシフトグループの任意日ID
        戻り値：任意のイレギュラーシフトグループの申請されているユーザの合計勤務時間を返す
        用途：イレギュラーシフト編集時に該当イレギュラーシフトの合計勤務時間を返す
        備考：未確定イレギュラーシフトにおけるカウント処理(request_shift_typeを確認する)
    */
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

    /*
        引数：イレギュラーシフトグループの任意日ID
        戻り値：任意のイレギュラーシフトグループの申請されているユーザの合計勤務時間を返す
        用途：イレギュラーシフト確認時に該当イレギュラーシフトの合計勤務時間を返す
        備考：確定イレギュラーシフトにおけるカウント処理(edited_shift_typeを確認する)
    */
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

    /*
        引数：イレギュラーシフトグループの任意日ID、任意のユーザID
        戻り値：Bool
        用途：任意のイレギュラーシフトグループにおいて任意のユーザの編集がロックされているか確認する
        備考：返り値をもとにViewで別処理
    */
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

    /*
        引数：イレギュラーシフトグループの任意のユーザID
        戻り値：Bool
        用途：任意のイレギュラーシフトグループにおいて任意のユーザの編集がロックされているか確認する
        備考：返り値をもとにViewで別処理
    */
  public static function user_shift_lock($irregular_user_id){
    $irregular_user = Model_Irregular_User::find($irregular_user_id);
    if($irregular_user->condition == "1"){
        return "true";
    }else{
        return "false";
    }
  }

    /*
        引数：任意のシフトグループの状態
        戻り値：状態IDにおける状態名を返す
        用途：任意のシフトグループの状態をユーザに見せるように返す
    */
  public static function shift_condition($condition) {
    if ($condition == 1) {
        echo "申請受付中";
    }elseif ($condition == 2) {
        echo "再申請受付中";
    }elseif ($condition == 3) {
        echo "編成中";
    }elseif ($condition == 4) {
        echo "確定";
    }
  }

    /*
        引数：任意のシフトグループの状態
        戻り値：状態IDにおける状態におうじたCSS Classを返す
        用途：任意のシフトグループの状態をユーザに色で見せるように返す
    */
  public static function shift_condition_color($condition) {
    if ($condition == 1) {
        echo "";
    }elseif ($condition == 2) {
        echo "uk-alert-warning";
    }elseif ($condition == 3) {
        echo "uk-alert-danger";
    }elseif ($condition == 4) {
        echo "uk-alert-success";
    }
  }

    /*
        引数：イレギュラーシフトグループの任意日ID、任意のユーザID
        戻り値：HTMLテーブルの内容を返す
        用途：任意のイレギュラーシフトグループのユーザIDにおける勤務形態をHTML形式で返す
    */
  public static function shift_table($irregular_id, $user_id){
    $irregular_day_ids = DB::select('id')->from('irregular_day')->where('irregular_id', $irregular_id)->execute();
    foreach ($irregular_day_ids as $irregular_day_id) {
        $user_shift = DB::select('edited_shift_type')
                        ->from('irregular_user')
                        ->where('irregular_day_id', $irregular_day_id)
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

    /*
        引数：状態値(ロックorアンロック)、イレギュラーシフトグループの任意日ID、任意のユーザID
        戻り値：なし(query実行)
        用途：任意のイレギュラーシフトグループのユーザIDの編集可否を入れ替える
    */
  public static function lock_or_unlock($mode, $irregular_id, $user_id){
    $irregular_day_id = DB::select('id')->from('irregular_day')->where('irregular_id', $irregular_id);
    $update_query = DB::update('irregular_user')
        ->value('condition', $mode)
        ->where('user_id', $user_id)
        ->and_where('irregular_day_id', 'in', $irregular_day_id)
        ->execute();
  }


}
