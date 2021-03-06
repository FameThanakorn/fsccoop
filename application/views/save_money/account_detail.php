<div class="layout-content">
    <div class="layout-content-body">
<style>
	.border1 { border: solid 1px #ccc; padding: 0 15px; }
	.mem_pic { margin-top: -1em;float: right; width: 150px; }
	.mem_pic img { width: 100%; border: solid 1px #ccc; }
	.mem_pic button { display: block; width: 100%; }
	.modal-backdrop.in{	
		opacity: 0;
	}
	.modal-backdrop {
		position: relative;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: 1040;
		background-color: #000;
	}
	.font-normal{
		font-weight:normal;
	}
	.font-normal2{
		font-weight:bold;
		font-size:20px;
	}
	.font-normal3{
		font-weight:bold;
		font-size:16px;
	}
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}
	.btn_deposit {
		margin-right: 5px;
	}
	.alert-success {
		background-color: #DBF6D3;
		border-color: #AED4A5;
		color: #569745;
		font-size:14px;
	}
	.alert-danger {
		background-color: #F2DEDE;
		border-color: #e0b1b8;
		color: #B94A48;
	}
	.alert {
		border-radius: 0;
		-webkit-border-radius: 0;
		box-shadow: 0 1px 2px rgba(0,0,0,0.11);
		display: table;
		width: 100%;
	}

	.modal-header-withdrawal {
		padding:9px 15px;
		border:1px solid #d50000;
		background-color: #d50000;
		color: #fff;
		-webkit-border-top-left-radius: 5px;
		-webkit-border-top-right-radius: 5px;
		-moz-border-radius-topleft: 5px;
		-moz-border-radius-topright: 5px;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
	}

	.modal-dialog-account {
		margin:0 auto;
		margin-top: 10%;
	}

	.modal-dialog-print {
		margin:0 auto;
		margin-top: 15%;
		width: 350px;
	}

	.center {
		text-align: center;
	}
	th, td {
		text-align:center;
	}

	a {
		text-decoration: none !important;
	}

	a:hover {
		color: #075580;
	}

	a:active {
		color: #757575;
	}

	.bg-table {
		background-color: #0288d1;
		border-color: #0288d1;
		color: #fff;
	}

	.modal-dialog-delete {
		margin:0 auto;
		width: 350px;
		margin-top: 8%;
	}

	.modal-dialog-add {
	   margin:0 auto;
	   width: 60%;
	   margin-top: 5%;
	 }	
	 #add_account{
		 z-index:5100 !important;
	 }
	#search_member_add_modal{
		z-index:5200 !important;
	}
    #cheque_deposit {
        margin: inherit;
    }

    #cheque_deposit .active{
        width: 109%;
        margin: 4px -60px 4px -11px;;
    }

    .cheque_content{
        border: unset;
        border-radius: unset;
        padding: unset;
    }

    .cheque_content.active{

        border: 1px solid #cccccc;
        border-radius: 4px;
        padding: 8px 16px 8px 9px;
    }

    .cheque {
        display: none;
    }

    .cheque.active{
        display: inherit;
    }

</style>
<h1 style="margin-bottom: 0;margin-top: 0">ข้อมูลบัญชีเงินฝาก</h1>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-l-r-0">
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 padding-l-r-0">
		<?php $this->load->view('breadcrumb'); ?>
	</div>

	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 padding-l-r-0">
			<?php if(!empty($account_id) && $row_memberall['account_status']!='1'){ ?>
				<a class="link-line-none" data-toggle="modal" data-target="#updateCover">
					<button class="btn btn-primary btn-lg bt-add" type="button" style="margin-right:5px;">
						<span class="icon icon-plus-circle"></span>
						เพิ่มเล่มใหม่
					</button>
				</a>
				<a class="link-line-none" href="book_bank_cover_pdf?account_id=<?php echo $row_memberall['account_id'] ?>" target="_blank">
					<button class="btn btn-primary btn-lg bt-add" type="button" style="margin-right:5px;">
						<span class="icon icon-print"></span>
						พิมพ์หน้าปกสมุดบัญชี
					</button>
				</a>
			<?php } ?>

		<a class="link-line-none" href="<?php echo base_url(PROJECTPATH.'/save_money')?>">
			<button class="btn btn-primary btn-lg bt-add" type="button" style="margin-right:5px;">
			<i class="fa fa-credit-card" aria-hidden="true"></i>
				จัดการบัญชี
			</button>
		</a>

		<a class="link-line-none" href="#" onclick="add_account('<?=@$_GET['account_id']?>','<?=$row_member['member_id']?>')">
			<button class="btn btn-primary btn-lg bt-add" type="button" style="margin-right:5px;">
			<i class="fa fa-edit" aria-hidden="true"></i>
				แก้ไขข้อมูลบัญชี
			</button>
		</a>

		

	</div>

