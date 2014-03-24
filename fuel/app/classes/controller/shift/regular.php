<?php

class Controller_Shift_Regular extends Controller
{

	public function action_detail($id = null)
	{
		// idの指定が無い場合、シフト確認画面にリダイレクトさせる
		if($id == null){
			Response::redirect('shift/check');
		}
		// 指定されたidのレギュラーシフトを取得する	
		$data['regular_shift'] = Model_Regular::find($id);
		$data['regular_shift_days'] = Model_Regular_Day::find('all', array('where' => array('regular_id' => $id)));
		$view = View::forge('layout/application');
		$view->contents = View::forge('shift/regular/detail', $data);
		return $view;
	}

	public function action_shift_detail($id = null)
	{
		$data["regular_shift_users"] = Model_Regular_User::find('all', array('where' => array(array('regular_day_id' => $id), array('edited_start', '!=', 6), array('edited_end', '!=', 6))));
		$view = View::forge('shift/regular/shift_detail', $data);
		return $view;
	}

	public function action_output_pdf($id = null){
		// idの指定が無い場合、シフト確認画面にリダイレクトさせる
		if($id == null){
			Response::redirect('shift/check');
		}
		// 指定されたidのレギュラーシフトを取得する	
		$regular_shift = Model_Regular::find($id);
		$regular_shift_days = Model_Regular_Day::find('all', array('where' => array('regular_id' => $id)));
		$regular_shift_users = Model_Regular_User::find('all', array('where' => array('regular_day_id' => 1)));
		foreach ($regular_shift_days as $regular_shift_day) {
			if($regular_shift_day->id > 5){
				$day_id = ($regular_shift_day->id)%5+1;
			}else{
				$day_id = $regular_shift_day->id;
			}
			$regular_shift_users{$day_id} = Model_Regular_User::find('all', array('where' => array('regular_day_id' => $regular_shift_day->id)));
		}
		$css = '<style> td.bg { background-color: #00bfff; } </style>';
		$html = '<meta charset="utf-8"><h3>';
		$html .= $regular_shift->regular_name;
		$html .= '</h3>';
		$day_id = 1;
		foreach ($regular_shift_days as $regular_shift_day){
			if($regular_shift_users{$day_id}){
				$html .= '<h4>';
				$html .= $regular_shift_day->regular_day_name;
				$html .= '</h4><table border="1"><tr><td>スタッフ名</td><td>勤務形態</td><td>勤務時間</td><td>時間</td><td>午前勤務</td><td>午後勤務</td></tr>';
				// 該当日の合計勤務時間
				$total_work_time = 0;
				// 該当日の午前勤務者数
				$morining_work_staff_num = 0;
				// 該当日の午後勤務者数
				$afternoon_work_staff_num = 0;
				foreach ($regular_shift_users{$day_id} as $regular_shift_user){
					$html .= '<tr><td>';
					$html .= $regular_shift_user->users->full_name;
					$html .= '</td>';
					if($regular_shift_user->edited_shift_type == 1){
						$html .= "<td>午前勤務</td><td>10:00 ~ 13:00</td><td>3:00</td><td class=\"bg\"></td><td></td>";
						$total_work_time += 3;
						$morining_work_staff_num++;
					}elseif($regular_shift_user->edited_shift_type == 2){
						$html .= "<td>午後勤務</td><td>13:00 ~ 17:00</td><td>4:00</td><td></td><td class=\"bg\"></td>";
						$total_work_time += 4;
						$afternoon_work_staff_num++;
					}elseif($regular_shift_user->edited_shift_type == 3){
						$html .= "<td>フル勤務</td><td>10:00 ~ 17:00</td><td>6:00</td><td class=\"bg\"></td><td class=\"bg\"></td>";
						$total_work_time += 6;
						$morining_work_staff_num++;
						$afternoon_work_staff_num++;
					}
					$html .= '</tr>';
				}
				$html .= '<tr><td>';
				$html .= count($regular_shift_users{$day_id});
				$html .= '名</td><td>合計勤務時間</td><td></td><td>';
				$html .= $total_work_time;
				$html .= '時間</td><td>';
				$html .= $morining_work_staff_num;
				$html .= '</td><td>';
				$html .= $afternoon_work_staff_num;
				$html .= '</td></tr></table>';
			}
			$day_id++;
		}
		//return $css . $html;
		Package::load('pdf');
    $pdf = Pdf::factory('tcpdf')->init("P", "mm", "A3", true, "UTF-8");
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->AddPage();
    $pdf->SetFont('kozminproregular', '', 12);
    $pdf->writeHTML($css.$html, false, false, false, false, 'C');
    $pdf->Output("Regular_Shift_No".$regular_shift->id.".pdf", "I");
	}

}
