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
		Package::load('pdf');
    $pdf = Pdf::factory('tcpdf')->init("L", "mm", "A4", true, "UTF-8");
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->AddPage();
    $pdf->SetFont('kozminproregular', '', 12);
    $pdf->writeHTML('<h2>火星書</h2>', false, false, false, false, 'C');
    $pdf->Output("test.pdf", "I");
	}

}