</div>
	<div class="panel panel-body col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
	<form data-toggle="validator" novalidate="novalidate" method="post" class="g24 form form-horizontal">
		<div class="row m-t-1 m-b-2">
			<input type = 'hidden' name = 'type_add' value ='addremember'>
		<div class="g24-col-sm-24">

		<div class="form-group">
			<div class=" g24-col-sm-24">			
				<label class="g24-col-sm-2 control-label font-normal" for="form-control-2">เลขที่บัญชี</label>		
					<?php $var_account_id = $row_memberall['account_id']; ?>
				<div class="g24-col-sm-6">
					<!--div class="input-group"-->
						<input type="hidden" class="form-control" id="sequester_status" name='sequester_status' value="<?php echo @$row_memberall['sequester_status'] ?>">
						<input type="hidden" class="form-control" id="sequester_amount" name='sequester_amount' value="<?php echo number_format(@$row_memberall['sequester_amount'],0); ?>">
						<input type="hidden" class="form-control" id="deduct_guarantee_id" name='deduct_guarantee_id' value="<?php echo @$row_memberall['deduct_guarantee_id'] ?>">
						<input id="id_account" data-value1="<?php echo $row_memberall['account_id'] ?>" class="form-control " type="text" name = 'id_account' value="<?php echo $this->center_function->format_account_number($row_memberall['account_id']); ?>"  readonly>
						<!--span class="input-group-btn">
							<a data-toggle="modal" data-target="#myModalAcc" id="test" class="" href="#">
								<button id="" type="button" class="btn btn-info btn-search"><span class="icon icon-search"></span></button>
							</a>
						</span-->	
					<!--/div-->
				</div>
				
				<label class="g24-col-sm-3 control-label font-normal" for="form-control-2">ชื่อบัญชี</label>
				<div class="g24-col-sm-6">
					<input class="form-control" type="text" value="<?php echo $row_memberall['account_name'] ?>" readonly>
				</div>
				<label class="g24-col-sm-2 control-label font-normal" for="form-control-2">วันที่เปิดบัญชี</label>
				<div class="g24-col-sm-4">
						<input class="form-control" type="text" value="<?php echo $this->center_function->ConvertToThaiDate($row_memberall['created'],'1','0') ?>" readonly>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class=" g24-col-sm-24">
					<label class="g24-col-sm-2 control-label font-normal" for="form-control-2"> รหัสสมาชิก</label>			
					<div class="g24-col-sm-6">
						<input class="form-control" type="text" value="<?php echo $row_member['member_id']; ?>" readonly>
					</div>
					<div class="g24-col-sm-1">
					</div>
					<label class="g24-col-sm-2 control-label font-normal" for="form-control-2">ชื่อ - สกุล</label>
					<div class="g24-col-sm-6">
						<input class="form-control" type="text" value="<?php echo $row_member['firstname_th'].' '.$row_member['lastname_th'] ?>" readonly>
					</div>	
					<label class="g24-col-sm-2 control-label font-normal" for="form-control-2">ยอดรวมสุทธิ</label>
					<div class="g24-col-sm-4">
						<input class="form-control" type="hidden" id="total_amount_account" value="<?php echo number_format($last_transaction['transaction_balance'],2); ?>" readonly>
						<input class="form-control" type="text" value="<?php echo number_format($last_transaction['transaction_balance'],2)." บาท" ?>" readonly>
					</div>
				</div>			
			</div>	
		</div>

			<div class=" g24-col-sm-24">
				<label class="g24-col-sm-2 control-label font-normal" for="form-control-2"> ประเภทบัญชี </label>			
				<div class="g24-col-sm-6">
					<input class="form-control" type="text" value="<?php echo $row_memberall['type_name']; ?>" readonly>
					<input class="form-control" type="hidden" id="type_id" name="type_id" value="<?php echo $row_memberall['type_id']; ?>">
				</div>
				<!--label class="g24-col-sm-3 control-label font-normal" for="form-control-2"> หมายเลขบัตร ATM </label>			
				<div class="g24-col-sm-6">
					<input class="form-control" type="text" value="<?php echo @$row_memberall['atm_number']; ?>" readonly>
				</div-->		
				<?php if($row_memberall['account_status']!='1'){ ?>
				<label class="g24-col-sm-3 control-label font-normal" for="form-control-2">ทำรายการ</label>
				<div class="g24-col-sm-3">
					<button type="button" class="btn btn-info btn_deposit" data-toggle="modal" data-target="#Deposit" data-account="<?php echo $row_memberall['account_id'] ?>" <?php echo (empty($row_memberall['account_name'])) ? 'disabled="disabled"' : '' ;?>> <span class="icon icon-arrow-circle-down"></span> ฝากเงิน </button>
					
				</div>
				
				<div class="g24-col-sm-2">
					<!--
					<button type="button" class="btn btn-danger btn_deposit" style="margin-left: 20px;" data-toggle="modal" data-target="#Withdrawal" data-account="<?php echo $row_memberall['account_id'] ?>" <?php echo (empty($row_memberall['account_name'])) ? 'disabled="disabled"' : '' ;?>> <span class="icon icon-arrow-circle-up"></span>   ถอนเงิน </button>
					-->
					<?php if($this->center_function->withdraw_permission($row_memberall['account_id'])){ ?>
					<button type="button" class="btn btn-danger btn_deposit" id="btn_withdrawal" style="margin-left: 20px;" data-toggle="" data-target="" data-account="<?php echo $row_memberall['account_id'] ?>" <?php echo (empty($row_memberall['account_name'])) ? 'disabled="disabled"' : '' ;?>> <span class="icon icon-arrow-circle-up"></span>   ถอนเงิน </button>
					<?php } ?>
				</div>
				<?php } ?>
						
				<?php if($row_memberall['account_status']!='1'){ ?>
				<label class="g24-col-sm-3 control-label font-normal" for="form-control-2">จัดการ</label>
				<div class="g24-col-sm-5">
					<button type="button" class="btn btn-info btn_deposit" data-toggle="modal" data-target="#update_transaction" data-account="<?php echo $row_memberall['account_id'] ?>" <?php echo (empty($row_memberall['account_name'])) ? 'disabled="disabled"' : '' ;?>> <span class="icon icon-arrow-circle-down"></span> อัพเดท ST </button>
				</div>
				<?php } ?>
			</div>
			
		</div>
	</form>
	
		<div class="g24-col-sm-24 m-t-1">
			<div class="bs-example" data-example-id="striped-table">
				<table class="table table-bordered table-striped table-center" id="table">	
					<thead>
						<tr class="bg-primary">
							<th class = "font-normal" style="width: 5%">ลำดับ</th>
							<th class = "font-normal" style="width: 15%">วัน/เดือน/ปี</th>
							<th class = "font-normal" >รายการ</th>
							<th class = "font-normal" >ถอน</th> 
							<th class = "font-normal" >ฝาก</th> 
							<th class = "font-normal" >คงเหลือ</th> 
							<th class = "font-normal" >ผู้ทำรายการ</th>
							<th class = "font-normal r_hidden" style="width: 14%">สถานะ</th>
							<th class = "font-normal r_hidden" style="width: 8%">จัดการ</th>
							<th class = "font-normal r_hidden" >
								<label class="custom-control custom-control-primary custom-checkbox " style="">
									<input type="checkbox" class="custom-control-input" id="tran_check_all" name="" value="">
									<span class="custom-control-indicator" ></span>
									<span class="custom-control-label">เลือกพิมพ์</span>
								</label>
							</th>
							<?php
								if($_SESSION['USER_ID']==1){
									?>
										<th>
											เลือกลบ
										</th>
									<?php
								}
							?>
						</tr> 
					</thead>
					<tbody>
						<?php if (count($data) > 0){ ?>
						<?php 
							$i=0;
							foreach($data as $key => $row) { $i++;?>
								<tr>
									<!-- <td><?php echo $num_arr[$row['transaction_id']]; ?></td> -->
									<td><?php echo $i; ?></td>
									<td><?php echo $this->center_function->ConvertToThaiDate($row['transaction_time']); ?></td>
									<td><?php echo $row['transaction_list']; ?></td>
									<td><?php echo empty($row['transaction_withdrawal']) ? "" : number_format($row['transaction_withdrawal'],2); ?></td>
									<td><?php echo empty($row['transaction_deposit']) ? "" : number_format($row['transaction_deposit'],2); ?></td>
									<td><?php echo number_format($row['transaction_balance'],2); ?></td>
									<td>
										<?php 
											if($row['user_name']!=''){
												echo $row['user_name'];
											}else if($row['member_id_atm'] != ''){
												echo "ATM";
											}else{
												echo "N/A";
											}
										?>
									</td>
									<td class="status_label r_hidden"><?php echo $row['print_status']=='1'?'พิมพ์สมุดบัญชีแล้ว':'ยังไม่ได้พิมพ์สมุดบัญชี'; ?></td>
									<td class="r_hidden">
										<?php if($row['print_status']=='1'){ $display = ''; }else{ $display = 'display:none;'; } ?>
											<a style="cursor:pointer;<?php echo $display; ?>" class="cancel_link icon icon-remove" onclick="change_status('<?php echo $row['transaction_id']; ?>','<?php echo $row_memberall['account_id']; ?>')" title="ยกเลิกการพิมพ์รายการ"></a>
											<?php if($row['transaction_list']!='ERR' && $row['cancel_status']!='1' && $cancel_transaction_display ==''){ ?>
											<?=($row['print_status']=='1') ? " | " : ""?>
											<a style="cursor:pointer;" class="icon icon-ban" onclick="cancel_transaction('<?php echo $row['transaction_id']; ?>')" title="ยกเลิกรายการ"></a>
											<?php } ?>
											
									</td>
									<td class="r_hidden">
										<label class="custom-control custom-control-primary custom-checkbox " style="">
											<input type="checkbox" class="custom-control-input tran_id_item select_print_slip" data-line="<?php echo $i; ?>" id="" name="tran_ids[]" value="<?php echo $row['transaction_id'];?>">
											<span class="custom-control-indicator" style="height: 20px; width: 20px;"></span>
										</label>
									</td>
									<?php
										if($_SESSION['USER_ID']==1){
											?>
												<th>
													<a href="<?=base_url('save_money/remove_transaction/'.$row['transaction_id'].'/'.@$_GET['account_id'])?>" onclick="return confirm('ยืนยันเพื่อลบ')" class="btn btn-danger btn-md">ลบ</a>
												</th>
											<?php
										}
									?>
								</tr>
							<?php } ?>
							<?php } else { ?>
							<tr>
								<td colspan = '10' align = 'center'> ยังไม่มีรายการใดๆ </td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
				
			</div>
			
			<div id="page_wrap" style="text-align:center;">
				<?php echo $paging ?>
			</div>	
			<input type="hidden" id="transaction_count" value="<?php echo $i; ?>">
			<input type="hidden" id="min_first_deposit" value="<?php echo $min_first_deposit; ?>">
			

		<?php if($row_memberall['account_id']){ ?>
			<div class="row m-t-1 center">
					<!-- <?php if($row_memberall['print_number_point_now']=='' || $row_memberall['print_number_point_now']=='0' || $show_conclude_checkbox=='1'){ ?>
					<button class="btn btn-primary btn-width-auto" type="button" data-toggle="modal" data-target="#printAccount"  data-account="<?php echo $row_memberall['account_id']?>">
						<span class="icon icon-print"></span>
						พิมพ์สมุดบัญชี				
					</button>
					<?php }else{ ?>
					<a class="btn btn-primary btn-width-auto" href="<?php echo base_url(PROJECTPATH.'/save_money/book_bank_page_pdf?account_id='.$row_memberall['account_id'].'&number='.$row_memberall['print_number_point_now']); ?>" onclick="change_after_print()" target="_blank" style="cursor:pointer;">
						<span class="icon icon-print"></span>
						พิมพ์สมุดบัญชี				
					</a>
					<?php } ?> -->
					<a href="<?=base_url('Save_money/print_slip_deposit/')?>" target="_blank" id="print_slip">
						<button class="btn"><i class="fa fa-print" aria-hidden="true"></i> พิมพ์สลิป</button>
					</a>
					<button class="btn btn-primary btn-width-auto" type="button" data-toggle="modal" data-target="#modal_line_start" data-account="<?php echo $row_memberall['account_id']?>">
						<span class="icon icon-print"></span>
						พิมพ์สมุดบัญชี				
					</button>
					<a href="<?=base_url('Save_money/print_statement/').@$_GET['account_id']?>" target="_blank">
						<button class="btn"><i class="fa fa-print" aria-hidden="true"></i> พิมพ์ st</button>
					</a>
					<!-- <div class="col-md-6 text-right">
														
													</div>
													<br><br> -->
					
			</div>
			<?php } ?>
</div>
	</div>
</div>

<!-- Deposit -->
<div id="Deposit" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog modal-dialog-account">
		<div class="modal-content">
			<div class="modal-header modal-header-deposit">
				<h2 class="modal-title">ฝากเงิน</h2>
			</div>
			<div class="modal-body">
				<form action="?" method="POST">
					<input type="hidden" name="do" value="deposit">
					<input type="hidden" name="account_id"  value="" id="account_id">
					<input type="hidden" name="transaction_list"  value="<?php echo $row_deposit['money_type_name_short']; ?>" id="transaction_list">
					<div class="g24-col-sm-24">
						<div class="form-group">
							<label for="money" class="control-label g24-col-sm-6">จำนวนเงิน</label>
							<div class="g24-col-sm-11">
								<input type="text" name="money" class="form-control m-b-1" value="" id="money_deposit" onkeyup="format_the_number(this)">
								<p id="alert" style="color:red;margin-top:10px;display:none;" >กรุณากรอกจำนวนเงิน</p>
							</div>
							<label class="control-label g24-col-sm-4">&nbsp;</label>
						</div>
					</div>
					<div class="g24-col-sm-24">
						<div class="form-group">
							<label for="money" class="control-label g24-col-sm-6">การรับเงิน</label>
							<div class="g24-col-sm-14" style="margin-bottom: 5px;padding-top: 5px;">
								<div style="border: 1px solid #d6d6d6;border-radius: 4px;" id="sec_have_a_book">
									<input type="radio" id="pay_type_deposit_0" name="pay_type" value='0' onclick="on_cash_deposit(true)" checked> เงินสด 
									<div class="row" style="margin-left: 0px;" id="display_have_a_book">
										<div class="col-sm-4"><span>สมุดเงินฝาก</span></div>
										<div class="col-sm-3"><input type="radio" id="pay_type_deposit_0_1" name="have_a_book" value='CD' checked> มี </div>
										<div class="col-sm-3"><input type="radio" id="pay_type_deposit_0_2" name="have_a_book" value='DEN'> ไม่มี </div>
									</div>
								</div>
								<input type="radio" id="pay_type_deposit_1" name="pay_type" value='1' onclick="on_cash_deposit(false)"> โอนเงิน
								<br>
								<input type="radio" id="pay_type_deposit_2" name="pay_type" value='2' onclick="on_cash_deposit(false)"> เงินปันผลเฉลี่ยคืน/เงินของขวัญ
                                <br>
                                <div id="cheque_deposit">
                                    <div class="cheque_content">
                                        <input type="radio" id="pay_type_deposit_3" name="pay_type" value="3" onclick="on_cash_deposit(false)"> เช็คเงินสด
                                        <div class="row cheque">
                                            <div class="g24-col-sm-24">
                                                <div class="form-group">
                                                    <label class="control-label g24-col-sm-8" for="cheque_number">หมายเลขเช็ค :</label>
                                                    <input class="form-control g24-col-sm-16" name="cheque_number" id="cheque_number" placeholder="ระบุหมายเลขเช็ค"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <input type="radio" id="pay_type_deposit_4" name="pay_type" value="4" onclick="on_cash_deposit(false)"> ดอกเบี้ย
							</div>
							<label class="control-label g24-col-sm-4">&nbsp;</label>
						</div>
						<div class="form-group">
							<label for="money" class="control-label g24-col-sm-6"></label>
							<div class="g24-col-sm-5" style="margin-bottom: 5px;padding-top: 5px;">
								<input type="checkbox" name="is_custom_date_transaction" id="is_custom_date_transaction">
								กำหนดวันที่ 
							</div>
							<div class="g24-col-sm-13" style="margin-bottom: 5px;padding-top: 5px;">
								<div class="input-with-icon g24-col-sm-16">
									<div class="form-group">
										<input id="date_transaction_tmp" name="date_transaction_tmp" class="form-control m-b-1" style="padding-left: 50px;" type="text" data-date-language="th-th"  title="กรุณาป้อน วันที่" disabled>
										<span class="icon icon-calendar input-icon m-f-1"></span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="g24-col-sm-24 text-center m-t-2">
								<button class="btn btn-primary"  type="button" id="depo">ฝากเงิน</button>
								<button class="btn btn-default bt_close" data-dismiss="modal" type="button">ยกเลิก </button>								
							</div>
						</div>
					</div>
				</form>
				<div>&nbsp;</div>
			</div>
		</div>
	</div>
</div>

<!-- Deposit Confirm -->
<div class="modal fade" id="alertDeposit"  tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-account">
      <div class="modal-content">
        <div class="modal-header modal-header-deposit">
          <button type="button" class="close" data-dismiss="modal"></button>
          <h2 class="modal-title">ยืนยันการฝากเงิน</h2>
        </div>
        <div class="modal-body center">
		  <p><span class="icon icon-arrow-circle-o-down" style="font-size:75px;"></span></p>
          <p style="font-size:18px;">ฝากเงินจำนวน <span id="deposit_text"> </span>  <span id="deposit_account"> </span>  บาท</p>
		  <p id="custom_date_transaction_display"></p>
        </div>
        <div class="modal-footer center">
		<form action="<?php echo base_url(PROJECTPATH.'/save_money/save_transaction'); ?>" method="POST">
				<input type="hidden" name="do" value="deposit">
				<input type="hidden" name="account_id"  value="" id="account_id">
				<input type="hidden" name="money"  value="" id="money">
				<input type="hidden" name="pay_type"  value="" id="pay_type">
				<input type="hidden" name="have_a_book_acc"  value="CD" id="have_a_book_acc">
				<input type="hidden" name="transaction_list"  value="<?php echo $row_deposit['money_type_name_short']; ?>" id="transaction_list">
				<input type="hidden" name="cheque_number" id="cheque_number">
				<input type="hidden" name="date_transaction" id="date_transaction">
				<input type="hidden" name="custom_by_user_id" id="custom_by_user_id">
		  <button class="btn btn-info" type="submit">ยืนยันฝากเงิน</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
		</form>
        </div>
      </div>
    </div>
</div>

<!-- Withdrawal -->	
<div id="Withdrawal" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog modal-dialog-account">
		<div class="modal-content">
			<div class="modal-header modal-header-withdrawal">
				<h2 class="modal-title">ถอนเงิน</h2>
			</div>
			<div class="modal-body" style="height: 285px;">
				<form action="?" method="POST">
					<input type="hidden" name="do" value="withdrawal">
					<input type="hidden" name="account_id"  value="" id="account_id">
					<input type="hidden" name="transaction_list"  value="<?php echo $row_with['money_type_name_short']; ?>" id="transaction_list">
					<!--
					<div class="form-group">
						<label for="money" class="form-control-label">จำนวนเงิน</label>
						<input type="number" name="money" class="form-control" value="" id="money_withdrawal">
						<p id="alert" style="color:red;margin-top:10px;display:none;" >กรุณาใส่จำนวนเงินด้วยนะครับ</p>
					</div>
					-->
					<div class="g24-col-sm-24">
						<div class="form-group">
							<label for="money" class="control-label g24-col-sm-6">จำนวนเงิน </label>
							<div class="g24-col-sm-14">
								<input type="text" name="money" class="form-control m-b-1" value="<?php echo $type_fee=='3'?number_format($fix_withdrawal_amount,2):''; ?>" id="money_withdrawal" onkeyup="format_the_number(this)">
								<input type="hidden" id="fix_withdrawal_status" value="<?php echo @$fix_withdrawal_status; ?>">
								<input type="hidden" id="staus_close_principal" value="<?php echo @$staus_close_principal; ?>">
								
								<p id="alert" style="color:red;margin-top:10px;display:none;" >กรุณาใส่จำนวนเงินด้วยนะครับ</p>
							</div>
							<label class="control-label g24-col-sm-4">&nbsp;</label>
						</div>
						<div class="form-group">
							<label for="commission_fee" class="control-label g24-col-sm-6">ค่าดำเนินการอื่นๆ</label>
							<div class="g24-col-sm-14">
								<input type="text" name="commission_fee" class="form-control m-b-1" value="" id="commission_fee" disabled>
							</div>
							<label class="control-label g24-col-sm-4">&nbsp;</label>
						</div>
						<div class="form-group">
							<label for="total_amount" class="control-label g24-col-sm-6">เงินที่จะได้รับ</label>
							<div class="g24-col-sm-14">
								<input type="text" name="total_amount" class="form-control m-b-1" value="<?php echo $type_fee=='3'?number_format($fix_withdrawal_amount,2):''; ?>" id="total_amount" disabled>
							</div>
							<label class="control-label g24-col-sm-4">&nbsp;</label>
						</div>
						<div class="form-group">
							<label for="total_amount" class="control-label g24-col-sm-6">การรับเงิน</label>
							<div class="g24-col-sm-14" style="margin-bottom: 5px;padding-top: 5px;">
								<input type="radio" value="0" name="pay_type" id="pay_type_withdraw_0" checked> เงินสด 
								<span style="padding-left: 15px;"></span>
								<input type="radio" value="1" name="pay_type" id="pay_type_withdraw_1"> โอนเงิน
							</div>
							<label class="control-label g24-col-sm-4">&nbsp;</label>
						</div>
						<div class="form-group">
							<label for="money" class="control-label g24-col-sm-6"></label>
							<div class="g24-col-sm-5" style="margin-bottom: 5px;padding-top: 5px;">
								<input type="checkbox" name="is_custom_date_transaction" id="is_custom_date_transaction_wd">
								กำหนดวันที่
							</div>
							<div class="g24-col-sm-13" style="margin-bottom: 5px;padding-top: 5px;">
								<div class="input-with-icon g24-col-sm-16">
									<div class="form-group">
										<input id="date_transaction_wd_tmp" name="date_transaction_tmp" class="form-control m-b-1" style="padding-left: 50px;" type="text" data-date-language="th-th"  title="กรุณาป้อน วันที่" disabled>
										<span class="icon icon-calendar input-icon m-f-1"></span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="g24-col-sm-24 text-center m-t-2">
								<button class="btn btn-danger"  type="button" id="Wd">ถอนเงิน</button>
								<button class="btn btn-default bt_close" data-dismiss="modal" type="button">ยกเลิก </button>								
							</div>
						</div>
					</div>
			</div>
			<!--<div class="modal-footer center">
				<button class="btn btn-danger"  type="button" id="Wd">ถอนเงิน</button>
				<button class="btn btn-default" data-dismiss="modal" type="button">ยกเลิก </button>
			</div>-->
			</form>
		</div>
	</div>
</div>


<!-- Withdrawal Confirm -->
<div class="modal fade" id="alertWithdrawal"  tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-account">
      <div class="modal-content">
        <div class="modal-header modal-header-withdrawal">
          <button type="button" class="close" data-dismiss="modal"></button>
          <h2 class="modal-title">ยืนยันการถอนเงิน</h2>
        </div>
        <div class="modal-body center">
		  <p><span class="icon icon-arrow-circle-o-up" style="font-size:75px;"></span></p>
          <p style="font-size:18px;">ถอนเงินจำนวน <span id="deposit_text"> </span>  <span id="deposit_account"> </span>  บาท</p>
		  <p id="custom_date_transaction_wd_display"></p>
        </div>
        <div class="modal-footer center">
		<form action="<?php echo base_url(PROJECTPATH.'/save_money/save_transaction'); ?>" method="POST">
				<input type="hidden" name="do" value="withdrawal">
				<input type="hidden" name="account_id"  value="" id="account_id">
				<input type="hidden" name="money"  value="" id="money">
				<input type="hidden" name="commission_fee"  value="" id="commission_fee_c">
				<input type="hidden" name="total_amount"  value="" id="total_amount_c">
				<input type="hidden" name="pay_type"  value="" id="pay_type_c">
				<input type="hidden" name="transaction_list"  value="<?php echo $row_with['money_type_name_short']; ?>" id="transaction_list">
				<input type="hidden" name="fix_withdrawal_status"  value="" id="fix_withdrawal_status_c">
				<input type="hidden" name="custom_by_user_id" class="custom_by_user_id"  value="">
				<input type="hidden" name="date_transaction" id="date_transaction_wd">
		  <button class="btn btn-danger" type="submit">ยืนยันถอนเงิน</button>
          <button type="button" class="btn btn-default bt_close" data-dismiss="modal">ยกเลิก</button>
		</form>
        </div>
      </div>
    </div>
</div>
<div id="updateCover" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog modal-dialog-print">
		<div class="modal-content">
			<div class="modal-header modal-header-deposit">
				<h2 class="modal-title">เพิ่มเล่มใหม่</h2>
			</div>
			<div class="modal-body">
			<!--form action="print_account.php" method="GET" class="form-inline" target="_blank"-->
			<form action="<?php echo base_url(PROJECTPATH.'/save_money/save_transaction'); ?>" method="POST" class="form-inline">
					<div class="form-group">
						<label for="money" class="form-control-label" style="margin-right:20px;">เล่มที่ </label>
						<input type="number" name="book_number" class="form-control" value="" id="book_number">
						<input type="hidden" name="do" class="form-control" value="update_cover">
						<input type="hidden" name="account_id" id="account_id" value="<?php echo $row_memberall['account_id']; ?>">
						<p id="alert" style="color:red;margin-top:10px;display:none;" >กรุณาใส่เลขที่เล่ม</p>
					</div>
			</div>
			<div class="modal-footer center">
				<button class="btn btn-info" type="submit"> ยืนยัน </button>
				<button class="btn btn-default" data-dismiss="modal" type="button">ปิดหน้าต่าง</button>
			</div>
			</form>
		</div>
	</div>
</div>
<div id="printAccount" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog modal-dialog-print">
		<div class="modal-content">
			<div class="modal-header modal-header-deposit">
				<h2 class="modal-title">พิมพ์สมุดบัญชี</h2>
			</div>
			<div class="modal-body">
			<!--form action="print_account.php" method="GET" class="form-inline" target="_blank"-->
			<form action="<?php echo base_url(PROJECTPATH.'/save_money/book_bank_page_pdf'); ?>" method="GET" class="form-inline" target="_blank">
			<input type="hidden" name="account_id" id="account_id">
				<div class="form-group">
					<label class="form-control-label" style="margin-right:20px;">ลำดับที่ </label>
					<input type="number" name="number" class="form-control" value="<?php echo @$row_memberall['print_number_point_now']!=''?$row_memberall['print_number_point_now']:'1'; ?>" id="number">
					<p id="alert" style="color:red;margin-top:10px;display:none;" >กรุณาใส่จำนวนเงินด้วยนะครับ</p>
				</div>
				<?php if($show_conclude_checkbox=='1'){ ?>
						<div class="row">
							<div class="col-sm-12">
								<label class="custom-control custom-control-primary custom-checkbox" style="padding-top: 9px;">
									<input class="custom-control-input" type="checkbox" name="conclude_transaction" value="1"> 
									<span class="custom-control-indicator" style="margin-top: 9px;"></span>
									<span class="custom-control-label">พิมพ์แบบสรุปยอด ( อัพเดทล่าสุดเมื่อ <?php echo $this->center_function->ConvertToThaiDate($last_print_date); ?>)</span>
								</label>
							</div>
							<label class="col-sm-4 control-label" ></label>
						</div>
				<?php } ?>
			</div>
			<div class="modal-footer center">
				<button class="btn btn-info" type="submit" id="print_Account" onclick="change_after_print()"> พิมพ์สมุดบัญชี </button>
				<button class="btn btn-default" data-dismiss="modal" type="button">ปิดหน้าต่าง</button>
			</div>
			</form>
		</div>
	</div>
</div>

<!-- update_transaction -->
<div id="update_transaction" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog modal-dialog-account">
		<div class="modal-content">
			<div class="modal-header modal-header-deposit">
				<h2 class="modal-title">อัพเดทยอดคงเหลือ</h2>
			</div>
			<div class="modal-body">
				<form action="?" method="POST">
					<input type="hidden" name="update_account_id"  value="<?=@$row_memberall['account_id']?>" id="update_account_id">
					<div class="g24-col-sm-24">
						<div class="form-group">
							<label for="money" class="control-label g24-col-sm-7">เลือกวันที่เริ่มการอัพเดท</label>
							<div class="g24-col-sm-5">
								<select name="update_day" id="update_day" class="form-control" required>
								<option value="">เลือกวันที่</option>
									<?php
										for ($i=1; $i <= 31; $i++) { 
											echo "<option value='".sprintf('%02d', $i)."'>".sprintf('%02d', $i)."</option>";
										}
									?>
								</select>
							</div>
							<div class="g24-col-sm-5">
								<select name="update_day" id="update_month" class="form-control" required>
								<option value="">เลือกเดือน</option>
									<?php
										for ($i=1; $i <= 12; $i++) { 
											echo "<option value='".sprintf('%02d', $i)."'>".sprintf('%02d', $i)."</option>";
										}
									?>
								</select>
							</div>
							<div class="g24-col-sm-5">
								<select name="update_day" id="update_year" class="form-control" required>
								<option value="">เลือกปี</option>
									<?php
										for ($i=(date('Y')+543); $i >= (date('Y')+543-10); $i--) { 
											echo "<option value='$i'>$i</option>";
										}
									?>
								</select>
							</div>
							<label class="control-label g24-col-sm-4">&nbsp;</label>
							
						</div>

						<label class="g24-col-sm-24"><i class="fa fa-info"></i> วิธีอัพเดท ให้เลือกวันที่ก่อนหน้า รายการที่ยอดคงเหลือผิด 1 รายการ</label>

						<div class="form-group">
							<div class="g24-col-sm-24 text-center m-t-2">
								<button class="btn btn-primary"  type="button" id="update_confirm">อัพเดท</button>
								<button class="btn btn-default bt_close" data-dismiss="modal" type="button">ยกเลิก </button>								
							</div>
						</div>
					</div>
				</form>
				<div>&nbsp;</div>
			</div>
		</div>
	</div>
</div>


<!--  MODAL MANAGE ACCOUNT-->
<div id="add_account" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog modal-dialog-add">
		<div class="modal-content">
			<div class="modal-header modal-header-info">
				<h2 class="modal-title">บัญชีเงินฝาก</h2>
			</div>
			<div class="modal-body" id="add_account_space">

			</div>
		</div>
	</div>
</div>
<div class="modal modal_in_modal fade" id="search_member_add_modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">ข้อมูลสมาชิก</h4>
			</div>
			<div class="modal-body">
				<div class="input-with-icon">
					<div class="row">
						<div class="col">
							<label class="col-sm-2 control-label">รูปแบบค้นหา</label>
							<div class="col-sm-4">
								<div class="form-group">
									<select id="member_search_list" name="member_search_list"
											class="form-control m-b-1">
										<option value="">เลือกรูปแบบค้นหา</option>
										<option value="member_id">รหัสสมาชิก</option>
										<option value="id_card">หมายเลขบัตรประชาชน</option>
										<option value="firstname_th">ชื่อสมาชิก</option>
										<option value="lastname_th">นามสกุล</option>
									</select>
								</div>
							</div>
							<label class="col-sm-1 control-label" style="white-space: nowrap;"> ค้นหา </label>
							<div class="col-sm-4">
								<div class="form-group">
									<div class="input-group">
										<input id="member_search_text" name="member_search_text"
											   class="form-control m-b-1" type="text"
											   value="<?php echo @$data['id_card']; ?>">
										<span class="input-group-btn">
									<button type="button" id="member_search" class="btn btn-info btn-search"><span
											class="icon icon-search"></span></button>
								</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="bs-example" data-example-id="striped-table">
					<table class="table table-striped">
						<tbody id="result_add">
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="close" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
			</div>
		</div>
	</div>
</div>
<!--  MODAL MANAGE ACCOUNT-->
<!-- MODAL CONFIRM ERR TRANSACTION-->
<div class="modal fade" id="confirm_err1" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ยกเลิกรายการ</h4>
        </div>
        <div class="modal-body">
          	<p>ชื่อผู้มีสิทธิ์อนุมัติ</p>
		  	<input type="text" class="form-control" id="confirm_user">
		  	<p>รหัสผ่าน</p>
		  	<input type="password" class="form-control" id="confirm_pwd">
			  <br>
			<input type="hidden" id="transaction_id_err">
			<div class="row">
				<div class="col-sm-12 text-center">
					<button class="btn btn-info" id="submit_confirm_err">บันทึก</button>
				</div>
			</div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
</div>
<!-- MODAL CONFIRM ERR TRANSACTION-->
<div class="modal fade" id="modal_line_start" role="dialog">
	<input type="hidden" name="line_start" id="line_start" value=""/>
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">กำหนดบรรทัดเริ่มต้นพิมพ์</h4>
        </div>
        <div class="modal-body">
			<select name="select_line_start" id="select_line_start" class="form-control" required>
				<option value="">พิมพ์ตามลำดับ</option>
				<?php
					for ($i=1; $i <= 26; $i++) {
						echo "<option value='".$i."'>".$i."</option>";
					}
				?>
			</select>
        </div>
        <div class="modal-footer text-center">
			<button class="btn btn-info" id="submit_select_line">ตกลง</button>
			<button class="btn btn-default" id="modal_line_start_close_btn">ยกเลิก</button>
        </div>
      </div>
    </div>
</div>
<!--  MODAL custom_date_trasaction_modal-->
<div id="custom_date_trasaction_modal" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">ยืนยันสิทธิ์การทำรายการฝากเงินแบบกำหนดวันที่</h4>
			</div>
			<div class="modal-body">
				<p>ชื่อผู้มีสิทธิ์อนุมัติ</p>
				<input type="text" class="form-control" id="confirm_user_cus">
				<p>รหัสผ่าน</p>
				<input type="password" class="form-control" id="confirm_pwd_cus">
				<br>
				<!-- <input type="hidden" id="transaction_id_err" value=""> -->
				<div class="row">
					<div class="col-sm-12 text-center">
						<button class="btn btn-info" id="submit_confirm_cus">ยืนยัน</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--  MODAL custom_date_trasaction_modal-->

<!--  MODAL custom_date_trasaction_wd_modal-->
<div id="custom_date_trasaction_wd_modal" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">ยืนยันสิทธิ์การทำรายการถอนเงินแบบกำหนดวันที่</h4>
			</div>
			<div class="modal-body">
				<p>ชื่อผู้มีสิทธิ์อนุมัติ</p>
				<input type="text" class="form-control" id="confirm_user_cus_wd">
				<p>รหัสผ่าน</p>
				<input type="password" class="form-control" id="confirm_pwd_cus_wd">
				<br>
				<!-- <input type="hidden" id="transaction_id_err" value=""> -->
				<div class="row">
					<div class="col-sm-12 text-center">
						<button class="btn btn-info" id="submit_confirm_cus_wd">ยืนยัน</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--  MODAL custom_date_trasaction_wd_modal-->

<!--  MODAL CONFIRM WD-->
<div id="confirm_wd_modal" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">ถอนเงิน</h4>
			</div>
			<div class="modal-body">
				<p>ชื่อผู้มีสิทธิ์อนุมัติ</p>
				<input type="text" class="form-control" id="confirm_user_wd">
				<p>รหัสผ่าน</p>
				<input type="password" class="form-control" id="confirm_pwd_wd">
				<br>
				<!-- <input type="hidden" id="transaction_id_err" value=""> -->
				<div class="row">
					<div class="col-sm-12 text-center">
						<button class="btn btn-info" id="submit_confirm_wd">ยืนยัน</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--  MODAL CONFIRM WD-->
<script>
var base_url = $('#base_url').attr('class');
$(function(){

		$("#date_transaction_tmp").datepicker({
			prevText : "ก่อนหน้า",
			nextText: "ถัดไป",
			currentText: "Today",
			changeMonth: true,
			changeYear: true,
			isBuddhist: true,
			monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
			dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
			constrainInput: true,
			dateFormat: "dd/mm/yy",
			yearRange: "c-50:c+10",
			autoclose: true,
		});

		$("#is_custom_date_transaction" ).change(function () {
			console.log("hi", $(this).is(":checked"));
			if($(this).is(":checked")){
				$('#custom_date_trasaction_modal').modal("show");
			}else{
				$('#custom_date_trasaction_modal').modal("hide");
				$("#date_transaction_tmp").prop('disabled', true);
			}
		});

		$("#date_transaction_tmp" ).change(function () {
			console.log("date_transaction_tmp", $(this).val());
			$("#date_transaction").val($(this).val());
			$("#custom_date_transaction_display").html("วันที่ทำรายการ "+$(this).val());
		});

		$("#date_transaction_wd_tmp").datepicker({
			prevText : "ก่อนหน้า",
			nextText: "ถัดไป",
			currentText: "Today",
			changeMonth: true,
			changeYear: true,
			isBuddhist: true,
			monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
			dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
			constrainInput: true,
			dateFormat: "dd/mm/yy",
			yearRange: "c-50:c+10",
			autoclose: true,
		});

		$("#is_custom_date_transaction_wd" ).change(function () {
			console.log("hi", $(this).is(":checked"));
			if($(this).is(":checked")){
				$('#custom_date_trasaction_wd_modal').modal("show");
			}else{
				$('#custom_date_trasaction_wd_modal').modal("hide");
				$("#date_transaction_wd_tmp").prop('disabled', true);
			}
		});

		$("#date_transaction_wd_tmp" ).change(function () {
			console.log("date_transaction_wd_tmp", $(this).val());
			$("#date_transaction_wd").val($(this).val());
			$("#custom_date_transaction_wd_display").html("วันที่ทำรายการ "+$(this).val());
		});

		$("#print_Account" ).click(function(){
			$("#printAccount").modal('toggle').fadeOut();
		});

		$('#printAccount').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget);
			var account = button.data('account');
			var modal = $(this);
			modal.find('.modal-body #account_id').val(account);
		});

		$('#Del').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget);
			var id = button.data('id');
			var modal = $(this);
			modal.find('.modal-body #account_id').val(id);
		});

		$("#book_number" ).change(function () {
			text =  $("#book_number" ).val();
			text1 =  $("#id_account" ).data("value1");
			$("#link").attr("href","report/p-account-pdf.php?account_id="+text1+"&book_num="+text);
		});

		$("#money_deposit").keyup(function() {
			if($.trim($('#money_deposit').val()) == '') {
				$('#Deposit').find('.modal-body #alert').show();
			} else {
				$('#Deposit').find('.modal-body #alert').hide();
			}
		});

		$("#money_withdrawal").keyup(function() {
			if($.trim($('#money_withdrawal').val()) == '') {
				$('#Withdrawal').find('.modal-body #alert').show();
			} else {
				$('#Withdrawal').find('.modal-body #alert').hide();
			}
		});
	
		$("#depo" ).on('click', function (){
			if($.trim($('#money_deposit').val()) == '') {
				$('#Deposit').find('.modal-body #alert').show();
         	} else {
                var check_setting = 'N';
                //เช็คฝาเงินต่ำสุด-สูงสุด
                var money_deposit = removeCommas($('#money_deposit').val());
                var type_id = $("#type_id").val();
                var account_id = ($("#Deposit").find('.modal-body #account_id').val() != "") ? $("#Deposit").find('.modal-body #account_id').val() : $("#id_account").attr("data-value1");

                var pay_type = $('input[name=pay_type]:checked').val();


                    $.ajax({
                        method: 'POST',
                        url: base_url + 'save_money/check_max_min_deposit',
                        data: {
                            money_deposit: money_deposit,
                            type_id: type_id,
                            account_id: account_id
                        },
                        success: function (msg) {
                            if (pay_type !== '4') {
                                msg = 'Y';
                            }
                            if (msg == 'Y') {
                                if ($('#transaction_count').val() == '0') {
                                    if ($('#money_deposit').val() < $('#min_first_deposit').val()) {
                                        swal('การฝากเงินครั้งแรกต้องไม่น้อยกว่า ' + $('#min_first_deposit').val() + ' บาท');
                                    } else {
                                        var check_setting = 'Y';
                                    }
                                } else {
                                    var check_setting = 'Y';
                                }

                                if (check_setting == 'Y') {
                                    $('#Deposit').find('.modal-body #alert').hide();
                                    var account = ($("#Deposit").find('.modal-body #account_id').val() != "") ? $("#Deposit").find('.modal-body #account_id').val() : $("#id_account").attr("data-value1");
                                    var deposit = $("#Deposit").find('.modal-body #money_deposit').val();
                                    if ($("#Deposit").find('.modal-body #pay_type_deposit_0').is(':checked')) {
                                        var pay_type = '0';
                                    } else if ($("#Deposit").find('.modal-body #pay_type_deposit_1').is(':checked')) {
                                        var pay_type = '1';
                                    } else if ($("#Deposit").find('.modal-body #pay_type_deposit_3').is(':checked')) {
                                        var pay_type = '0';
                                    } else if ($("#Deposit").find('.modal-body #pay_type_deposit_4').is(':checked')) {
                                        var pay_type = '3';
                                    } else {
                                        var pay_type = '2';
                                    }
                                    var cheque_number = $("#Deposit input[name='cheque_number']").val();
                                    var transaction_list = $("#Deposit input[name='transaction_list']").val();
                                    var modal = $('#alertDeposit');
                                    modal.find('.modal-body #deposit_text').html(deposit);
                                    modal.find('.modal-footer #account_id').val(account);
                                    modal.find('.modal-footer #money').val(deposit);
                                    modal.find('.modal-footer #pay_type').val(pay_type);
                                    modal.find('.modal-footer #cheque_number').val(cheque_number);
                                    modal.find('.modal-footer #transaction_list').val(transaction_list);
                                    $('#alertDeposit').modal("show");
                                }
                            } else {
                                swal(msg);
                            }
                        }
                    });
            }
		});

		$("#Wd" ).on('click', function (){
			var staus_close_principal = $("#staus_close_principal").val();
			var total_amount = $("#total_amount").val();
			var total_amount_account = $("#total_amount_account").val();
			var total_amount_account_val = removeCommas(total_amount_account);
			var sequester_status = $('#sequester_status').val();
			var sequester_amount = $('#sequester_amount').val();
			var sequester_amount_val = removeCommas(sequester_amount);
			var withdrawal_amount = total_amount_account_val - sequester_amount_val; //ยอดเงินที่ถอนได้

			if(staus_close_principal==1){
				$("#confirm_wd_modal").modal("show");
			}else if($.trim($('#money_withdrawal').val()) == '') {
				$('#Withdrawal').find('.modal-body #alert').show();
         	}else if(parseInt(total_amount) > parseInt(total_amount_account_val)){
				swal("ยอดเงินของท่านมีไม่เพียงพอสำหรับการถอน  \nกรุณากรอกจำนวนเงินไม่เกิน   "+total_amount_account+" บาท");
			}else  if(sequester_status == '2' && parseInt(total_amount) > parseInt(withdrawal_amount)){
				swal("ไม่สามารถถอนเงินได้เนื่องจาก\nบัญชีนี้ถูกอายัดยอดเงิน "+sequester_amount+" บาท \nสามารถถอนเงินได้ "+addCommas(withdrawal_amount)+" บาท");
			} else {			
				check_wd();
			}
		});

		function check_wd(){
			var total_amount = $("#total_amount").val();
			var total_amount_account = $("#total_amount_account").val();
			var total_amount_account_val = removeCommas(total_amount_account);
			var sequester_status = $('#sequester_status').val();
			var sequester_amount = $('#sequester_amount').val();
			var sequester_amount_val = removeCommas(sequester_amount);
			var withdrawal_amount = total_amount_account_val - sequester_amount_val; //ยอดเงินที่ถอนได้
			var fix_withdrawal_status = $('#fix_withdrawal_status').val();
			var money_withdrawal = removeCommas($('#money_withdrawal').val());
			var type_id = $("#type_id").val();
			var account_id = $("#Withdrawal").find('.modal-body #account_id').val();
			
			$.ajax({
					method: 'POST',
					url: base_url+'save_money/check_max_min_withdrawal',
					data: {
						money : money_withdrawal,
						type_id : type_id,
						account_id : account_id
					},
					success: function(msg){
						if(msg == 'Y'){
							$('#Withdrawal').find('.modal-body #alert').hide();
							var account = $("#Withdrawal").find('.modal-body #account_id').val();
							var deposit = $("#Withdrawal").find('.modal-body #money_withdrawal').val();
							var modal   = $('#alertWithdrawal');
							var commission_fee_c = $("#Withdrawal").find('.modal-body #commission_fee').val();
							var total_amount_c = $("#Withdrawal").find('.modal-body #total_amount').val();
							if($("#Withdrawal").find('.modal-body #pay_type_withdraw_0').is(':checked')){
								var pay_type = '0';
							}else{
								var pay_type = '1';
							}
							modal.find('.modal-body #deposit_text').html(deposit);
							modal.find('.modal-footer #account_id').val(account);
							modal.find('.modal-footer #money').val(deposit);
							modal.find('.modal-footer #commission_fee_c').val(commission_fee_c);
							modal.find('.modal-footer #total_amount_c').val(total_amount_c);
							modal.find('.modal-footer #pay_type_c').val(pay_type);
							modal.find('.modal-footer #fix_withdrawal_status_c').val(fix_withdrawal_status);
							modal.find('.modal-footer #account_id').val($("#id_account").attr("data-value1"));
							$('#alertWithdrawal').modal("show");
							
						}else{
							swal(msg);
						}
					}
				});
		}
		
		$("#money_withdrawal" ).on('keyup', function (){
			//เเช็คค่าธรรมเนียมการถอน
			var money_withdrawal = removeCommas($('#money_withdrawal').val());
			var type_id = $("#type_id").val();
			var account_id = $("#Withdrawal").find('.modal-body #account_id').val();
			
			if(money_withdrawal > 0 || money_withdrawal != ''){
				$('#commission_fee').attr("disabled", false);
			}
			//console.log(account_id);
			$.ajax({
				method: 'POST',
				url: base_url+'save_money/check_fee_withdrawal',
				data: {
					money_withdrawal : money_withdrawal,
					type_id : type_id,
					account_id : account_id
				},
				success: function(msg){
					console.log(msg);
					$("#commission_fee").val(msg);
					var total_amount = money_withdrawal - msg;
					$("#total_amount").val(addCommas(total_amount));
				}
			});	
		});
		
		$("#commission_fee" ).on('keyup', function (){
			//เเช็คค่าธรรมเนียมการถอน
			var money_withdrawal = removeCommas($('#money_withdrawal').val());
			var commission_fee = removeCommas($("#commission_fee").val());
			var total_amount = money_withdrawal - commission_fee;
			$("#total_amount").val(addCommas(total_amount));

		});


		$('#Withdrawal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget);
			var account = button.data('account');
			var modal = $(this);
			modal.find('.modal-body #account_id').val(account);
		});
		
		$('#Deposit').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget);
			var account = button.data('account');
			var modal = $(this);
			modal.find('.modal-body #account_id').val(account);
			console.log("find", account);
		});
		$(".bt_close").on('click', function (){
			$("#commission_fee").val('');
			$("#total_amount").val('');
		});	

		$("#btn_withdrawal").on('click', function (){
			var sequester_status = $('#sequester_status').val();
			var sequester_amount = $('#sequester_amount').val();
			var deduct_guarantee_id = $('#deduct_guarantee_id').val();			
			//console.log(sequester_status);
			if(sequester_status == '1' && deduct_guarantee_id != ''){
				// swal("ไม่สามารถถอนเงินได้เนื่องจาก\nเป็นบัญชีเงินฝากเพื่อหลักประกันเงินกู้");
				$('#confirm_wd_modal').modal('show');
			}else if(sequester_status == '1' && deduct_guarantee_id == ''){
				swal("ไม่สามารถถอนเงินได้เนื่องจาก\nบัญชีนี้ถูกอายัด");
			}else {	
				var account = $('#btn_withdrawal').attr('data-account');			
				$('#Withdrawal').modal("show");
				$("#Withdrawal").find('.modal-body #account_id').val(account);
			}
		});	

		$("#tran_check_all").change(function() {
            if($("#tran_check_all").attr('checked') == "checked"){
                $('.tran_id_item').prop('checked', true)
            } else {
                $('.tran_id_item').prop('checked', false)
            }
        });
        $(".tran_id_item").change(function() {
            if($(this).attr('checked') != "checked"){
                $('#tran_check_all').prop('checked', false)
            }
        });

		$("#submit_confirm_err").on('click', function (){
			var confirm_user = $('#confirm_user').val();
			var confirm_pwd = $('#confirm_pwd').val();	
			var transaction_id = $("#transaction_id_err").val();
			console.log(confirm_user, confirm_pwd);
			$.ajax({
					method: 'POST',
					url: base_url+'save_money/authen_confirm_err_transaction',
					data: {
						confirm_user : confirm_user,
						confirm_pwd : confirm_pwd
					},
					dataType: 'json',
					success: function(data){
						console.log(data);
						if(data.result=="true"){
							
							if(transaction_id!='' && data.permission=="true"){
								window.location.href = base_url+"save_money/cancel_transaction/"+transaction_id
							}else{
								swal("ไม่มีสิทธิ์ทำรายการยกเลิก");
							}
						}else{
							swal("ตรวจสอบข้อมูลให้ถูกต้อง");
						}
					}
			});
			// if(sequester_status == '1' && deduct_guarantee_id != ''){
			// 	swal("ไม่สามารถถอนเงินได้เนื่องจาก\nเป็นบัญชีเงินฝากเพื่อหลักประกันเงินกู้");
			// }else if(sequester_status == '1' && deduct_guarantee_id == ''){
			// 	swal("ไม่สามารถถอนเงินได้เนื่องจาก\nบัญชีนี้ถูกอายัด");
			// }else {	
			// 	var account = $('#btn_withdrawal').attr('data-account');			
			// 	$('#Withdrawal').modal("show");
			// 	$("#Withdrawal").find('.modal-body #account_id').val(account);
			// }
		});	

		$("#submit_confirm_wd").on('click', function (){
			var confirm_user = $('#confirm_user_wd').val();
			var confirm_pwd = $('#confirm_pwd_wd').val();	
			$.ajax({
					method: 'POST',
					url: base_url+'save_money/authen_confirm_user',
					data: {
						confirm_user : confirm_user,
						confirm_pwd : confirm_pwd,
						permission_id : 240
					},
					dataType: 'json',
					success: function(data){
						console.log(data);
						if(data.result=="true"){
							
							if(data.permission=="true"){
								$("#staus_close_principal").val("");
								$('#confirm_wd_modal').modal('toggle');
								$(".custom_by_user_id").val(data.user_id);
								// check_wd();
								$('#Withdrawal').modal("show");
							}else{
								swal("ไม่มีสิทธิ์ทำรายการ");
							}
						}else{
							swal("ไม่มีสิทธิ์ทำรายการ");
						}
					}
			});
			// if(sequester_status == '1' && deduct_guarantee_id != ''){
			// 	swal("ไม่สามารถถอนเงินได้เนื่องจาก\nเป็นบัญชีเงินฝากเพื่อหลักประกันเงินกู้");
			// }else if(sequester_status == '1' && deduct_guarantee_id == ''){
			// 	swal("ไม่สามารถถอนเงินได้เนื่องจาก\nบัญชีนี้ถูกอายัด");
			// }else {	
			// 	var account = $('#btn_withdrawal').attr('data-account');			
			// 	$('#Withdrawal').modal("show");
			// 	$("#Withdrawal").find('.modal-body #account_id').val(account);
			// }
		});	

		$("#submit_select_line").on('click', function (){
			$("#line_start").val($("#select_line_start").val())
			$('#modal_line_start').modal('toggle');
			print_transaction()
		})

		$("#modal_line_start_close_btn").on('click', function (){
			$('#modal_line_start').modal('toggle');
		})

		$("#submit_confirm_cus").on('click', function (){
			var confirm_user = $('#confirm_user_cus').val();
			var confirm_pwd = $('#confirm_pwd_cus').val();	
			$("#date_transaction").val("");
			$("#custom_by_user_id").val("");
			$.ajax({
					method: 'POST',
					url: base_url+'save_money/authen_confirm_user',
					data: {
						confirm_user : confirm_user,
						confirm_pwd : confirm_pwd,
						permission_id : 231
					},
					dataType: 'json',
					success: function(data){
						console.log(data);
						if(data.result=="true"){
							
							if(data.permission=="true"){
								$("#date_transaction_tmp").prop('disabled', false);
								$('#custom_date_trasaction_modal').modal('hide');
								$("#date_transaction").val("");
								$("#custom_by_user_id").val(data.user_id);
							}else{
								swal("ไม่มีสิทธิ์ทำรายการ");
								$("#date_transaction_tmp").prop('disabled', true);
							}
						}else{
							swal("ตรวจสอบข้อมูลให้ถูกต้อง");
						}
					}
			});
		});	

		$("#submit_confirm_cus_wd").on('click', function (){
			var confirm_user = $('#confirm_user_cus_wd').val();
			var confirm_pwd = $('#confirm_pwd_cus_wd').val();
			$("#date_transaction_wd").val("");
			$("#custom_by_user_id").val("");
			$.ajax({
					method: 'POST',
					url: base_url+'save_money/authen_confirm_user',
					data: {
						confirm_user : confirm_user,
						confirm_pwd : confirm_pwd,
						permission_id : 231
					},
					dataType: 'json',
					success: function(data){
						console.log(data);
						if(data.result=="true"){

							if(data.permission=="true"){
								$("#date_transaction_wd_tmp").prop('disabled', false);
								$('#custom_date_trasaction_wd_modal').modal('hide');
								$("#date_transaction_wd").val("");
								$(".custom_by_user_id").val(data.user_id);
							}else{
								swal("ไม่มีสิทธิ์ทำรายการ");
								$("#date_transaction_wd_tmp").prop('disabled', true);
							}
						}else{
							swal("ตรวจสอบข้อมูลให้ถูกต้อง");
						}
					}
			});
		});

	});
	function change_status(transaction_id, account_id){
		swal({
        title: "ท่านต้องการยกเลิกพิมพ์รายการใช่หรือไม่?",
        text: "การยกเลิกพิมพ์รายการจะทำให้รายการที่เกิดขึ้นหลังจากรายการที่ท่านเลือกถูกยกเลิกพิมพ์รายการด้วย",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: "ยกเลิก",
        closeOnConfirm: false,
        closeOnCancel: true
		},
		function(isConfirm) {
			if (isConfirm) {
				window.location.href = base_url+"save_money/change_status/"+transaction_id+"/"+account_id
			} else {
				
			}
		});
	}
	
	function change_after_print(){
		//$('.status_label').html('พิมพ์สมุดบัญชีแล้ว');
		//$('.cancel_link').show()
		window.location.reload();
	}
	
	function addCommas(x){
	  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}	
	function cancel_transaction(transaction_id){
		swal({
        title: "ท่านต้องการยกเลิกรายการใช่หรือไม่?",
        text: "ระบบจะทำรายการคืนจำนวนเงินที่ทำรายการ",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: "ยกเลิก",
        closeOnConfirm: false,
        closeOnCancel: true
		},
		function(isConfirm) {
			if (isConfirm) {
				swal.close();
				$('#confirm_err1').modal('show');
				$("#transaction_id_err").val(transaction_id);
				// window.location.href = base_url+"save_money/cancel_transaction/"+transaction_id
			} else {
				
			}
		});
	}
	function removeCommas(str) {
		return(str.replace(/,/g,''));
	}
	function print_transaction() {
		var tran_ids = [];
		$(".tran_id_item").each(function( index ) {
			if ($(this).attr('checked') == "checked"){
				tran_ids[$(this).attr('data-line')] = $(this).val()
			}
		});
		window.open(base_url+"save_money/book_bank_page_fix_line_pdf?account_id=<?php echo $row_memberall['account_id']?>&tran_ids="+JSON.stringify(tran_ids)+"&line_start="+$("#line_start").val(), "_blank");
		// window.open("/spktcoop/system.spktcoop.com/save_money/book_bank_page_fix_line_pdf?account_id=<?php echo $row_memberall['account_id']?>&tran_ids="+JSON.stringify(tran_ids), "_blank");
	}
	function format_the_number(ele){
		var value_ele = $('#'+ele.id).val();
		value_ele = value_ele.split('.');
		value = value_ele[0].replace(/[^0-9]/g, '');	
		if(value!=''){
			if(value == 'NaN'){
				$('#'+ele.id).val('');
			}else{		
				value = parseInt(value);
				value = value.toLocaleString();
				if(value_ele[1] != null){
					value = value+"."+value_ele[1]
				}else{
					value = value;
				}
				$('#'+ele.id).val(value);
			}			
		}else{
			$('#'+ele.id).val('');
		}
	}

	$("#print_pdf" ).click(function(){
		printData();
	});

	$(".select_print_slip" ).click(function(){
		var transaction_id = $(this).val();
		$("#print_slip").attr("href", "<?=base_url()?>save_money/print_slip_deposit/"+transaction_id);
		console.log(transaction_id);
	});

	$("#update_confirm" ).click(function(){
		var d = $("#update_day").val();
		var m = $("#update_month").val();
		var y = $("#update_year").val();

		if(d=="" || m=="" || y==""){
			swal("เลือกวันที่ถูกต้อง", "warming");
			return;
		}

		$.ajax({
				method: 'POST',
				url: base_url+'save_money/update_transaction_balance',
				data: {
					date : (y-543) + '-' + m + '-' + d,
					account_id : $("#update_account_id").val()
				},
				success: function(data){
					console.log(data);
					if(data=="success"){
						
						swal("อัพเดทสำเร็จ", "อัพเดทข้อมูลเรียบร้อย", "success");
						setTimeout(() => {
							location.reload();
						}, 1000);
						
					}else{
						swal(data);
					}

				}
		});	


	});

	function add_account(account_id, member_id) {
		$.ajax({
			url: base_url + "/save_money/add_save_money",
			method: "post",
			data: {account_id: account_id, member_id: member_id},
			dataType: "text",
			success: function (data) {
				$('#add_account_space').html(data);
				if ($('#sequester_status_2').is(':checked')) {
					$('.show_sequester_amount').show();
				}
				$('#add_account').modal('show');
				change_account_type();
			}
		});

	}
	function change_account_type() {
		if ($('#type_id :selected').attr('type_code') == '21') {
			$('#atm_space').show();
		} else {
			$('#atm_number').val('');
			$('#atm_space').hide();
		}
	}

	function check_submit() {
		var text_alert = '';
		if ($('#member_id_add').val() == '') {
			text_alert += '- รหัสสมาชิก\n';
		}
		if ($('#acc_name_add').val() == '') {
			text_alert += '- ชื่อบัญชี\n';
		}
		if ($('#type_id').val() == '') {
			text_alert += '- ประเภทบัญชี\n';
		}

		if($('#min_first_deposit').val()==''){
			if($('#min_first_deposit').is('[readonly]')==false){
				text_alert += '- ระบุยอดเงินเปิดบัญชี\n';
			}	
		}


		if($('#acc_id').val()!=undefined){
			var tmp = $('#acc_id').val();
			acc_id = tmp.replace(/-/g, '');
		}else{
			var tmp = $('#acc_id_yourself').val();
			acc_id = tmp.replace(/-/g, '');
		}
		$.ajax({
			type: "POST",
			url: base_url + "/save_money/check_account_save",
			data: {
				atm_number: $('#atm_number').val(),
				member_id: $('#member_id_add').val(),
				account_id: acc_id,
				old_account_no: $("#old_account_no").val(),
				type_id: $('#type_id').val(),
				unique_account: $('#type_id :selected').attr('unique_account'),
				min_first_deposit: removeCommas($('#min_first_deposit').val()),
				action_type: $('#action_type').val()
			},
			success: function (msg) {
				var obj = JSON.parse(msg);
				if (obj.acc_number == 'dupplicate_account_no' && ($("#acc_id").val()=="" || $("#acc_id").val()==undefined) ) {
					text_alert += '- มีเลขที่บัญชี ซ้ำในระบบ\n';
				}
				if (obj.atm_number == 'dupplicate') {
					text_alert += '- มีเลขบัตร ATM ซ้ำในระบบ\n';
				}
				if (obj.unique_account == 'dupplicate') {
					text_alert += '- ประเภทบัญชีที่ท่านเลือกมีได้เพียงบัญชีเดียว\n';
				}
				if (obj.error != '') {
					text_alert += '- ' + obj.error + '\n';
				}

				if (text_alert != '') {
					swal('กรุณากรอกข้อมูลต่อไปนี้', text_alert, 'warning');
				} else {
					if($('#acc_id_yourself').val()!=undefined){
						var tmp = $('#acc_id_yourself').val();
						acc_id = tmp.replace(/-/g, '');
						$('#acc_id_yourself').val(acc_id);
					}
						
					$( "#frm1" ).append( "<input type='hidden' name='redirectback' value='/account_detail?account_id='>" );
					$('#frm1').submit();
				}
			}
		});
	}

	function remove_transaction(){
		var r = confirm("ยืนยืนเพื่อลบข้อมูลนี้");
		if (r == true) {
			return true;
		} else {
			return false;
		}
	}

	function on_cash_deposit(type){
		if(type===true){
			$("#display_have_a_book").show();
			$("#sec_have_a_book").css( "border", "1px solid #d6d6d6" );
		}else{
			$("#display_have_a_book").hide();
			$("#sec_have_a_book").css( "border", "1px solid #fff" );
		}
	}

	$( "#pay_type_deposit_0_1" ).click(function() {
		$("#have_a_book_acc").val( "CD" );
	});

	$( "#pay_type_deposit_0_2" ).click(function() {
		$("#have_a_book_acc").val( "DEN" );
	});

    $(document).on("change", "input[name='pay_type']", function(e){
        console.log($(this).val());
        if($(this).val() === "3"){;
            $("#cheque_deposit").addClass("active");
            $(".cheque_content").addClass("active");
            $(".cheque").addClass("active");
            $("#cheque_number").focus();
            $("#Deposit input[name=transaction_list]").val( "DCQ" );
            $("#have_a_book_acc").val( "DCQ" );
        }else{
            $("#cheque_deposit").removeClass("active");
            $(".cheque_content").removeClass("active");
            $(".cheque").removeClass("active");
            $("#have_a_book_acc").val( "CD" );
            $("#Deposit input[name=transaction_list]").val( "CD" );
        }

    })


</script>
