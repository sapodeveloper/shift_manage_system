<?php
class Helper_Shift {
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
}