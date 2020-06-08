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
    // echo $filename; exit;
	$pdf = new FPDI();

    $pageCount_1 = $pdf->setSourceFile($filename);
    $myImage = "assets/images/check-mark.png";
    // foreach($user as $key=>$value){
    //     $firstname_th = $value['firstname_th'];
    //     $lastname_th  = $value['lastname_th'];
    //     $fullname_th = $firstname_th."  ".$lastname_th;     
    // }

 
    

    // $test = $share_bill;
	for ($pageNo = 1; $pageNo <= $pageCount_1; $pageNo++) {	
        $pdf->AddPage();
        $tplIdx = $pdf->importPage($pageNo);
            $pdf->useTemplate($tplIdx, 0, 0, 0, 0, true);
            $pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
            $pdf->SetFont('THSarabunNew', '', 14 );
        }
	//exit;
	$pdf->Output();