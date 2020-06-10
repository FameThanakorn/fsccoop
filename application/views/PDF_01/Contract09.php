<?php
function U2T($text) { return @iconv("UTF-8", "TIS-620//IGNORE", ($text)); }
function num_format($text) {
    if($text!=''){
        return number_format($text,2);
    }else{
        return '';
    }
}

    $filename = $_SERVER["DOCUMENT_ROOT"]."/fsccoop"."/assets/document/loan/loan_09.pdf" ;
	$pdf = new FPDI();

    $pageCount_1 = $pdf->setSourceFile($filename);
    $myImage = "assets/images/check-mark.png";

    $data = $loan_fscoop;
    $name = $data['firstname_th'].' '.$data['lastname_th'];
    $full_name = $data['prename_full'].$data['firstname_th'].' '.$data['lastname_th'];
    $c_address = $data['c_address_no'].''.$data['address_soi'].' '.$data['c_address_moo'].' '.$data['address_village'];

	for ($pageNo = 1; $pageNo <= $pageCount_1; $pageNo++) {	
        $pdf->AddPage();
        $tplIdx = $pdf->importPage($pageNo);
            $pdf->useTemplate($tplIdx, 0, 0, 0, 0, true);

            
            $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
            $pdf->SetFont('THSarabunNew', '', 6 );
            $border = 0;
            for ($i = 10; $i<=270;$i+= 5){
                for ($j = 10; $j<200;$j+= 10){
                    $pdf->SetXY( $j, $i );
                    $pdf->MultiCell(7, 5, U2T($j.','.$i), $border, "L");//หนังสือกู้ที่
                }

            }
            
            $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
            $pdf->SetFont('THSarabunNew', '', 14 );
            $border = 1;
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetAutoPageBreak(true,0);
            $day = date('d');
            $mount = date('m');
            $int_mount = (int)$mount;
            $date = date('d/m/');
            $year = date('Y')+543;
            $date = $date.$year;
            if($pageNo == '1'){
                $y = 8.7;

                $y_point = 16.2;
                $pdf->SetXY( 30, $y_point );
                $pdf->MultiCell(70, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 127, $y_point );
                $pdf->MultiCell(17, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 163, $y_point );
                $pdf->MultiCell(40, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 50, $y_point );
                $pdf->MultiCell(53, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 127, $y_point );
                $pdf->MultiCell(17, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 163, $y_point );
                $pdf->MultiCell(40, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 50, $y_point );
                $pdf->MultiCell(53, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 127, $y_point );
                $pdf->MultiCell(17, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 163, $y_point );
                $pdf->MultiCell(40, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 50, $y_point );
                $pdf->MultiCell(53, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 127, $y_point );
                $pdf->MultiCell(17, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 163, $y_point );
                $pdf->MultiCell(40, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่

                $y = 7.63;
                $y_point = 257.8;
                $pdf->SetXY( 80 , $y_point );
                $pdf->MultiCell(65, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 161 , $y_point );
                $pdf->MultiCell(10, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 172 , $y_point );
                $pdf->MultiCell(10, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 80 , $y_point );
                $pdf->MultiCell(65, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 161 , $y_point );
                $pdf->MultiCell(10, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 172 , $y_point );
                $pdf->MultiCell(10, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 80 , $y_point );
                $pdf->MultiCell(65, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 161 , $y_point );
                $pdf->MultiCell(10, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 172 , $y_point );
                $pdf->MultiCell(10, 5, U2T('t1'), $border, "C");//หนังสือกู้ที่


            }else if($pageNo == '2'){

            }else if($pageNo == '3'){
                $y = 7.67;
                $y_point = 34;
                $pdf->SetXY( 32.5, $y_point );
                $pdf->MultiCell(14  , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 32.5, $y_point );
                $pdf->MultiCell(14  , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 166.5, $y_point-1.5 );
                $pdf->MultiCell(14  , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 181.5, $y_point-1.5 );
                $pdf->MultiCell(14  , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่

                $y_point += $y;
                $pdf->SetXY( 32.5, $y_point );
                $pdf->MultiCell(9  , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 42.5, $y_point );
                $pdf->MultiCell(9  , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 52.5, $y_point );
                $pdf->MultiCell(9  , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 160, $y_point-1.5 );
                $pdf->MultiCell(9  , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 170, $y_point-1.5 );
                $pdf->MultiCell(9  , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 181.5, $y_point-1.5 );
                $pdf->MultiCell(9  , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่

                $y_point = 58;
                $pdf->SetXY( 133, $y_point );
                $pdf->MultiCell(60 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 133, $y_point );
                $pdf->MultiCell(60 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่

                $y_point = 85;
                $pdf->SetXY( 45, $y_point );
                $pdf->MultiCell(85 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 165, $y_point );
                $pdf->MultiCell(30 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 58, $y_point );
                $pdf->MultiCell(40 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 79, $y_point );
                $pdf->MultiCell(30 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 120, $y_point );
                $pdf->MultiCell(71 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(71 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 119, $y_point );
                $pdf->MultiCell(71 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 105, $y_point );
                $pdf->MultiCell(35 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 154, $y_point );
                $pdf->MultiCell(40 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 56, $y_point );
                $pdf->MultiCell(25 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 90, $y_point );
                $pdf->MultiCell(30 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 132, $y_point );
                $pdf->MultiCell(25 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 168, $y_point );
                $pdf->MultiCell(27 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 32.5   , $y_point );
                $pdf->MultiCell(39 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 94   , $y_point );
                $pdf->MultiCell(30 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 140, $y_point );
                $pdf->MultiCell(55 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่

                $y_point = 207.3;
                if ($data['pay_type']==1){
                    $pdf->Image($myImage, 42.5, $y_point+1.3, 3);
                    $pdf->SetXY( 86, $y_point );
                    $pdf->MultiCell(36, 5, U2T($data['money_per_period']), $border, "C"); //ต้นเงินเท่ากันทุกงวดๆ ละ.
                    $pdf->SetXY( 170, $y_point );
                    $pdf->MultiCell(18, 5, U2T($data['period_amount']), $border, "C"); //จำนวนงวด
                }else if($data['pay_type']==2) {
                    $y_point += $y;
                    $pdf->Image($myImage, 42.5, $y_point+1.3, 3);
                    $pdf->SetXY( 105, $y_point );
                    $pdf->MultiCell(36, 5, U2T($data['money_per_period']), $border, "C"); //ต้นเงินและดอกเบ้ียเท่ากันทุกงวดๆละ
                    $pdf->SetXY( 170, $y_point );
                    $pdf->MultiCell(18, 5, U2T($data['period_amount']), $border, "C"); //จำนวนงวด
                }
                $y_point = 238;
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point = 276.5;
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่

            }else if($pageNo == '4'){

            }else if($pageNo == '5'){
                $y = 7.65;
                $y_point = 38;
                $pdf->SetXY( 161, $y_point );
                $pdf->MultiCell(15 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 178, $y_point );
                $pdf->MultiCell(15 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่

                $y_point += $y;
                $pdf->SetXY( 161, $y_point );
                $pdf->MultiCell(30 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่

                $y_point += $y;
                $pdf->SetXY( 45, $y_point );
                $pdf->MultiCell(150 , 5, U2T('t1'), $border, "L");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 45, $y_point );
                $pdf->MultiCell(150 , 5, U2T('t1'), $border, "L");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 157, $y_point );
                $pdf->MultiCell(35 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 85, $y_point );
                $pdf->MultiCell(35 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 46, $y_point );
                $pdf->MultiCell(35 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 92, $y_point );
                $pdf->MultiCell(40 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 170, $y_point );
                $pdf->MultiCell(25 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่

                $y_point += $y;
                $pdf->SetXY( 29, $y_point );
                $pdf->MultiCell(30 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 70, $y_point );
                $pdf->MultiCell(33 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 115, $y_point );
                $pdf->MultiCell(33 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 161, $y_point );
                $pdf->MultiCell(33 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่

                $y_point += $y;
                $pdf->SetXY( 35, $y_point );
                $pdf->MultiCell(55 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y+$y;
                $pdf->SetXY( 102, $y_point );
                $pdf->MultiCell(23 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(55 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่

                $y_point += $y+$y+$y;
                $pdf->Image($myImage, 42.5, $y_point+1.3, 3);
                $pdf->SetXY( 105, $y_point );
                $pdf->MultiCell(60 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->Image($myImage, 42.5, $y_point+1.3, 3);
                $pdf->SetXY( 123, $y_point );
                $pdf->MultiCell(60 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 48, $y_point );
                $pdf->MultiCell(28 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $pdf->SetXY( 155, $y_point );
                $pdf->MultiCell(30 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
                $y_point += $y;
                $pdf->SetXY( 60, $y_point );
                $pdf->MultiCell(30 , 5, U2T('t1'), $border, "C");//หนังสือกู้ที่
   
            }else if($pageNo == '6'){
                $y = 7.63;
                $y_point = 43;
                $pdf->SetXY( 119, $y_point );
                $pdf->MultiCell(30 , 5, U2T('t1'), $border, "C");//สหกรณ์เลขที่
                $pdf->SetXY( 162, $y_point );
                $pdf->MultiCell(25 , 5, U2T('t1'), $border, "C");//หุ้น
                $y_point += $y;
                $pdf->SetXY( 32, $y_point );
                $pdf->MultiCell(40 , 5, U2T('t1'), $border, "C");//จำนวนเงิน
                $y_point = 100.6;
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//พยาน
                $y_point += $y;
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//พยาน
                $y_point += $y;
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//พยาน
                $y_point += $y;
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//พยาน

                $y_point = 162.8;
                $pdf->SetXY( 148, $y_point );
                $pdf->MultiCell(40 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 148, $y_point );
                $pdf->MultiCell(40 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 45, $y_point );
                $pdf->MultiCell(55 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $pdf->SetXY( 128, $y_point );
                $pdf->MultiCell(55 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 54, $y_point );
                $pdf->MultiCell(52 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y+$y;
                $pdf->SetXY( 110, $y_point );
                $pdf->MultiCell(43 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 110, $y_point );
                $pdf->MultiCell(43 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 110, $y_point );
                $pdf->MultiCell(43 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 110, $y_point );
                $pdf->MultiCell(43 , 5, U2T('t1'), $border, "C");//ผู้กู้

                $y_point = 235.5;
                $pdf->SetXY( 32, $y_point );
                $pdf->MultiCell(85 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $pdf->SetXY( 150, $y_point );
                $pdf->MultiCell(35 , 5, U2T('t1'), $border, "C");//ผู้กู้

                $y_point += $y;
                $pdf->SetXY( 23, $y_point );
                $pdf->MultiCell(75 , 5, U2T('t1'), $border, "C");//ผู้กู้

                $y_point = 255;
                $pdf->SetXY( 92, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point += $y;
                $pdf->SetXY( 92, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point = 274.3;
                $pdf->SetXY( 92, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//ผู้กู้
                $y_point = 286;
                $pdf->SetXY( 92, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//ผู้กู้
            }else if($pageNo == '7'){
                $y_point = 40;
                $pdf->SetXY( 140, $y_point );
                $pdf->MultiCell(50 , 5, U2T('t1'), $border, "C");//ผู้กู้
            }
        }
	$pdf->Output();