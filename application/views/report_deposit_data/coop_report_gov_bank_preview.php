<style>
	.table-view>thead, .table-view>thead>tr>td, .table-view>thead>tr>th {
		font-size: 14px;
	}
	.table-view-2>thead>tr>th{
	    border-top: 1px solid #000 !important;
		border-bottom: 1px solid #000 !important;
		font-size: 16px;
	}
	.table-view-2>tbody>tr>td{
	    border: 0px !important;
		/*font-family: upbean;
		font-size: 16px;*/
		font-family: Tahoma;
		font-size: 12px;
	}	
	.border-bottom{
	    border-bottom: 1px solid #000 !important;
		font-weight: bold;
	}
	
	.foot-border{
	    border-top: 1px solid #000 !important;
		border-bottom: double !important;
		font-weight: bold;
	}
	.table {
		color: #000;
	}
	@media print {
		.pagination {
			display: none;
		}
	}
</style>		
<?php

if(@$_GET['start_date']){
	$start_date_arr = explode('/',@$_GET['start_date']);
	$start_day = $start_date_arr[0];
	$start_month = $start_date_arr[1];
	$start_year = $start_date_arr[2];
	$start_year -= 543;
	$start_date = $start_year.'-'.$start_month.'-'.$start_day;
}

if(@$_GET['end_date']){
	$end_date_arr = explode('/',@$_GET['end_date']);
	$end_day = $end_date_arr[0];
	$end_month = $end_date_arr[1];
	$end_year = $end_date_arr[2];
	$end_year -= 543;
	$end_date = $end_year.'-'.$end_month.'-'.$end_day;
}		
		
//class="page-break"
//
$last_runno = 0;
$all_withdrawal = 0;
$all_deposit = 0;
$all_balance = 0;		
// if(!empty($data)){ 
// 	foreach(@$data AS $page=>$data_row){
	?>
		
		<div style="width: 1000px;" class="page-break">
			<div class="panel panel-body" style="padding-top:10px !important;min-height: 1200px;">
				<table style="width: 100%;">
				<?php 
					
					// if(@$page == 1){
				?>	
					<tr>
						<td style="width:100px;vertical-align: top;">
							
						</td>
						<td class="text-center">
							<img src="<?php echo base_url(PROJECTPATH.'/assets/images/coop_profile/'.$_SESSION['COOP_IMG']); ?>" alt="Logo" style="height: 80px;" />	
							<h3 class="title_view"><?php echo @$_SESSION['COOP_NAME'];?></h3>
							<h3 class="title_view">รายงานสรุป<?php echo @$type_name; ?></h3>
							<?php if(@$_GET['apply_type_id'] != ''){?>
							<h3 class="title_view">ประเภทสมัครสมาชิก <?php echo @$arr_mem_apply_type[@$_GET['apply_type_id']]; ?></h3>
							<?php } ?>
							<h3 class="title_view">
								<?php 
									echo (@$_GET['start_date'] == @$_GET['end_date'])?"":"ตั้งแต่";
									echo "วันที่ ".$this->center_function->ConvertToThaiDate($start_date);
									echo (@$_GET['start_date'] == @$_GET['end_date'] || @$_GET['end_date'] == '')?"":"  ถึงวันที่  ".$this->center_function->ConvertToThaiDate($end_date);
								?>
							</h3>
						 </td>
						 <td style="width:100px;vertical-align: top;" class="text-right">
							<a class="no_print" onclick="window.print();"><button class="btn btn-perview btn-after-input" type="button"><span class="icon icon-print" aria-hidden="true"></span></button></a>
							<?php
								$get_param = '?';
								foreach(@$_GET as $key => $value){
									//if($key != 'month' && $key != 'year' && $value != ''){
										$get_param .= $key.'='.$value.'&';
									//}
								}
								$get_param = substr($get_param,0,-1);
							?>
							<!-- <a class="no_print"  target="_blank" href="<?php echo base_url(PROJECTPATH.'/report_deposit_data/coop_report_gov_bank_excel'.$get_param); ?>"> -->
							<a class="no_print"  target="_blank" href="<?php echo base_url('/report_deposit_data/coop_report_gov_bank_excel'.$get_param); ?>">
								<button class="btn btn-perview btn-after-input" type="button"><span class="icon icon icon-file-excel-o" aria-hidden="true"></span></button>
							</a>
						</td>
					</tr>  					
				<?php 
					// }else{
				?>
					<!-- <tr>
						<td colspan="3" style="text-align: left;">&nbsp;</td>
					</tr> -->
				<?php
					// } 
				?>
					
					<tr>
						<td colspan="3" style="text-align: left;">
							<span class="title_view">วันที่ <?php echo $this->center_function->ConvertToThaiDate(@date('Y-m-d'),1,0);?></span>				
							<span class="title_view">   เวลา <?php echo date('H:i:s');?></span>	
						</td>
					</tr> 
					<tr>
						<td colspan="3" style="text-align: left;">
							<span class="title_view">หน้าที่ <?php echo @$page.'/'.@$page_all;?></span><br>						
						</td>
					</tr>
				</table>
			
				<table class="table table-view table-center">
					<thead> 
						<tr>
							<th style="width: 40px;vertical-align: middle;">ลำดับ</th>
							<th style="width: 100px;vertical-align: middle;">เลขที่บัญชี</th>
							<th style="width: 60px;vertical-align: middle;">ชื่อ-นามสกุล</th>
							<th style="width: 80px;vertical-align: middle;">รหัสสมาชิก</th>
							<th style="width: 80px;vertical-align: middle;">ยอดเงิน</th>
						</tr>  
					</thead>
					<tbody>
					
					<?php	
						$runno = $last_runno;
						if(!empty($data)){
							foreach(@$data as $key => $row){
								$runno++;
					?>
							<tr> 
							  <td style="text-align: center;vertical-align: top;"><?php echo $row['runno']; ?></td>
							  <td style="text-align: center;vertical-align: top;">
							  	<?php echo @$this->center_function->format_account_number($row['account_id']); ?>
							  </td>
							  <td style="text-align: left;vertical-align: top;"><?php echo $row['member_name'];?></td>						 
							  <td style="text-align: center;vertical-align: top;"><?php echo $row['member_id'];?></td>						 
							  <td style="text-align: right;vertical-align: top;"><?php echo number_format($row['transaction_balance'],2);?></td>
							</tr>										
					
					<?php									
							}
						}
						$last_runno = $runno;
						if (!empty($sum_transaction_balance)) {
					?>
							<tr> 
							  <td colspan="4" style="text-align: center;vertical-align: top;">รวม</td>
							  <td style="text-align: right;vertical-align: top;"><?php echo number_format($sum_transaction_balance,2);?></td>
							</tr>	
					<?php
						}
					?> 						
					</tbody>    
				</table>
				<?php echo @$paging ?>
			</div>
		</div>
<?php 
// 	}
// } 
?>