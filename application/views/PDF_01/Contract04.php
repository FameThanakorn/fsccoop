<?php
function U2T($text) { return @iconv("UTF-8", "TIS-620//IGNORE", ($text)); }
function num_format($text) {
    if($text!=''){
        return number_format($text,2);
    }else{
        return '';
    }
}

	$filename = $_SERVER["DOCUMENT_ROOT"]."/fsccoop"."/assets/document/loan/loan_04.pdf" ;
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
    $salary_text = $this->center_function->convert($salary);
 
    

    // $test = $share_bill;
	for ($pageNo = 1; $pageNo <= $pageCount_1; $pageNo++) {	
        $pdf->AddPage();
            $tplIdx = $pdf->importPage($pageNo);
            $pdf->useTemplate($tplIdx, 0, 0, 0, 0, true);
            $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
            $pdf->SetFont('THSarabunNew', '', 14 );
            
            // $pdf->SetTitle(U2T('คำขอกู้เงินเพื่อการศึกษา'));
            $border = 1;
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetAutoPageBreak(true,0);
            if($pageNo == '1'){
                // $pdf->Image($myImage, 35.8, 162.3, 3);
                // $y_point = 55.7;
                    $pdf->SetXY( 33, $y_point );
                    $pdf->MultiCell(65, 5, U2T($test), $border, "C"); //เขียนที่
                $y_point = 86.5;
                    $pdf->SetXY( 47, $y_point );
                    $pdf->MultiCell(62, 5, U2T('นาย วัทธิกร ประจงบัว'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 142, $y_point );
                    $pdf->MultiCell(50, 5, U2T('SM554492'), $border, "C"); //สมาชิกเลขทะเบียนที่
                $y_point = 93.9;
                    $pdf->SetXY( 85, $y_point );
                    $pdf->MultiCell(40, 5, U2T('นาย วัทธิกร ประจงบัว'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 134, $y_point );
                    $pdf->MultiCell(29.5, 5, U2T('SM554492'), $border, "C"); //สมาชิกเลขทะเบียนที่
                    $pdf->SetXY( 181, $y_point );
                    $pdf->MultiCell(15, 5, U2T('SM5'), $border, "C"); //สมาชิกเลขทะเบียนที่
                $y_point = 101.3;
                    $pdf->SetXY( 31.5, $y_point );
                    $pdf->MultiCell(33, 5, U2T('นาย วัทธิกร ประจงบัว'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 96, $y_point );
                    $pdf->MultiCell(19, 5, U2T('SM554492'), $border, "C"); //สมาชิกเลขทะเบียนที่
                    $pdf->SetXY( 165, $y_point );
                    $pdf->MultiCell(25, 5, U2T('SM5'), $border, "C"); //สมาชิกเลขทะเบียนที่
                $y_point = 109.1;
                    $pdf->SetXY( 31.5, $y_point );
                    $pdf->MultiCell(15, 5, U2T('มกราคม'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 54, $y_point );
                    $pdf->MultiCell(25, 5, U2T('มกราคม'), $border, "C"); //ชื่อผู้กู้
                $y_point = 116.1;
                    $pdf->SetXY( 157.5, $y_point );
                    $pdf->MultiCell(50, 5, U2T('มกราคม'), $border, "C"); //ชื่อผู้กู้
                $y_point = 123.7;
                    $pdf->SetXY( 23, $y_point );
                    $pdf->MultiCell(50, 5, U2T('มกราคม'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 95, $y_point );
                    $pdf->MultiCell(90, 5, U2T('มกราคม'), $border, "C"); //ชื่อผู้กู้
                $y_point = 165.9;
                    $pdf->SetXY( 105.5, $y_point );
                    $pdf->MultiCell(36.8, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 143.6, $y_point );
                    $pdf->MultiCell(26.5, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 172.6, $y_point );
                    $pdf->MultiCell(25, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                $y_point = 174.3;
                    $pdf->SetXY( 105.5, $y_point );
                    $pdf->MultiCell(36.8, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 143.6, $y_point );
                    $pdf->MultiCell(26.5, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 172.6, $y_point );
                    $pdf->MultiCell(25, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                $y_point = 184.2;
                    $pdf->SetXY( 105.5, $y_point );
                    $pdf->MultiCell(36.8, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 143.6, $y_point );
                    $pdf->MultiCell(26.5, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 172.6, $y_point );
                    $pdf->MultiCell(25, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                $y_point = 194.2;
                    $pdf->SetXY( 105.5, $y_point );
                    $pdf->MultiCell(36.8, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 143.6, $y_point );
                    $pdf->MultiCell(26.5, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 172.6, $y_point );
                    $pdf->MultiCell(25, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                $y_point = 202.8;
                    $pdf->SetXY( 105.5, $y_point );
                    $pdf->MultiCell(36.8, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 143.6, $y_point );
                    $pdf->MultiCell(26.5, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 172.6, $y_point );
                    $pdf->MultiCell(25, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                $y_point = 220.8;
                    $pdf->SetXY( 120.5, $y_point );
                    $pdf->MultiCell(28.8, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 167.6, $y_point );
                    $pdf->MultiCell(23.5, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                $y_point = 243.2;
                    $pdf->SetXY( 131, $y_point );
                    $pdf->MultiCell(55, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
                $y_point = 279.9;
                    $pdf->SetXY( 131.5, $y_point );
                    $pdf->MultiCell(46, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
 
            }else if($pageNo == '2'){
                $y_point = 50;
                    $pdf->SetXY( 131.5, $y_point );
                    $pdf->MultiCell(46, 5, U2T('2,000,000'), $border, "C"); //ชื่อผู้กู้
            }else if($pageNo == '3'){
                $y_point = 80;
                    $pdf->SetXY( 166, $y_point );
                    $pdf->MultiCell(15, 5, U2T('500'), $border, "C"); //ชื่อผู้กู้
                    $pdf->SetXY( 171, $y_point );
                    $pdf->MultiCell(15, 5, U2T('500'), $border, "C"); //ชื่อผู้กู้
                $y_point = 88;
                    $pdf->SetXY( 166, $y_point );
                    $pdf->MultiCell(15, 5, U2T('500'), $border, "C"); //ชื่อผู้กู้
                    
            }
        }
	//exit;
	$pdf->Output();