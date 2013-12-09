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
		$data['irregular_shift_users'] = Model_Irregular_User::find('all', array('where' => array('irregular_day_id' => 1)));
		$irregular_shift_days = Model_Irregular_Day::find('all', array('where' => array('irregular_id' => $id)));
		foreach ($irregular_shift_days as $irregular_shift_day) {
			$day_id = $irregular_shift_day->id;
			$data["irregular_shift_users$day_id"] = Model_Irregular_User::find('all', array('where' => array('irregular_day_id' => $day_id)));
		}
		$view = View::forge('layout/application');
		$view->header = View::forge('layout/header');
		$view->left_side_menu = View::forge('layout/left_side_menu');
		$view->contents = View::forge('shift/irregular/detail', $data);
		$view->footer = View::forge('layout/footer');
		return $view;
	}

	public function action_output_pdf($id = null){
		// idの指定が無い場合、シフト確認画面にリダイレクトさせる
		if($id == null){
			Response::redirect('shift/check');
		}
		// 指定されたidのイレギュラーシフトを取得する	
		$irregular_shift = Model_Irregular::find($id);
		$irregular_shift_days = Model_Irregular_Day::find('all', array('where' => array('irregular_id' => $id)));
		$irregular_shift_users = Model_Irregular_User::find('all', array('where' => array('irregular_day_id' => 1)));
		foreach ($irregular_shift_days as $irregular_shift_day) {
			$day_id = $irregular_shift_day->id;
			$irregular_shift_users{$day_id} = Model_Irregular_User::find('all', array('where' => array('irregular_day_id' => $day_id)));
		}
		$css = '<style> td.bg { background-color: #00bfff; } </style>';
		$html = '<meta charset="utf-8"><h3>';
		$html .= $irregular_shift->irregular_name;
		$html .= '</h3>';
		$day_id = 1;
		foreach ($irregular_shift_days as $irregular_shift_day){
			if($irregular_shift_users{$day_id}){
				$html .= '<h4>';
				$html .= date( 'Y年m月d日', strtotime($irregular_shift_day->irregular_day_date));
				$html .= '</h4><table border="1"><tr><td>スタッフ名</td><td>勤務形態</td><td>勤務時間</td><td>時間</td><td>午前勤務</td><td>午後勤務</td></tr>';
				// 該当日の合計勤務時間
				$total_work_time = 0;
				// 該当日の午前勤務者数
				$morining_work_staff_num = 0;
				// 該当日の午後勤務者数
				$afternoon_work_staff_num = 0;
				foreach ($irregular_shift_users{$day_id} as $irregular_shift_user){
					$html .= '<tr><td>';
					$html .= $irregular_shift_user->users->full_name;
					$html .= '</td>';
					if($irregular_shift_user->edited_shift_type == 1){
						$html .= '<td>午前勤務</td><td>10:00 ~ 13:00</td><td>3:00</td><td class=bg></td><td></td>';
						$total_work_time += 3;
						$morining_work_staff_num++;
					}elseif($irregular_shift_user->edited_shift_type == 2){
						$html .= '<td>午後勤務</td><td>13:00 ~ 17:00</td><td>4:00</td><td></td><td class=bg></td>';
						$total_work_time += 4;
						$afternoon_work_staff_num++;
					}elseif($irregular_shift_user->edited_shift_type == 3){
						$html .= '<td>フル勤務</td><td>10:00 ~ 17:00</td><td>6:00</td><td class=bg></td><td class=bg></td>';
						$total_work_time += 6;
						$morining_work_staff_num++;
						$afternoon_work_staff_num++;
					}
					$html .= '</tr>';
				}
				$html .= '<tr><td>';
				$html .= count($irregular_shift_users{$day_id});
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
    $pdf = Pdf::factory('tcpdf')->init("P", "mm", "A4", true, "UTF-8");
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->AddPage();
    $pdf->SetFont('kozminproregular', '', 12);
    $pdf->writeHTML($css.$html, false, false, false, false, 'C');
    $pdf->Output("Irregular_Shift_No".$irregular_shift->id.".pdf", "I");
	}

}
