<?php
function U2T($text) { return @iconv("UTF-8", "TIS-620//IGNORE", ($text)); }
function num_format($text) {
    if($text!=''){
        return number_format($text,2);
    }else{
        return '';
    }
}

	$filename = $_SERVER["DOCUMENT_ROOT"]."/fsccoop"."/assets/document/loan/loan_06.pdf" ;
	$pdf = new FPDI();

    $pageCount_1 = $pdf->setSourceFile($filename);
    $myImage = "assets/images/check-mark.png";
    $data = $loan_fscoop;

    $age                = $this->center_function->diff_birthday($data['birthday']);
    $monthtext          = $this->center_function->month_arr();
    $money_loan_amount_2text = $this->center_function->convert($data['loan_amount']);
    $money_salary_2text = $this->center_function->convert($data['loan_amount']);

    $date_to_text       = number_format(substr($data['approve_date'], 8, 2));
    $date_to_month      = number_format(substr($data['approve_date'], 5, 2));
    $date_to_year       = (substr($data['approve_date'], 0, 4))+543;
    $month2text         = $monthtext[$date_to_month];
    $full_date          = $date_to_text."  ".$month2text."  ".$date_to_year;
    $day_start_period   = number_format(substr($data['date_start_period'], 8, 2));
    $month_start_period = number_format(substr($data['date_start_period'], 5, 2));
    $year_start_period  = (substr($data['approve_date'], 0, 4))+543;
    $full_start_period  = $day_start_period."  ".$month_start_period."  ".$year_start_period;
    $fullname_th        = $data['prename_full'].$data['firstname_th']."  ".$data['lastname_th'];

	for ($pageNo = 1; $pageNo <= $pageCount_1; $pageNo++) {	
        $pdf->AddPage();
            $tplIdx = $pdf->importPage($pageNo);
            $pdf->useTemplate($tplIdx, 0, 0, 0, 0, true);
            $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
            $pdf->SetFont('THSarabunNew', '', 11 );
            
            // $pdf->SetTitle(U2T('คำขอกู้เงินเพื่อการศึกษา'));
            $border = 1;
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetAutoPageBreak(true,0);
            if($pageNo == '1'){
                $y_point = 24.3;
                    $pdf->SetXY( 115.8, $y_point );
                    $pdf->MultiCell(46, 5, U2T($data['coop_profile']['coop_name_th']), $border, "C"); //
                $y_point = 30;
                    $pdf->SetXY( 112, $y_point );
                    $pdf->MultiCell(8, 5, U2T($date_to_text), $border, "C"); //
                    $pdf->SetXY( 125.8, $y_point );
                    $pdf->MultiCell(17, 5, U2T($month_short_arr[$date_to_month]), $border, "C"); //
                    $pdf->SetXY( 149, $y_point );
                    $pdf->MultiCell(12, 5, U2T($date_to_year), $border, "C"); //
                $y_point = 50;
                    $pdf->SetXY( 44.5, $y_point );
                    $pdf->MultiCell(78, 5, U2T($fullname_th), $border, "C"); //
                    $pdf->SetXY( 146.5, $y_point );
                    $pdf->MultiCell(50, 5, U2T($data['member_id']), $border, "C"); //
                $y_point = 56;
                    $pdf->SetXY( 56, $y_point );
                    $pdf->MultiCell(42, 5, U2T($data['position_name']), $border, "C"); //
                    $pdf->SetXY( 105, $y_point );
                    $pdf->MultiCell(22, 5, U2T($data['mem_group_name_level']), $border, "C"); //
                    $pdf->SetXY( 140, $y_point );
                    $pdf->MultiCell(25, 5, U2T(($data['office_tel']=='')?'-':$data['office_tel']), $border, "C"); //
                    $pdf->SetXY( 172.5, $y_point );
                    $pdf->MultiCell(25.5, 5, U2T(($data['mobile']=='')?'-':$data['mobile']), $border, "C"); //
                $y_point = 61.7;
                    $pdf->SetXY( 33.5, $y_point );
                    $pdf->MultiCell(25.5, 5, U2T($data['salary']), $border, "C"); //
                    $pdf->SetXY( 98.5, $y_point );
                    $pdf->MultiCell(24, 5, U2T($data['salary']-$data['money_per_period']), $border, "C"); //
                    $pdf->SetXY( 134.5, $y_point );
                    $pdf->MultiCell(18, 5, U2T($month_arr[$date_to_month]), $border, "C"); //
                    $pdf->SetXY( 158.5, $y_point );
                    $pdf->MultiCell(18, 5, U2T($date_to_year), $border, "C"); //
                $y_point = 73.6;
                    $pdf->SetXY( 134.5, $y_point );
                    $pdf->MultiCell(24, 5, U2T($data['loan_amount']), $border, "C"); //
                    $pdf->SetXY( 166, $y_point );
                    $pdf->MultiCell(35, 5, U2T($money_loan_amount_2text), $border, "C"); //
                $y_point = 79.5;
                    $pdf->SetXY( 23.7, $y_point );
                    $pdf->MultiCell(82, 5, U2T($data['loan_reason']), $border, "C"); //
                // $y_point = 92;
                //     $pdf->Image($myImage, 55, $y_point, 3);
                // $y_point = 98;
                //     $pdf->Image($myImage, 55, $y_point, 3);
                // $y_point = 115;
                //     $pdf->Image($myImage, 55, $y_point, 3);
                // $y_point = 121;
                //     $pdf->Image($myImage, 55, $y_point, 3);
                // $y_point = 120.2;
                //     $pdf->SetXY(83.5, $y_point, 3);
                //     $pdf->MultiCell(27.2, 5, U2T('200,000'), $border, "C"); //
                //     $pdf->SetXY(137, $y_point, 3);
                //     $pdf->MultiCell(12, 5, U2T('25'), $border, "C"); //
                //     $pdf->SetXY(170, $y_point, 3);
                //     $pdf->MultiCell(26, 5, U2T('7,525'), $border, "C"); //
                $y_point = 125.8;
                    $pdf->SetXY(123, $y_point, 3);
                    $pdf->MultiCell(12, 5, U2T($data['period_amount']), $border, "C"); //
                    $pdf->SetXY(179.5, $y_point, 3);
                    $pdf->MultiCell(21.5, 5, U2T($data['month_start']), $border, "C"); //
                $y_point = 131.5;
                    $pdf->SetXY(15, $y_point, 3);
                    $pdf->MultiCell(15, 5, U2T($data['year_start']), $border, "C"); //
                    $pdf->SetXY(40, $y_point, 3);
                    $month_end = $data['period_amount']%12+$data['month_start'];
                    $year_end = 0;
                    if ($month_end > 12){
                        $month_end = $month_end - 12;
                        $year_end++;
                    }
                    $year_end += floor($data['period_amount'] / 12);
                    $year_end += $data['year_start'];
                    $pdf->MultiCell(26.2, 5, U2T($month_arr[$month_end]), $border, "C"); //
                    $pdf->SetXY(71, $y_point, 3);
                    $pdf->MultiCell(12, 5, U2T($year_end), $border, "C"); //
                    $pdf->SetXY(99, $y_point, 3);
                    $pdf->MultiCell(22, 5, U2T($data['money_per_period']), $border, "C"); //
                    $pdf->SetXY(186.5, $y_point, 3);
                    $pdf->MultiCell(16, 5, U2T($month_arr[$month_end]), $border, "C"); //
                $y_point = 137.3;
                    $pdf->SetXY(15, $y_point, 3);
                    $pdf->MultiCell(15, 5, U2T($year_end), $border, "C"); //
                    $pdf->SetXY(47, $y_point, 3);
                    $pdf->MultiCell(19.5, 5, U2T($data['money_per_period']), $border, "C"); //
            }else if($pageNo == '2'){
                $y_point = 24.5;
                    $pdf->SetXY( 95.8, $y_point );
                    $pdf->MultiCell(27.5, 5, U2T($data['loan_amount']), $border, "C"); //
                $y_point = 63.5;
                    $pdf->SetXY( 10, $y_point );
                    $pdf->MultiCell(35, 5, U2T($data['salary']), $border, "C"); //
                    $pdf->SetXY( 48, $y_point );
                    $pdf->MultiCell(35, 5, U2T(''), $border, "C"); //
                    $pdf->SetXY( 87, $y_point );
                    $pdf->MultiCell(37.5, 5, U2T(''), $border, "C"); //
                    $pdf->SetXY( 128, $y_point );
                    $pdf->MultiCell(32, 5, U2T(''), $border, "C"); //
                    $pdf->SetXY( 164, $y_point );
                    $pdf->MultiCell(34.5, 5, U2T(''), $border, "C"); //
                    
            }else if($pageNo == '3'){
                $y_point = 21.5;
                $pdf->SetXY( 151.5, $y_point );
                $pdf->MultiCell(45, 5, U2T($data['coop_profile']['coop_name_th']), $border, "C"); //ชื่อผู้กู้
                $y_point = 30.5;
                $pdf->SetXY( 148.5, $y_point );
                $pdf->MultiCell(40, 5, U2T($full_date), $border, "C"); //ชื่อผู้กู้
                $y_point = 48.5;
                $pdf->SetXY( 54.5, $y_point );
                $pdf->MultiCell(80, 5, U2T($fullname_th), $border, "C"); //ชื่อผู้กู้
                $y_point = 57.5;
                $pdf->SetXY( 35.5, $y_point );
                $pdf->MultiCell(30, 5, U2T($full_date), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 84.5, $y_point );
                $pdf->MultiCell(45, 5, U2T($data['mobile']), $border, "C"); //ชื่อผู้กู้
                $y_point = 73.5;
                $pdf->SetXY( 65.5, $y_point );
                $pdf->MultiCell(50, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 143.5, $y_point );
                $pdf->MultiCell(12, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 183.5, $y_point );
                $pdf->MultiCell(10, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $y_point = 81.5;
                $pdf->SetXY( 65.5, $y_point );
                $pdf->MultiCell(50, 5, U2T($data['loan_amount']), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 143.5, $y_point );
                $pdf->MultiCell(12, 5, U2T($data['money_per_period']), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 183.5, $y_point );
                $pdf->MultiCell(10, 5, U2T($data['period_amount']), $border, "C"); //ชื่อผู้กู้
                $y_point = 89;
                $pdf->SetXY( 65.5, $y_point );
                $pdf->MultiCell(50, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 143.5, $y_point );
                $pdf->MultiCell(12, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 183.5, $y_point );
                $pdf->MultiCell(10, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $y_point = 105;
                $pdf->SetXY( 47.5, $y_point );
                $pdf->MultiCell(32, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 98.5, $y_point );
                $pdf->MultiCell(28, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 140.5, $y_point );
                $pdf->MultiCell(34, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $y_point = 112.5;
                $pdf->SetXY( 66.5, $y_point );
                $pdf->MultiCell(34, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 145.5, $y_point );
                $pdf->MultiCell(34, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $y_point = 120.5;
                $pdf->SetXY( 133.5, $y_point );
                $pdf->MultiCell(38, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $y_point = 152;
                $pdf->SetXY( 22, $y_point );
                $pdf->MultiCell(30, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $pdf->SetXY( 130, $y_point );
                $pdf->MultiCell(55, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $y_point = 183;
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(50, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $y_point = 191;
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(48, 5, U2T(''), $border, "C"); //ชื่อผู้กู้
                $y_point = 205.2;
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(48, 5, U2T(''), $border, "C"); //ชื่อผู้กู้

            }
        }
	//exit;
	$pdf->Output();