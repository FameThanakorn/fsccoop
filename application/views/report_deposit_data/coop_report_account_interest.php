<style>
	.modal-dialog {
        width: 700px;
    }
</style>
<div class="layout-content">
    <div class="layout-content-body">
		<?php
		$month_arr = array('1'=>'มกราคม','2'=>'กุมภาพันธ์','3'=>'มีนาคม','4'=>'เมษายน','5'=>'พฤษภาคม','6'=>'มิถุนายน','7'=>'กรกฎาคม','8'=>'สิงหาคม','9'=>'กันยายน','10'=>'ตุลาคม','11'=>'พฤศจิกายน','12'=>'ธันวาคม');
		?>
		<style>
			.modal-header-alert {
				padding:9px 15px;
				border:1px solid #FF0033;
				background-color: #FF0033;
				color: #fff;
				-webkit-border-top-left-radius: 5px;
				-webkit-border-top-right-radius: 5px;
				-moz-border-radius-topleft: 5px;
				-moz-border-radius-topright: 5px;
				border-top-left-radius: 5px;
				border-top-right-radius: 5px;
			}
			.center {
				text-align: center;
			}
			.right {
				text-align: right;
			}
			.modal-dialog-account {
				margin:auto;
				margin-top:7%;
			}
			label{
				padding-top:7px;
			}
		</style>

		<style type="text/css">
		  .form-group{
			margin-bottom: 5px;
		  }
		</style>
		<h1 style="margin-bottom: 0">รายงานดอกเบี้ย</h1>
		<?php $this->load->view('breadcrumb'); ?>
		<div class="row gutter-xs">
			<div class="col-xs-12 col-md-12">
				<div class="panel panel-body" style="padding-top:0px !important;">
					<form action="<?php echo base_url(PROJECTPATH.'/report_deposit_data/coop_report_account_interest_preview'); ?>" id="form1" method="GET" target="_blank">
					<h3></h3>
					<div class="form-group g24-col-sm-24">
						<label class="g24-col-sm-6 control-label right">ประเภทบัญชี</label>
						<div class="g24-col-sm-11">
							<select name="type_id" id="type_id" onchange="" class="form-control">
							    <option value=""></option>
							    <?php
							    	foreach ($type_ids as $key => $type) {
							    ?>
									<option value="<?php echo $type["type_id"]?>"><?php echo $type["type_code"]?> <?php echo $type["type_name"]?></option>
								<?php
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group g24-col-sm-24">
						<label class="g24-col-sm-6 control-label right"> ประจำวันที่ </label>
						<div class="g24-col-sm-4">
							<div class="input-with-icon">
								<div class="form-group">
									<input id="start_date" name="start_date" class="form-control m-b-1 mydate" style="padding-left: 50px;" type="text" value="<?php echo $this->center_function->mydate2date(date('Y-m-d')); ?>" data-date-language="th-th">
									<span class="icon icon-calendar input-icon m-f-1"></span>
								</div>
							</div>
						</div> 
						<label class="g24-col-sm-3 control-label right end-date-label"> ถึงวันที่ </label>
						<div class="g24-col-sm-4 end-date-label">
							<div class="input-with-icon">
								<div class="form-group">
									<input id="end_date" name="end_date" class="form-control m-b-1 mydate" style="padding-left: 50px;" type="text" value="<?php echo $this->center_function->mydate2date(date('Y-m-d')); ?>" data-date-language="th-th">
									<span class="icon icon-calendar input-icon m-f-1"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group g24-col-sm-24">
						<label class="g24-col-sm-6 control-label right"> ผู้ทำรายการ </label>
						<div class="g24-col-sm-11">
							<div class="form-group">
								<label><input type="radio" name="ruid" value="" checked="checked" class="ruid"> ทั้งหมด</label> &nbsp;
								<label><input type="radio" name="ruid" value="SYSTEM" class="ruid"> ระบบ</label>
							</div>
						</div>
					</div>
					<div class="form-group g24-col-sm-24">
						<label class="g24-col-sm-6 control-label right"></label>
						<div class="g24-col-sm-7">
							<input type="button" class="btn btn-primary" style="width:100%" value="แสดงข้อมูล" onclick="check_empty()">
						</div>
						<div class="g24-col-sm-4">
							<a id="btn_link_export" href="<?php echo PROJECTPATH; ?>/report_deposit_data/coop_report_account_interest_excel?type_id=&start_date=<?php echo $this->center_function->mydate2date(date('Y-m-d')); ?>&end_date=<?php echo $this->center_function->mydate2date(date('Y-m-d')); ?>&ruid=" target="_blank" class="btn btn-default" style="width:100%">Export Excel</a>
						</div>
					</div>
				</form>				
				</div>
			</div>
		</div>
	</div>
</div>
  
<script>	
	var base_url = $('#base_url').attr('class');
	$( document ).ready(function() {
		$(".mydate").datepicker({
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
		$("#type_date").change(function() {
			if($(this).val() == 1) {
				$(".end-date-label").hide();
			} else {
				$(".end-date-label").show();
			}
		});
		
		function link_export() {
			$("#btn_link_export").prop("href", base_url + "/report_deposit_data/coop_report_account_interest_excel?type_id=" + $("#type_id").val() + " &start_date=" + $("#start_date").val() + " &end_date=" + $("#end_date").val() + "&ruid=" + $('input[name=ruid]:checked', '#form1').val());
		}
		$("#type_id").change(function() {
			link_export();
		});
		$("#start_date").change(function() {
			link_export();
		});
		$("#end_date").change(function() {
			link_export();
		});
		$(".ruid").change(function() {
			link_export();
		});
	});

	function check_empty(){
		var start_date = $('#start_date').val();
		var end_date = $('#end_date').val();
		var type_id = $('#type_id').val();
		var ruid = $('input[name=ruid]:checked', '#form1').val();
		
		$.ajax({
			url: base_url+'/report_deposit_data/check_coop_report_account_interest',	
			method:"post",
			data:{ 
				start_date: start_date, 
				end_date: end_date,
				type_id:type_id,
				ruid:ruid
			},
			dataType:"text",
			success:function(data){
			console.log(data);
			if(data == 'success'){
				$('#form1').submit();
			}else{
				$('#alertNotFindModal').appendTo("body").modal('show');
			}
			}
		});
	}	
</script>


