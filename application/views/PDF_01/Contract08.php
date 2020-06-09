<?php
function U2T($text) { return @iconv("UTF-8", "TIS-620//IGNORE", ($text)); }
function num_format($text) {
    if($text!=''){
        return number_format($text,2);
    }else{
        return '';
    }
}

    $filename = $_SERVER["DOCUMENT_ROOT"]."/fsccoop"."/assets/document/loan/loan_08.pdf" ;
	$pdf = new FPDI();

    $pageCount_1 = $pdf->setSourceFile($filename);
    $myImage = "assets/images/check-mark.png";
    $data = $loan_fscoop;
    // print_r($data); 

    $full_name = $data['prename_full'].$data['firstname_th'].' '.$data['lastname_th'];
    $c_address = $data['c_address_no'].''.$data['address_soi'].' '.$data['c_address_moo'].' '.$data['address_village'];

	for ($pageNo = 1; $pageNo <= $pageCount_1; $pageNo++) {	
        $pdf->AddPage();
        $tplIdx = $pdf->importPage($pageNo);
            $pdf->useTemplate($tplIdx, 0, 0, 0, 0, true);

            //
            $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
            $pdf->SetFont('THSarabunNew', '', 6 );
            $border = 0;
            for ($i = 10; $i<=280;$i+= 20){
                for ($j = 10; $j<200;$j+= 10){
                    $pdf->SetXY( $j, $i );
                    $pdf->MultiCell(7, 5, U2T($i.','.$j), $border, "L");//หนังสือกู้ที่
                }

            }
            //
            $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
            $pdf->SetFont('THSarabunNew', '', 14 );
            $border = 1;
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetAutoPageBreak(true,0);
            $date = date('d/m/');
            $year = date('Y')+543;
            $date = $date.$year;
            if($pageNo == '1'){


                $y_point = 30;
                $pdf->SetXY( 165, $y_point );
                $pdf->MultiCell(25, 5, U2T($data['petition_number']), $border, "L");//หนังสือกู้ที่
                $y_point = 37.63;
                $pdf->SetXY( 165, $y_point );
                $pdf->MultiCell(25, 5, U2T($date), $border, "L");//วันที่
                $y_point = 50;
                $pdf->SetXY( 133, $y_point );
                $pdf->MultiCell(62.5, 5, U2T('สหกรณ์ออมทรัพย์โรงบาลตำรวจ'), $border, "L");//เขียนที่
                $y_point = 58;
                $pdf->SetXY( 133, $y_point );
                $pdf->MultiCell(62.5, 5, U2T($date), $border, "L"); //วันที่

                $y_point = 78.6; 
                $pdf->SetXY( 45, $y_point );
                $pdf->MultiCell(62.5, 5, U2T($full_name), $border, "L"); //ชื่อ
                $pdf->SetXY( 163, $y_point );
                $pdf->MultiCell(30, 5, U2T($data['member_id']), $border, "L"); //สมาชิกเลขทะเบียนที่
                $y = 7.63;
                $y_point += $y;
                $pdf->SetXY( 60, $y_point );
                $pdf->MultiCell(40, 5, U2T($data['salary']), $border, "L"); //เงินเดือน
                $y_point += $y;
                $pdf->SetXY( 78, $y_point );
                // print_r ($data['loan_amount']); exit;
                $pdf->MultiCell(30, 5, U2T($data['loan_amount']), $border, "L"); //จำนวนเงินที่ขอกู้
                $pdf->SetXY( 125, $y_point );
                $number_text = $this->center_function->convert($data['loan_amount']);
                $pdf->MultiCell(60, 5, U2T($number_text), $border, "L"); // ข้อความจำนวนเงินมี่ขอกู้ 

                $y_point += $y;
                $pdf->SetXY( 125, $y_point );
                $pdf->MultiCell(65, 5, U2T(($data['loan_reason']=='') ? '-' : $data['loan_reason']), $border, "L"); //เหตุผล
                $y_point += $y;
                $pdf->SetXY( 118, $y_point );
                $pdf->MultiCell(65, 5, U2T('text06'), $border, "L"); //ทางานในตำแหน่ง
                $y_point += $y;
                $pdf->SetXY( 105, $y_point );
                $pdf->MultiCell(35, 5, U2T(($data['id_card']=='') ? '-' : $data['id_card']), $border, "L"); //ประจำตํวประชาชน
                $pdf->SetXY( 152, $y_point );
                $pdf->MultiCell(50, 5, U2T(($data['mem_group_name']=='') ? '-' : $data['mem_group_name']), $border, "L"); //สังกัด
                $y_point += $y;
                $pdf->SetXY( 55, $y_point );
                $pdf->MultiCell(25, 5, U2T(($data['c_address']=='') ? '-' : $data['c_address']), $border, "C"); //บ้านเลขที่
                $pdf->SetXY( 90, $y_point );
                $pdf->MultiCell(35, 5, U2T(($data['address_road']=='') ? '-' : $data['address_road']), $border, "C"); //ถนน
                $pdf->SetXY( 140, $y_point );
                $pdf->MultiCell(50, 5, U2T(($data['district_id']=='') ? '-' : $data['district_id']), $border, "C"); //ตำบล

                $y_point += $y;
                $pdf->SetXY( 32, $y_point );
                $pdf->MultiCell(40, 5, U2T(($data['amphur_id']=='') ? '-' : $data['amphur_id']), $border, "C"); //อำเภอ
                $pdf->SetXY( 90, $y_point );
                $pdf->MultiCell(40, 5, U2T(($data['province_id']=='') ? '-' : $data['province_id']), $border, "C"); //จังหวัด
                $pdf->SetXY( 150, $y_point );
                $pdf->MultiCell(40, 5, U2T(($data['mobile']=='') ? '-' : $data['mobile']), $border, "C"); //โทรศัพท์

                $y_point = 198.5;
                $pdf->Image($myImage, 42.5, $y_point+1.3, 3);
                $pdf->SetXY( 86, $y_point );
                $pdf->MultiCell(36, 5, U2T('text15'), $border, "L"); //ต้นเงินเท่ากันทุกงวดๆ ละ.
                $pdf->SetXY( 164, $y_point );
                $pdf->MultiCell(18, 5, U2T('text16'), $border, "L"); //จำนวนงวด
                $y_point += $y;
                $pdf->Image($myImage, 42.5, $y_point+1.3, 3);
                $pdf->SetXY( 105, $y_point );
                $pdf->MultiCell(36, 5, U2T('text17'), $border, "L"); //ต้นเงินและดอกเบ้ียเท่ากันทุกงวดๆละ
                $pdf->SetXY( 164, $y_point );
                $pdf->MultiCell(18, 5, U2T('text18'), $border, "L"); //จำนวนงวด

                $y_point = 233;
                $pdf->SetXY( 133, $y_point );
                $pdf->MultiCell(50, 5, U2T($full_name), $border, "L"); //ลงชื่อ
                $y_point += $y;
                $pdf->SetXY( 133, $y_point );
                $pdf->MultiCell(50, 5, U2T('text19'), $border, "L"); //ลายเซ็น
                $y_point = 276;
                $pdf->SetXY( 133, $y_point );
                $pdf->MultiCell(50, 5, U2T($full_name), $border, "L"); //ลงชื่อ
                $y_point += $y;
                $pdf->SetXY( 133, $y_point );
                $pdf->MultiCell(50, 5, U2T('text19'), $border, "L"); //ลายเซ็น

            }else if($pageNo == '2'){
                $y_point = 125.3;
                $pdf->SetXY( 90, $y_point );
                $pdf->MultiCell(60 , 5, U2T($data['loan_amount']), $border, "L");//จำนวนเงินกู้
                $y_point = 164.5;
                $pdf->Image($myImage, 155.5, $y_point, 3);
                $pdf->Image($myImage, 168.7, $y_point, 3);
                $y_point = 170.5;
                $pdf->SetXY( 70, $y_point );
                $pdf->MultiCell(120 , 5, U2T(''), $border, "L");//ข้อชี้แจงอื่นๆ
                $y_point = 186.9;
                $pdf->SetXY( 107, $y_point );
                $pdf->MultiCell(42 , 5, U2T(''), $border, "L");//ต้นเงินค้ำ
                $y_point = 257;
                $pdf->Image($myImage, 155.5, $y_point, 3);
                $pdf->Image($myImage, 168.7, $y_point, 3);
                $y_point += $y-1.3;
                $pdf->SetXY( 68, $y_point );
                $pdf->MultiCell(125 , 5, U2T(''), $border, "L"); //ขอช้้ีแจงอื่น ๆ 
                $y_point += $y;
                $pdf->SetXY( 135.3, $y_point );
                $pdf->MultiCell(45 , 5, U2T(''), $border, "L"); //เจ้าหน้าที่
                $y_point += $y;
                $pdf->SetXY( 135.3, $y_point );
                $pdf->MultiCell(45 , 5, U2T(''), $border, "L"); //ลายเซ็น
                $y_point += $y;
                $pdf->SetXY( 143.3, $y_point );
                $pdf->MultiCell(30 , 5, U2T(''), $border, "L"); //วันที่เซ็น
            }else if($pageNo == '3'){
                $y_point = 39.3;
                $pdf->SetXY( 160, $y_point );
                $pdf->MultiCell(35 , 5, U2T(''), $border, "L");//จำนวนเงินกู้
                $y_point += $y;
                $pdf->SetXY( 160, $y_point );
                $pdf->MultiCell(35 , 5, U2T(''), $border, "L");//วันที่
                $y_point += $y;
                $pdf->SetXY( 45, $y_point );
                $pdf->MultiCell(135 , 5, U2T($full_name), $border, "L");//ชื่อผู้กู๋
                $y_point += $y;
                $pdf->SetXY( 45, $y_point );
                $pdf->MultiCell(135 , 5, U2T($full_name), $border, "L");//ข้าพเจ้า
                $y_point += $y;
                $pdf->SetXY( 157, $y_point );
                $pdf->MultiCell(35 , 5, U2T(''), $border, "L");//รหัสสมาชิก
                $y_point += $y;
                $pdf->SetXY( 85, $y_point );
                $pdf->MultiCell(45 , 5, U2T(''), $border, "L");//ตำแหน่ง
                $y_point += $y;
                $pdf->SetXY( 47, $y_point );
                $pdf->MultiCell(35 , 5, U2T(''), $border, "L");//รัฐวิสากิลเลขที่
                $pdf->SetXY( 92, $y_point );
                $pdf->MultiCell(40 , 5, U2T(''), $border, "L");//สังกัด
                $pdf->SetXY( 172, $y_point );
                $pdf->MultiCell(22 , 5, U2T(''), $border, "L");//บ้านเลขที่
                $y_point += $y;
                $pdf->SetXY( 30, $y_point );
                $pdf->MultiCell(30 , 5, U2T(''), $border, "L");//ถนน
                $pdf->SetXY( 70, $y_point );
                $pdf->MultiCell(33 , 5, U2T(''), $border, "L");//ตำบล
                $pdf->SetXY( 115, $y_point );
                $pdf->MultiCell(33 , 5, U2T(''), $border, "L");//อำเภอ
                $pdf->SetXY( 162, $y_point );
                $pdf->MultiCell(33 , 5, U2T(''), $border, "L");//จังหวัด
                $y_point += $y;
                $pdf->SetXY( 35, $y_point );
                $pdf->MultiCell(57 , 5, U2T(''), $border, "L");//โทรศัพท์
                $y_point += $y+$y;
                $pdf->SetXY( 102, $y_point );
                $pdf->MultiCell(23 , 5, U2T($data['loan_amount']), $border, "L");//จำนวนเงิน
                $pdf->SetXY( 135, $y_point );
                $number_text = $this->center_function->convert($data['loan_amount']);
                $pdf->MultiCell(55 , 5, U2T($number_text), $border, "L");//จำนวนเงินตัวอักษร
                $y_point = 138.4;
                $pdf->Image($myImage, 42.3, $y_point+1.3, 3);
                $pdf->SetXY( 105, $y_point );
                $pdf->MultiCell(60 , 5, U2T(''), $border, "L");//จำนวนเงินตัวอักษร
                $y = $y + 0.2;
                $y_point += $y;
                $pdf->Image($myImage, 42.3, $y_point+1.3, 3);
                $pdf->SetXY( 123, $y_point );
                $pdf->MultiCell(60 , 5, U2T(''), $border, "L");//จำนวนเงินตัวอักษร
                
                $y_point += $y;
                $pdf->SetXY( 48, $y_point );
                $pdf->MultiCell(29 , 5, U2T(''), $border, "L");//จำนวนงวดตัวอักษร
                $pdf->SetXY( 155, $y_point );
                $pdf->MultiCell(29 , 5, U2T(''), $border, "L");//จำนวนอัตราดอกเบี้ยตัวอักษร
                $y_point += $y;
                $pdf->SetXY( 60 , $y_point );
                $pdf->MultiCell(29 , 5, U2T(''), $border, "L");//จำนวนงวดประจำเดือนตัวอักษร
            }else if($pageNo == '4'){
                $y_point = 36.3;
                $pdf->SetXY( 118.3, $y_point );
                $pdf->MultiCell(30 , 5, U2T(''), $border, "L");//เลขที่สหกรณ์
                $pdf->SetXY( 161, $y_point );
                $pdf->MultiCell(25 , 5, U2T(''), $border, "L");//จำนวนหุ้น
                $y -= 0.2;
                $y_point+=$y;
                $pdf->SetXY( 33, $y_point );
                $pdf->MultiCell(35 , 5, U2T(''), $border, "L");//จำนวนเงิน
                $y_point = 93.9;
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T($full_name), $border, "L");//ชื่อผู้กู้
                $y_point += $y; 
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T($full_name), $border, "L");//ลายเซ็นผู้กู้
                $y_point += $y; 
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "L");//ชื่อพยาน
                $y_point += $y; 
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "L");//ลายเซ็นพยาน
                $y_point += $y; 
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "L");//ชื่อพยาน
                $y_point += $y; 
                $pdf->SetXY( 124, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "L");//ลายเซ็นพยาน


                $y_point = 229; 
                $pdf->SetXY( 33, $y_point );
                $pdf->MultiCell(85 , 5, U2T(''), $border, "L");//ชื่อ
                $pdf->SetXY( 150, $y_point );
                $pdf->MultiCell(35 , 5, U2T(''), $border, "L");//จำนวนหุ้น
                $y_point += $y;
                $pdf->SetXY( 22, $y_point );
                $pdf->MultiCell(77 , 5, U2T(''), $border, "L");//จำนวนหุ้นตัวอักษร

                $y_point = 248.3;
                $pdf->SetXY( 92, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "L");//ชื่อผู้รับเงิน
                $y_point += $y;
                $pdf->SetXY( 92, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "L");//ลายเซ็นผู้รับเงิน
                $y_point += 12;
                $pdf->SetXY( 92, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "L");//เจ้าหน้าที่ผู้จ่ายเงิน
                $y_point += 12;
                $pdf->SetXY( 92, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "L");//เจ้าหน้าที่ผู้ตรวจสัญญากู้
            }else if($pageNo == '5'){
                $y_point = 46.3;
                $pdf->SetXY( 135, $y_point );
                $pdf->MultiCell(60 , 5, U2T(''), $border, "L");//เขียนที่
                $y_point += $y;
                $pdf->SetXY( 120, $y_point );
                $pdf->MultiCell(12 , 5, U2T(''), $border, "L");//วันที่
                $pdf->SetXY( 143, $y_point );
                $pdf->MultiCell(25 , 5, U2T(''), $border, "L");//จำนวนงวดตัวอักษร
                $pdf->SetXY( 177, $y_point );
                $pdf->MultiCell(15 , 5, U2T(''), $border, "L");//จำนวนงวดตัวอักษร
                $y_point += $y;
                $pdf->SetXY( 45, $y_point );
                $pdf->MultiCell(55 , 5, U2T($full_name), $border, "L");//ชื่อ
                $pdf->SetXY( 138, $y_point );
                $pdf->MultiCell(35 , 5, U2T(''), $border, "L");//เลขบัตรประชาชน
                $pdf->SetXY( 183, $y_point );
                $pdf->MultiCell(8 , 5, U2T(''), $border, "L");//อายุ  

                $y_point += $y;
                $pdf->SetXY( 52, $y_point );
                $pdf->MultiCell(13   , 5, U2T(''), $border, "L");//บ้านเลขที่
                $pdf->SetXY( 73, $y_point );
                $pdf->MultiCell(12 , 5, U2T(''), $border, "L");//หมู่
                $pdf->SetXY( 103, $y_point );
                $pdf->MultiCell(37 , 5, U2T(''), $border, "L");//ตรอก/ซอย
                $pdf->SetXY( 150, $y_point );
                $pdf->MultiCell(45 , 5, U2T(''), $border, "L");//ถนน

                $y_point += $y;
                $pdf->SetXY( 39, $y_point );
                $pdf->MultiCell(43 , 5, U2T(''), $border, "L");//แขวง/ตำบล
                $pdf->SetXY( 100, $y_point );
                $pdf->MultiCell(37 , 5, U2T(''), $border, "L");//เขต/อำเภอ
                $pdf->SetXY( 152, $y_point );
                $pdf->MultiCell(40 , 5, U2T(''), $border, "L");//จำหวัด
                
                $y_point += $y;
                $pdf->SetXY( 47, $y_point );
                $pdf->MultiCell(33 , 5, U2T(''), $border, "L");//โทรศัพท์บ้าน
                $pdf->SetXY( 93, $y_point );
                $pdf->MultiCell(40 , 5, U2T(''), $border, "L");//มือถือ
                $pdf->SetXY( 149, $y_point );
                $pdf->MultiCell(40 , 5, U2T(''), $border, "L");//ตำแหน่ง
                $y_point += $y;
                $pdf->SetXY( 30, $y_point );
                $pdf->MultiCell(30 , 5, U2T(''), $border, "L");//สังกัด
                $pdf->SetXY( 102, $y_point );
                $pdf->MultiCell(18 , 5, U2T(''), $border, "L");//เงินเดือน
                $pdf->SetXY( 132, $y_point );
                $pdf->MultiCell(58 , 5, U2T(''), $border, "L");//เงินเดือนตัวอักษร
                $y_point += $y;
                $pdf->SetXY( 152, $y_point );
                $pdf->MultiCell(30 , 5, U2T(''), $border, "L");//ทะเบียนสมาชิก

                $y_point += 23.3;
                $pdf->SetXY( 74, $y_point );
                $pdf->MultiCell(13 , 5, U2T(''), $border, "L");//สัญญากู้เลขที่
                $pdf->SetXY( 116, $y_point );
                $pdf->MultiCell(6 , 5, U2T(''), $border, "L");//คำขอกู้เลขที่   

                $y_point = 241.8;
                $pdf->SetXY( 81, $y_point );
                $pdf->MultiCell(50 , 5, U2T($full_name), $border, "L");//ลงชื่อ ผู้ให้คำยินยอม
                $y_point += $y;
                $pdf->SetXY( 81, $y_point );
                $pdf->MultiCell(50 , 5, U2T($full_name), $border, "L");//ลายเซ็น ผู้ให้คำยินยอม
                $y_point += $y;
                $pdf->SetXY( 81, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "L");//ลงชื่อ พยาน
                $y_point += $y;
                $pdf->SetXY( 81, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "L");//ลายเซ็น พยาน
                $y_point += $y;
                $pdf->SetXY( 81, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "L");//ลงชื่อ พยาน
                $y_point += $y;
                $pdf->SetXY( 81, $y_point );
                $pdf->MultiCell(50 , 5, U2T(''), $border, "L");//ลายเซ็น พยาน
            }
        }
	$pdf->Output();