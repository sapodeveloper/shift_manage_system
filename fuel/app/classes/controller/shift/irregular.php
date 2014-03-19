<?php

class Controller_Shift_Irregular extends Controller
{

	public function action_detail($id = null)
	{
		// idの指定が無い場合、シフト確認画面にリダイレクトさせる
		if($id == null){
			Response::redirect('shift/check');
		}
		// 指定されたidのイレギュラーシフトを取得する	
		$data['irregular_shift'] = Model_Irregular::find($id);
		$data['irregular_shift_days'] = Model_Irregular_Day::find('all', array('where' => array('irregular_id' => $id)));
		$view = View::forge('layout/application');
		$view->contents = View::forge('shift/irregular/detail', $data);
		return $view;
	}

	public function action_shift_detail($id = null)
	{
		$data["irregular_shift_users"] = DB::query('SELECT * from irregular_user 
			inner join users on users.id = irregular_user.user_id
			where irregular_day_id = '.$id.'
			and edited_shift_type in (1,2,3)
			order by users.year, users.username')->as_object()->execute()->as_array();
		$view = View::forge('shift/irregular/shift_detail', $data);
		return $view;
	}

	public function action_output_pdf($id = null){
		// idの指定が無い場合、シフト確認画面にリダイレクトさせる
		if($id == null){
			Response::redirect('shift/check');
		}
		// 指定されたidのイレギュラーシフトを取得する	
		$irregular_shift = Model_Irregular::find($id);
		$irregular_shift_days = Model_Irregular_Day::find('all', array('where' => array('irregular_id' => $id), 'order_by' => array('irregular_day_date' => 'ASC')));
		$day_id = 1;
		foreach ($irregular_shift_days as $irregular_shift_day) {
			$irregular_shift_users{$day_id} = DB::query('SELECT * from irregular_user 
			inner join users on users.id = irregular_user.user_id
			where irregular_day_id = '.$irregular_shift_day->id.'
			and edited_shift_type in (1,2,3)
			order by users.year, users.username')->as_object()->execute()->as_array();
			//Model_Irregular_User::find('all', array('where' => array(array('irregular_day_id' => $irregular_shift_day->id), array('edited_shift_type', 'in', array(1,2,3)))));
			$day_id++;
		}
		$query = DB::query('SELECT distinct irregular_user.user_id, users.full_name 
			from irregular_user 
			inner join users on users.id = irregular_user.user_id
			where irregular_day_id in (SELECT id FROM irregular_day WHERE irregular_id = '.$id.')
			and edited_shift_type in (1,2,3)
			order by users.year, users.username');
		$irregular_users = $query->as_object()->execute()->as_array();
		$css = '<style> td.bg { background-color: #00bfff; } </style>';
		$html = '<meta charset="utf-8"><br><div><center><font size="15">';
		$html .= $irregular_shift->irregular_name;
		$html .= '</font></center></div><br>';
		$html .= '<table><tr><td width="580">';
			$day_id = 1;
			foreach ($irregular_shift_days as $irregular_shift_day){
				if($irregular_shift_users{$day_id}){
					$html .= '<i style="center">';
					$html .= date( 'Y年m月d日', strtotime($irregular_shift_day->irregular_day_date));
					$html .= '</i><br><font size="11"><table border="1" ><tr><td width="15%">スタッフ名</td><td width="15%">勤務時間</td><td width="15%">時間</td><td width="25%">午前勤務</td><td width="25%">午後勤務</td></tr>';
					// 該当日の合計勤務時間
					$total_work_time = 0;
					// 該当日の午前勤務者数
					$morining_work_staff_num = 0;
					// 該当日の午後勤務者数
					$afternoon_work_staff_num = 0;
					foreach ($irregular_shift_users{$day_id} as $irregular_shift_user){
						$html .= '<tr><td>';
						$html .= $irregular_shift_user->full_name;
						$html .= '</td>';
						if($irregular_shift_user->edited_shift_type == 1){
							$html .= "<td>10:00 - 13:00</td><td>3:00</td><td class=\"bg\"></td><td></td>";
							$total_work_time += 3;
							$morining_work_staff_num++;
						}elseif($irregular_shift_user->edited_shift_type == 2){
							$html .= "<td>13:00 - 17:00</td><td>4:00</td><td></td><td class=\"bg\"></td>";
							$total_work_time += 4;
							$afternoon_work_staff_num++;
						}elseif($irregular_shift_user->edited_shift_type == 3){
							$html .= "<td>10:00 - 17:00</td><td>6:00</td><td class=\"bg\"></td><td class=\"bg\"></td>";
							$total_work_time += 6;
							$morining_work_staff_num++;
							$afternoon_work_staff_num++;
						}
						$html .= '</tr>';
					}
					$html .= '<tr><td>';
					$html .= count($irregular_shift_users{$day_id});
					$html .= '名</td><td>合計勤務時間</td><td>';
					$html .= $total_work_time;
					$html .= '時間</td><td>';
					$html .= $morining_work_staff_num;
					$html .= '</td><td>';
					$html .= $afternoon_work_staff_num;
					$html .= '</td></tr></table></font><br>';
				}
				$day_id++;
			}
		$html .= '</td><td width="200">';
		$html .= '<i>トータル勤務日数・時間</i><br>';
		$html .= '<table border="1" ><tr><td>スタッフ名</td><td>勤務日数</td><td>勤務時間</td></tr>';
		foreach ($irregular_users as $irregular_user){
			$dwdc = 0;
			$html .= '<tr><td>';
			$html .= $irregular_user->full_name;
			$html .= '</td><td>';
			$html .= Helper_Shift_Irregular::deside_work_day_count_pdf($irregular_shift->id, $irregular_user->user_id);
			$html .= '日';
			$html .= '</td><td>';
			$html .= Helper_Shift_Irregular::deside_work_time_count_pdf($irregular_shift->id, $irregular_user->user_id);
			$html .= ':00';
			$html .= '</td></tr>';
		}
		$html .= '<tr><td>合計</td><td>-----</td><td>';
		$html .= Helper_Shift_Irregular::deside_irregular_group_total_work_time_pdf($irregular_shift->id);
		$html .= ':00</td></tr></table>';
		$html .= '</td></tr></table>';
		
		//return $css . $html;
		Package::load('pdf');
	    $pdf = Pdf::factory('tcpdf')->init("P", "mm", "A3", true, "UTF-8");
	    $pdf->setPrintHeader(false);
	    $pdf->setPrintFooter(false);
	    $pdf->AddPage();
	    $pdf->SetFont('kozminproregular', '', 12);
	    $pdf->writeHTML($css.$html, false, false, false, false, 'C');
	    ob_end_clean();
	    $pdf->Output("Irregular_Shift_No".$irregular_shift->id.".pdf", "I");
	}

}
