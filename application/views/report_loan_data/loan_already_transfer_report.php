<?php 
if(@$_GET['download']!=""){
	header("Content-type: application/vnd.ms-excel;charset=utf-8;");
	header("Content-Disposition: attachment; filename=export.xls"); 
	date_default_timezone_set('Asia/Bangkok');
}
?>
<style>
@page {
  size: 210mm 297mm; 
  /* Chrome sets own margins, we change these printer settings */
  margin: 15mm 0mm 15mm 0mm; 


}

@media print {
	body {zoom: 50%;}
}



span.title_view {
    font-size : 24px !important;
}

th, td {
    font-size : 16px !important;
	padding: 7px;
}
.table_header_top, .table_header_mid, .table_header_mid_2, .table_header_bot{
	background-color: #D9D9D9 !important;
	font-weight: 800;
	text-align: center;
}

.table_header_top, .table_header_mid, .table_header_mid_2, .table_header_bot, .table_body, .table_body_right, .table_body {
	border: 1px solid black;
}
table.st {
    border-collapse: collapse;
}
tr:nth-child(even).st {background-color: #f2f2f2;}
tr:hover.st {background-color: #f5f5f5;}
</style>	



		
		<div style="width: 90%;" class="text-center" >
			<div class="panel panel-body" style="padding-top:10px !important;min-height: 1200px;">
			<table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">
				<thead>
					<?php
						if(@$_GET['download']!=""){
							?>
								<tr>
									<th class="text-center" colspan="13"><?php echo $_SESSION['COOP_NAME']; ?></th>
								</tr>
								<tr>
									<th class="text-center" colspan="13">รายงานการจ่ายเงินกู้</th>
								</tr>
								<tr>
									<th class="text-center" colspan="13"><?php echo $date_text; ?></th>
								</tr>
							<?php
						}else{
							?>
								<tr>
									<th class="text-center" width='150'></th>
									<th class="text-center" colspan="11"><?php echo $_SESSION['COOP_NAME']; ?></th>
									<th class="text-center" width='150'>
										<a class="no_print" onclick="window.print();"><button class="btn btn-perview btn-after-input" type="button"><span class="icon icon-print" aria-hidden="true"></span></button></a>
										<a class="no_print" target="_blank" onclick="goto()">
                                            <button class="btn btn-perview btn-after-input" type="button"><span class="icon icon icon-file-excel-o" aria-hidden="true"></span></button>
                                        </a>
									</th>
								</tr>
								<tr>
									<th class="text-center" width='150'></th>
									<th class="text-center" colspan="11">รายงานการจ่ายเงินกู้</th>
									<th class="text-center" width='150'></th>
								</tr>
								<tr>
									<th class="text-center" width='150'></th>
									<th class="text-center" colspan="11"><?php echo $date_text; ?></th>
									<th class="text-center" width='150'></th>
								</tr>
							<?php
						}
					?>
					
					
				</thead>
			</table>
				<table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<th class="table_header_top">ลำดับ</th>
						<th class="table_header_top">วันที่สั่งจ่าย</th>
						<th class="table_header_top">เลขที่สัญญา</th>
						<th class="table_header_top">เลขสมาชิก</th>
						<th class="table_header_top">ชื่อ-นามสกุล</th>
						<th class="table_header_top">จำนวนเงินที่สั่งจ่าย</th>
						<th class="table_header_top" colspan="6">วิธีชำระเงิน</th>
						<th class="table_header_top">โทรศัพท์</th>
					</tr>
					<tr>
						<th class="table_header_mid"></th>
						<th class="table_header_mid"></th>
						<th class="table_header_mid"></th>
						<th class="table_header_mid"></th>
						<th class="table_header_mid"></th>
						<th class="table_header_mid"></th>
						<th class="table_header_mid_2" colspan="2">บัญชีเงินฝากสหกรณ์</th>
						<th class="table_header_mid_2" colspan="3">เช็คธนาคาร/เงินโอน</th>
						<th class="table_header_mid_2">เงินสด</th>
						<th class="table_header_mid"></th>
					</tr>
					<tr>
						<th class="table_header_mid"></th>
						<th class="table_header_mid"></th>
						<th class="table_header_mid"></th>
						<th class="table_header_mid"></th>
						<th class="table_header_mid"></th>
						<th class="table_header_mid"></th>
						<th class="table_header_mid_2">เลขบัญชี</th>
						<th class="table_header_mid_2">จำนวนเงิน</th>
						<th class="table_header_mid_2">ชื่อบัญชี</th>
						<th class="table_header_mid_2">เลขที่บัญชี/</th>
						<th class="table_header_mid_2">จำนวนเงิน</th>
						<th class="table_header_mid"></th>
						<th class="table_header_mid"></th>
					</tr>
					<tr>
						<th class="table_header_bot"></th>
						<th class="table_header_bot"></th>
						<th class="table_header_bot"></th>
						<th class="table_header_bot"></th>
						<th class="table_header_bot"></th>
						<th class="table_header_bot"></th>
						<th class="table_header_bot"></th>
						<th class="table_header_bot"></th>
						<th class="table_header_bot"></th>
						<th class="table_header_bot">เลขที่สัญญา</th>
						<th class="table_header_bot"></th>
						<th class="table_header_bot"></th>
						<th class="table_header_bot"></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i=1;
					$amount_transfer = 0;
					$coop_acc = 0;
					$bank_acc = 0;
					$cash = 0;
					foreach($row_loan as $key => $value){
					?>
						<tr class="st">
							<td class="table_body"><?php echo $i++; ?></td>
							<td class="table_body"><?php echo $this->center_function->ConvertToThaiDate($value['date_transfer']); ?></td>
							<td class="table_body"><?php echo $value['contract_number']; ?></td>
							<td class="table_body"><?php echo $value['member_id']; ?></td>
							<td class="table_body"><?php echo $value['prename_short'].$value['firstname_th']." ".$value['lastname_th']; ?></td>
							<td class="table_body_right"><?php echo number_format(@$value['amount_transfer'],2); ?></td>
							<td class="table_body"><?php echo $value['pay_type']=='1'?$value['account_id']:''; ?></td>
							<td class="table_body_right"><?php echo $value['pay_type']=='1'?number_format(@$value['amount_transfer'],2):''; ?></td>
							<td class="table_body"><?php echo $value['pay_type']=='2'?$value['bank_name']:''; ?></td>
							<td class="table_body"><?php echo $value['pay_type']=='2'?$value['dividend_acc_num']:''; ?></td>
							<td class="table_body_right"><?php echo $value['pay_type']=='2'?number_format(@$value['amount_transfer'],2):''; ?></td>
							<td class="table_body_right"><?php echo $value['pay_type']=='0'?number_format(@$value['amount_transfer'],2):''; ?></td>
							<td class="table_body"><?php echo @$value['mobile']; ?></td>
						</tr>	
						<?php 
						$amount_transfer += $value['amount_transfer'];
						if($value['pay_type']=='0'){
							$cash += $value['amount_transfer'];
						}else if($value['pay_type']=='1'){
							$coop_acc += $value['amount_transfer'];
						}else if($value['pay_type']=='2'){
							$bank_acc += $value['amount_transfer'];
						}
					} 
					?>

					<tr style="background-color: #D9D9D9 !important;font-weight: 800;">
						<td class="table_body" colspan="5">รวม</td>
						<td class="table_body"><?php echo number_format($amount_transfer,2); ?></td>
						<td class="table_body"></td>
						<td class="table_body"><?php echo number_format($coop_acc,2); ?></td>
						<td class="table_body"></td>
						<td class="table_body"></td>
						<td class="table_body"><?php echo number_format($bank_acc,2); ?></td>
						<td class="table_body"><?php echo number_format($cash,2); ?></td>
						<td class="table_body"></td>
					</tr>
				</tbody>

			</table>


<script>
    function goto(){
        // console.log(window.location.href );
        window.open(window.location.href+'&download=1');
    }
</script>