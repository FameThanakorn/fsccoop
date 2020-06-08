<?php
function U2T($text) { return @iconv("UTF-8", "TIS-620//IGNORE", ($text)); }
function num_format($text) {
    if($text!=''){
        return number_format($text,2);
    }else{
        return '';
    }
}

    // print_r($user);
	$filename = $_SERVER["DOCUMENT_ROOT"]."/fsccoop"."/assets/document/loan/loan_01.pdf" ;
	$pdf = new FPDI();

    $pageCount_1 = $pdf->setSourceFile($filename);
    $myImage = "assets/images/check-mark.png";
    // foreach($user as $key=>$value){
    //     $firstname_th = $value['firstname_th'];
    //     $lastname_th  = $value['lastname_th'];
    //     $fullname_th = $firstname_th."  ".$lastname_th;     
    // }
    $loan_amount    =   $loan_amount['loan_amount']."+";
    $fullname_th    =   $user['firstname_th']."  ".$user['lastname_th']."+";
    $member_id      =   $user['member_id']."+";
    $addree_number  =   $user['address_no']."+";
    $address_moo    =   $user['address_moo']."+";
    $address_road   =   $user['address_road']."+";
    $address_soi    =   $user['address_soi']."+";
    $salary         =   $user['salary']."+";
    $id_card        =   $user['id_card']."+";
    $address_no     =   $user['address_no']."+";
    $province       =   $province['province_name']."+";
    $mobile         =   $user['mobile']."+";
    $district        =   $district['district_name']."+";
    $amphur         =   $amphur['amphur_name']."+";
    $position       =   $user['position']."+";
    $share_month    =   $user['share_month']."+";
    $approve_date   =   $user['approve_date']."+";
    $loan_month     =   $loan_amount/$share_month."+";
    $share_payable  =   $share['share_payable']."+";
    $share_payable_value = $share['share_payable_value']."+";
    $share_bill     =   $share['share_bill'];
    

    
    $test = $share_bill;
	for ($pageNo = 1; $pageNo <= $pageCount_1; $pageNo++) {	
        $pdf->AddPage();
            $tplIdx = $pdf->importPage($pageNo);
            $pdf->useTemplate($tplIdx, 0, 0, 0, 0, true);
            $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
            $pdf->SetFont('THSarabunNew', '', 14 );
            
            // $pdf->SetTitle(U2T('คำขอกู้เงินเพื่อการศึกษา'));
            $border = 0;
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetAutoPageBreak(true,0);
            if($pageNo == '1'){
                $pdf->Image($myImage, 35.8, 162.3, 3);
                $y_point = 35.7;
                    $pdf->SetXY( 56, $y_point );
                    $pdf->MultiCell(50, 5, U2T($test), $border, "C"); //เขียนที่
                $y_point = 45.7;
                    $pdf->SetXY( 146, $y_point );
                    $pdf->MultiCell(50, 5, U2T('สหกรณ์ออมทรัพย์โรงพยาบาลตำรวจ'), $border, "C"); //เขียนที่
                $y_point = 53.5;
                    $pdf->SetXY( 146, $y_point );
                    $pdf->MultiCell(50, 5, U2T($approve_date), $border, "C"); //วันที่

                $y_point = 68.7;
                    $pdf->SetXY( 52, $y_point );
                    $pdf->MultiCell(80, 5, U2T($fullname_th,0,0), $border, "C"); //ข้าพเจ้า.....
                    $pdf->SetXY( 169, $y_point );
                    $pdf->MultiCell(28, 5, U2T($member_id), $border, "C"); //สมาชิกเลขทะเบียนที่
                
                $y_point = 76.3;
                    $pdf->SetXY( 60, $y_point );
                    $pdf->MultiCell(32, 5, U2T(number_format($salary,0)), $border, "C"); //รายได้เดือนละ

                $y_point = 84;
                    $pdf->SetXY( 80, $y_point );
                    $pdf->MultiCell(26, 5, U2T(number_format($loan_amount,0)), $border, "C"); //ขอกู้เงินจำนวน
                    $pdf->SetXY( 120, $y_point );
                    $pdf->MultiCell(70, 5, U2T('หนึ่งล้านห้าแสนบาทถ้วน'), $border, "C"); //ตัวอักษรจำนวนเงิน
                    $pdf->Image($myImage, 76.8, 93.3, 3);
                $y_point = 99.5;
                    $pdf->SetXY( 44.5, $y_point );
                    $pdf->MultiCell(70, 5, U2T('โรงเรียนปากช่อง'), $border, "C"); //ชื่อสถานศึกษา
                    $pdf->SetXY( 135, $y_point );
                    $pdf->MultiCell(60, 5, U2T('หนองสาหร่าย'), $border, "C"); //แขวง, ตำบล

                $y_point = 107;
                    $pdf->SetXY( 42, $y_point );
                    $pdf->MultiCell(70, 5, U2T($amphur), $border, "C"); //เขต, อำเภอ
                    $pdf->SetXY( 127, $y_point );
                    $pdf->MultiCell(67, 5, U2T($province), $border, "C"); //จังหวัด

                $y_point = 114.7;
                    $pdf->SetXY( 116, $y_point );
                    $pdf->MultiCell(78, 5, U2T($position), $border, "C"); //จังหวัด

                $y_point = 122.5;
                    $pdf->SetXY( 108, $y_point );
                    $pdf->MultiCell(37, 5, U2T($id_card), $border, "C"); //จังหวัด
                    $pdf->SetXY( 156, $y_point );
                    $pdf->MultiCell(37, 5, U2T('-'), $border, "C"); //สังกัด

                $y_point = 130;
                    $pdf->SetXY( 57, $y_point );
                    $pdf->MultiCell(37, 5, U2T($addree_number), $border, "C"); //บ้านเลขที่
                    $pdf->SetXY( 105, $y_point );
                    $pdf->MultiCell(39, 5, U2T($address_road), $border, "C"); //ถนน..
                    $pdf->SetXY( 165, $y_point );
                    $pdf->MultiCell(32, 5, U2T($district), $border, "C"); //แขวง, ตำบล..
                
                $y_point = 137.8;
                    $pdf->SetXY( 41, $y_point );
                    $pdf->MultiCell(52, 5, U2T($amphur), $border, "C"); //เขต, อำเภอ
                    $pdf->SetXY( 107, $y_point );
                    $pdf->MultiCell(38, 5, U2T($province), $border, "C"); //จังหวัด
                    $pdf->SetXY( 162, $y_point );
                    $pdf->MultiCell(33, 5, U2T($mobile), $border, "C"); //โทรษัพท์

                $y_point = 199;
                    $pdf->SetXY( 121.5, $y_point );
                    $pdf->MultiCell(24, 5, U2T($share_month), $border, "C"); //ส่งงวดละ
                    $pdf->SetXY( 165.5, $y_point );
                    $pdf->MultiCell(20, 5, U2T($loan_month), $border, "C"); //งวด
            }else if($pageNo == '2'){
                $y_point = 45.2;
                    $pdf->SetXY( 134, $y_point );
                    $pdf->MultiCell(40, 5, U2T('1 มิถุนายน 2563'), $border, "C"); //วันที่
                    $pdf->Image($myImage, 67.3, 73.3, 3);
                    $pdf->Image($myImage, 106, 88.7, 3);
                    $pdf->Image($myImage, 67.3, 103.7, 3);
            }else if($pageNo == '3'){
                $y_point = 42.7;
                    $pdf->SetXY( 49, $y_point );
                    $pdf->MultiCell(100, 5, U2T($fullname_th), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 169, $y_point );
                    $pdf->MultiCell(25, 5, U2T('01/06/63'), $border, "C"); //วันที่
                $y_point = 50.6;
                    $pdf->SetXY( 160, $y_point );
                    $pdf->MultiCell(32, 5, U2T($member_id), $border, "C"); //ตำแหน่ง
                $y_point = 58.2;
                    $pdf->SetXY( 85, $y_point );
                    $pdf->MultiCell(55, 5, U2T($position), $border, "C"); //สมาชิก
                $y_point = 66;
                    $pdf->SetXY( 48, $y_point );
                    $pdf->MultiCell(37, 5, U2T($id_card), $border, "C"); //ID
                    $pdf->SetXY( 95, $y_point );
                    $pdf->MultiCell(43, 5, U2T(' - '), $border, "C"); //สังกัด
                    $pdf->SetXY( 172.5, $y_point );
                    $pdf->MultiCell(24, 5, U2T($address_no), $border, "C"); //บ้านเลขที่
                $y_point = 73.5;
                    $pdf->SetXY( 30.5, $y_point );
                    $pdf->MultiCell(47, 5, U2T($address_road), $border, "C"); //ถนน
                    $pdf->SetXY( 97, $y_point );
                    $pdf->MultiCell(40, 5, U2T($district), $border, "C"); //ตำบล
                    $pdf->SetXY( 155, $y_point );
                    $pdf->MultiCell(38, 5, U2T($amphur), $border, "C"); //อำเภอ
                $y_point = 81;
                    $pdf->SetXY( 35, $y_point );
                    $pdf->MultiCell(40, 5, U2T($province), $border, "C"); //จังหวัด
                    $pdf->SetXY( 97, $y_point );
                    $pdf->MultiCell(40, 5, U2T($address_tel), $border, "C"); //เบอร์โทรศัพท์

                $y_point = 104;
                    $pdf->SetXY( 102, $y_point );
                    $pdf->MultiCell(25, 5, U2T($loan_amount), $border, "C"); //จำนวนเงิน
                    $pdf->SetXY( 138, $y_point );
                    $pdf->MultiCell(57, 5, U2T('หนึ่งล้านห้าแสนบาทถ้วน'), $border, "C"); //ตัวอักษร

                $y_point = 119.7;
                    $pdf->SetXY( 149, $y_point );
                    $pdf->MultiCell(40, 5, U2T($share_month), $border, "C"); //จำนวนเงิน

                $y_point = 127;
                    $pdf->SetXY( 50.5, $y_point );
                    $pdf->MultiCell(31, 5, U2T('สี่พันบาทถ้วน'), $border, "C"); //ตัวอักษรจำนวนเงิน

                $y_point = 127;
                    $pdf->SetXY( 157, $y_point );
                    $pdf->MultiCell(30, 5, U2T('5'), $border, "C"); //จำนวนเงิน

                $y_point = 134.8;
                    $pdf->SetXY( 62, $y_point );
                    $pdf->MultiCell(27, 5, U2T('มิถุนายน'), $border, "C"); //ตั้งแต่เดือน
            }else if($pageNo == '4'){
                $y_point = 27;
                    $pdf->SetXY( 120, $y_point );
                    $pdf->MultiCell(12, 5, U2T('35'), $border, "C"); //สหกรณ์เลขที่
                    $pdf->SetXY( 145, $y_point );
                    $pdf->MultiCell(14, 5, U2T($share_payable), $border, "C"); //จำนวน
                    $pdf->SetXY( 175, $y_point );
                    $pdf->MultiCell(14, 5, U2T($share_payable_value), $border, "C"); //เป็นจำนวนเงิน

            }else if($pageNo == '5'){
                $y_point = 50.5;
                    $pdf->SetXY( 123, $y_point );
                    $pdf->MultiCell(14, 5, U2T('01'), $border, "C"); //วันที่
                    $pdf->SetXY( 146, $y_point );
                    $pdf->MultiCell(27, 5, U2T('มิถุนายน'), $border, "C"); //วันที่
                    $pdf->SetXY( 180.5, $y_point );
                    $pdf->MultiCell(15, 5, U2T('2563'), $border, "C"); //วันที่
                $y_point = 82.5;
                    $pdf->SetXY( 60, $y_point );
                    $pdf->MultiCell(67, 5, U2T($fullname_th), $border, "C"); //ชื่อ...
                $y_point = 90.3;
                    $pdf->SetXY( 73, $y_point );
                    $pdf->MultiCell(34, 5, U2T($loan_amount), $border, "C"); //จำนวนเงิน
                    $pdf->SetXY( 119, $y_point );
                    $pdf->MultiCell(65, 5, U2T('หนึ่งล้านห้าแสนบาทถ้วน'), $border, "C"); //จำนวนเงินตัวเขียน
                $y_point = 113;
                    $pdf->SetXY( 40, $y_point );
                    $pdf->MultiCell(30, 5, U2T($loan_amount), $border, "C"); //จำนวนเงิน
                    $pdf->SetXY( 85, $y_point );
                    $pdf->MultiCell(72, 5, U2T('หนึ่งล้านห้าแสนบาทถ้วน'), $border, "C"); //จำนวนเงินตัวเขียน

            }else if($pageNo == '6'){

            }else if($pageNo == '7'){
                $y_point = 40.5;
                    $pdf->SetXY( 140, $y_point );
                    $pdf->MultiCell(50, 5, U2T('สหกรณ์ออมทรัพย์โรงพยาบาลตำรวจ'), $border, "C"); //เขียนที่
                $y_point = 48;
                    $pdf->SetXY( 131.5, $y_point );
                    $pdf->MultiCell(9, 5, U2T('1'), $border, "C"); //วัน
                    $pdf->SetXY( 149.5, $y_point );
                    $pdf->MultiCell(25, 5, U2T('มิถุนายน'), $border, "C"); //เดือน
                    $pdf->SetXY( 182, $y_point );
                    $pdf->MultiCell(14, 5, U2T('2563'), $border, "C"); //ปี
                $y_point = 55.8;
                    $pdf->SetXY( 47, $y_point );
                    $pdf->MultiCell(60, 5, U2T($fullname_th), $border, "C"); //ชื่อ...
                    $pdf->SetXY( 145, $y_point );
                    $pdf->MultiCell(33, 5, U2T($id_card), $border, "C"); //
                    $pdf->SetXY( 185, $y_point );
                    $pdf->MultiCell(10, 5, U2T('18'), $border, "C"); //
                $y_point = 63.5;
                    $pdf->SetXY( 52.5, $y_point );
                    $pdf->MultiCell(15, 5, U2T($address_number), $border, "C"); //
                    $pdf->SetXY( 73.5, $y_point );
                    $pdf->MultiCell(15, 5, U2T($address_moo), $border, "C"); //
                    $pdf->SetXY( 106.5, $y_point );
                    $pdf->MultiCell(42, 5, U2T($address_soi), $border, "C"); //
                    $pdf->SetXY( 157.5, $y_point );
                    $pdf->MultiCell(38, 5, U2T($address_road), $border, "C"); //
                $y_point = 71;
                    $pdf->SetXY( 40.5, $y_point );
                    $pdf->MultiCell(48, 5, U2T($district), $border, "C"); //
                    $pdf->SetXY( 106, $y_point );
                    $pdf->MultiCell(42, 5, U2T($amphur), $border, "C"); //
                    $pdf->SetXY( 161, $y_point );
                    $pdf->MultiCell(35, 5, U2T($province), $border, "C"); //
                $y_point = 78.5;
                    $pdf->SetXY( 49, $y_point );
                    $pdf->MultiCell(38, 5, U2T('044-313XXX'), $border, "C"); //
                    $pdf->SetXY( 100, $y_point );
                    $pdf->MultiCell(38, 5, U2T($mobile), $border, "C"); //
                    $pdf->SetXY( 154, $y_point );
                    $pdf->MultiCell(38, 5, U2T($position), $border, "C"); //
                $y_point = 86.2;
                    $pdf->SetXY( 30.5, $y_point );
                    $pdf->MultiCell(38, 5, U2T('หน่วยรบพิเศษ'), $border, "C"); //
                    $pdf->SetXY( 106.5, $y_point );
                    $pdf->MultiCell(20, 5, U2T($salary), $border, "C"); //
                    $pdf->SetXY( 135.5, $y_point );
                    $pdf->MultiCell(60, 5, U2T('หนึ่งแสนห้าหมืนบาทถ้วย'), $border, "C"); //
                $y_point = 93.8;
                $pdf->SetXY( 157.5, $y_point );
                $pdf->MultiCell(40, 5, U2T($member_id), $border, "C"); //
            }else if($pageNo == '8'){

            }else if($pageNo == '9'){
                $y_point = 52.5;
                    $pdf->SetXY( 118, $y_point );
                    $pdf->MultiCell(11, 5, U2T('01'), $border, "C"); //วันที่
                    $pdf->SetXY( 136, $y_point );
                    $pdf->MultiCell(33, 5, U2T('มิถุนายน'), $border, "C"); //วันที่
                    $pdf->SetXY( 178.5, $y_point );
                    $pdf->MultiCell(15, 5, U2T('2563'), $border, "C"); //วันที่
                $y_point = 88.5;
                    $pdf->SetXY( 53, $y_point );
                    $pdf->MultiCell(62, 5, U2T($fullname_th), $border, "C"); //ชื่อ...
                    $pdf->SetXY( 129, $y_point );
                    $pdf->MultiCell(65, 5, U2T($position), $border, "C"); //ชื่อ...
                $y_point = 95.8;
                    $pdf->SetXY( 41, $y_point );
                    $pdf->MultiCell(62, 5, U2T('เทคโนโลยีสารสนเทศ'), $border, "C"); //ชื่อ...
                    $pdf->SetXY(115, $y_point );
                    $pdf->MultiCell(50, 5, U2T('เหนือเมฆ'), $border, "C"); //ชื่อ...
                $y_point = 111;
                    $pdf->SetXY( 35.5, $y_point );
                    $pdf->MultiCell(23, 5, U2T($salary), $border, "C"); //
                    $pdf->SetXY( 70, $y_point );
                    $pdf->MultiCell(64, 5, U2T('หนึ่งหมื่นสองพันบาทถ้วน'), $border, "C"); //
                    $pdf->SetXY( 159, $y_point );
                    $pdf->MultiCell(38, 5, U2T('พฤษภาคม'), $border, "C"); //
                $y_point = 118.7;
                $pdf->SetXY( 51, $y_point );
                $pdf->MultiCell(40, 5, U2T('0.00'), $border, "C"); //
                $pdf->SetXY( 104, $y_point );
                $pdf->MultiCell(90, 5, U2T('ศูยน์บาท'), $border, "C"); //
            }
    }
	
	//exit;
	$pdf->Output();