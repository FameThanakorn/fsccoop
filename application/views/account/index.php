<div class="layout-content">
    <div class="layout-content-body">
        <style>
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
            th, td {
                text-align: center;
            }
            .modal-dialog-delete {
                margin:0 auto;
                width: 350px;
                margin-top: 8%;
            }
            .modal-dialog-account {
                margin:auto;
                width: 70%;
                margin-top:7%;
            }
            .control-label {
                text-align:right;
                padding-top:5px;
            }
            .text_left {
                text-align:left;
            }
            .text_right {
                text-align:right;
            }
        </style>
        <h1 style="margin-bottom: 0">รายการชำระ</h1>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-l-r-0">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 padding-l-r-0">
                <?php $this->load->view('breadcrumb'); ?>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 padding-l-r-0">
                <button class="btn btn-primary btn-lg bt-add" type="button" onclick="add_account()">
                    <span class="icon icon-plus-circle"></span>
                    เพิ่มรายการ
                </button>
            </div>
        </div>
        <div class="row gutter-xs">
            <div class="col-xs-12 col-md-12">
                <div class="panel panel-body">
                    <div class="bs-example" data-example-id="striped-table">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="font-normal" width="20%">วันที่</th>
                                    <th class="font-normal"> รายการ </th>
                                    <th class="font-normal" width="15%"> รหัสบัญชี </th>
                                    <th class="font-normal" width="15%"> เดบิต </th>
                                    <th class="font-normal" width="15%"> เครดิต </th>
                                </tr>
                                <tr>
                                    <th class="font-normal" width="20%"></th>
                                    <th class="font-normal">รายละเอียด</th>
                                    <th class="font-normal" width="15%">สถานะ</th>
                                    <th class="font-normal" width="15%"></th>
                                    <th class="font-normal" width="15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $k_count=1;
                            $firest_p = $firest_p-1;
                            $i=1;
                            foreach($data_account_detail as $key_main => $row) {
                                foreach($row as $key => $row1) {
                                    $i=1;
                                    $description = "";
                                    $status = "";
                                    $account_id = "";
                                    foreach($row1 as $key2 => $row_detail){
                            ?>
                                            <tr>
                                                <td><?php echo $i=='1'?$this->center_function->ConvertToThaiDate($key_main,'1','0'):''; ?></td>
                                                <td width="35%" class="text_left">
                                                    <?php echo $row_detail['account_type']=='debit'?$row_detail['account_chart']:$space.$row_detail['account_chart']; ?>
                                                </td>
                                                <td><?php echo $row_detail['account_chart_id']; ?></td>
                                                <td class="text_right"><?php echo $row_detail['account_type']=='debit'?number_format($row_detail['account_amount'],2):''; ?></td>
                                                <td class="text_right"><?php echo $row_detail['account_type']=='credit'?number_format($row_detail['account_amount'],2):''; ?></td>
                                                <td class="text_right">
                                                </td>
                                            </tr>
                            <?php
                                        $description = $row_detail['account_description'];
                                        $account_id  = $row_detail['account_id'];
                                        if ($row_detail["run_status"] == 1) {
                                            $status = "ผ่านรายการแล้ว";
                                        } else if ($row_detail["run_status"] == 2) {
                                            $status = "ยกเลิก";
                                        }
                                        $i++;
                                    }
                            ?>
                                        <tr>
                                            <td></td>
                                            <td class="text_left"><?php echo $description;?></td>
                                            <td class="text-center"><?php echo $status;?></td>
                                            <td class="text_right" colspan="2">
                                                <input id="cancel-btn-<?php echo $account_id;?>" class="form-control m-b-1 btn btn-danger cancel-acc-btn" type="button" value="ลบ" data-account-id="<?php echo $account_id;?>">
                                                <input id="edit-btn-<?php echo $account_id;?>" class="form-control m-b-1 btn btn-primary edit-acc-btn" type="button" value="แก้ไข" data-account-id="<?php echo $account_id;?>">
                                            </td>
                                        </tr>
                            <?php
                                    $i++;
                                    $k_count++;
                                }
                                $k_count++;
                                $i++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php echo @$paging ?>
            </div>
        </div>
    </div>
</div>
<div id="add_account_type" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog modal-dialog-account">
        <div class="modal-content">
            <div class="modal-header modal-header-confirmSave">
                <h2 class="modal-title">เลือกประเภท</h2>
            </div>
            <div class="modal-body">
                <div class="form-group text-center">
                    <button type="button" class="btn btn-primary min-width-100" onclick="tran_modal(1)">เงินสด</button>
                    <button class="btn btn-danger min-width-100" type="button" onclick="tran_modal(2)">เงินโอน</button>
                    <button class="btn btn-primary min-width-100" type="button" onclick="tran_modal(3)">ปรัปปรุง</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="add_account_tran" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog modal-dialog-account">
        <div class="modal-content">
            <div class="modal-header modal-header-confirmSave">
                <h2 class="modal-title">บันทึกรายการบัญชี</h2>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(PROJECTPATH.'/account/account_save'); ?>" method="post" id="form1">
                    <input id="input_number" type="hidden" value="0">
                    <input id="journal_type_tran" name="journal_type" type="hidden" value="J">
                    <input id="account_id_tran" name="account_id" type="hidden" value="">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">วันที่</label>
                            <div class="col-sm-3">
                                <div class="input-with-icon">
                                    <div class="form-group">
                                        <input id="account_datetime" name="data[coop_account][account_datetime]" class="form-control m-b-1 type_input" type="text"
                                            value="<?php echo $this->center_function->mydate2date(date('Y-m-d')); ?>" data-date-language="th-th" style="padding-left:38px;">
                                        <span class="icon icon-calendar input-icon m-f-1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">รายละเอียดรายการบัญชี</label>
                            <div class="col-sm-6">
                                <input id="account_description" name="data[coop_account][account_description]" class="form-control m-b-1 type_input" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="button" id="btn_debit" class="btn btn-primary min-width-100 btn-width-auto" onclick="add_account_detail('debit')">เพิ่มรายการเดบิต</button>
                        <button type="button" id="btn_credit" class="btn btn-primary min-width-100 btn-width-auto" onclick="add_account_detail('credit')">เพิ่มรายการเครดิต</button>
                    </div>
                    <div class="bs-example" data-example-id="striped-table">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="font-normal" width="30%"> รหัสบัญชี </th>
                                <th class="font-normal" width="40%"> รายละเอียด </th>
                                <th class="font-normal" width="15%"> เดบิต </th>
                                <th class="font-normal" width="15%"> เครดิต </th>
                            </tr>
                            </thead>
                            <tbody id="account_data">
                            </tbody>
                        </table>
                        <div class="form-group col-sm-6">
                            <label class="col-sm-3 control-label">ยอดรวม เดบิต</label>
                            <div class="col-sm-6">
                                <input id="sum_debit" name="sum_debit" class="form-control m-b-1 type_input" type="text" value="" readonly>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="col-sm-3 control-label">ยอดรวม เครดิต</label>
                            <div class="col-sm-6">
                                <input id="sum_credit" name="sum_credit" class="form-control m-b-1 type_input" type="text" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-primary min-width-100" onclick="form_submit()">ตกลง</button>
                        <button class="btn btn-danger min-width-100" type="button" onclick="clear_modal()">ยกเลิก</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<div id="add_account_cash" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog modal-dialog-account">
        <div class="modal-content">
            <div class="modal-header modal-header-confirmSave">
                <h2 class="modal-title">บันทึกรายการบัญชี</h2>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(PROJECTPATH.'/account/account_save'); ?>" method="post" id="form1_cash">
                    <input id="input_number_cash" type="hidden" value="0">
                    <input id="account_id_cash" name="account_id" type="hidden" value="">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label right"> การชำระเงิน</label>
                            <div class="col-sm-3">
                                <span id="show_pay_type2" style="">
                                    <input type="radio" name="journal_type" id="pay_type_0" value="R"> ด้านรับ &nbsp;&nbsp;
                                    <input type="radio" name="journal_type" id="pay_type_1" value="P"> ด้านจ่าย &nbsp;&nbsp;
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">วันที่</label>
                            <div class="col-sm-3">
                                <div class="input-with-icon">
                                    <div class="form-group">
                                        <input id="account_datetime_cash" name="data[coop_account][account_datetime]" class="form-control m-b-1 type_input form_date_picker" type="text" value="<?php echo $this->center_function->mydate2date(date('Y-m-d')); ?>" data-date-language="th-th" style="padding-left:38px;">
                                        <span class="icon icon-calendar input-icon m-f-1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">รายละเอียดรายการบัญชี</label>
                            <div class="col-sm-6">
                                <input id="account_description_cash" name="data[coop_account][account_description]" class="form-control m-b-1 type_input" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="button" id="btn-add-account-detail" class="btn btn-primary min-width-100 btn-width-auto">เพิ่มรายการ</button>
                    </div>
                    <div class="bs-example" data-example-id="striped-table">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="font-normal" width="40%"> รหัสบัญชี </th>
                                    <th class="font-normal" width="40%">รายละเอียด</th>
                                    <th class="font-normal" width="15%">จำนวนเงิน</th>
                                    <th class="font-normal" width="5%"></th>
                                </tr>
                            </thead>
                            <tbody id="account_data_cash" index="0">
                                <tr id="tr_acc_0" class="org-tr">
                                    <td>
                                        <select id="account_chart_id_cash_0" name="data[coop_account_detail][0][account_chart_id]" class="form-control m-b-1 js-data-example-ajax">
                                            <option value="">เลือกรหัสผังบัญชี</option>
                                            <?php 
                                                foreach($account_chart as $key => $row) {
                                            ?>
                                            <option value="<?php echo $row['account_chart_id']; ?>"><?php echo $row['account_chart_id']." : ".$row['account_chart'];; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <input type="hidden" name="data[coop_account_detail][0][account_type]" value="<?php echo $type; ?>">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control account_desc" id="acc_desc_0" name="data[coop_account_detail][0][account_description]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control acc_input" id="acc_0" name="data[coop_account_detail][0][account_amount]" onKeyUp="format_the_number_decimal(this)">
                                    </td>
                                    <td id="remove_0" class="" data-index="0"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group col-sm-12">
                            <label class="col-sm-3 control-label">ยอดรวม</label>
                            <div class="col-sm-6">
                                <input id="sum_cash" name="sum_cash" class="form-control m-b-1 type_input" type="text" value="0" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-primary min-width-100" onclick="form_cash_submit()">ตกลง</button>
                        <button class="btn btn-danger min-width-100" type="button" onclick="clear_modal()">ยกเลิก</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<form action="<?php echo base_url(PROJECTPATH.'/account/cancel_account_transaction'); ?>" method="post" id="form1_cancel">
    <input id="cancel_account_id" name="account_id" value=""/>
</form>
<?php
$link = array(
    'src' => PROJECTJSPATH.'assets/js/account.js',
    'type' => 'text/javascript'
);
echo script_tag($link);

$link = array(
    'src' => PROJECTJSPATH.'assets/js/zepto.min.js',
    'type' => 'text/javascript'
);
echo script_tag($link);
$link = array(
    'src' => PROJECTJSPATH.'assets/js/jquery.mask.js',
    'type' => 'text/javascript'
);
echo script_tag($link);
$link = array(
    'src' => PROJECTJSPATH.'assets/js/select2.full.js',
    'type' => 'text/javascript'
);
echo script_tag($link);
?>
<script>
    $(document).ready(function() {
        $("#btn-add-account-detail").click(function() {
            index = parseInt($("#account_data_cash").attr("index")) + 1;
            html = `<tr id="tr_acc_`+index+`" class="add-tr">
                        <td>
                            <select id="account_chart_id_cash_`+index+`" class="form-control js-data-example-ajax" name="data[coop_account_detail][`+index+`][account_chart_id]">
                                <option value="">เลือกรหัสผังบัญชี</option>
                                <?php 
                                    foreach($account_chart as $key => $row) {
                                ?>
                                    <option value="<?php echo $row['account_chart_id']; ?>"><?php echo $row['account_chart_id']." : ".$row['account_chart'];; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <input type="hidden" name="data[coop_account_detail][`+index+`][account_type]" value="<?php echo $type; ?>">
                        </td>
                        <td><input type="text" class="form-control account_desc" id="acc_desc_`+index+`" name="data[coop_account_detail][`+index+`][account_description]"></td>
                        <td><input type="text" class="form-control acc_input" id="acc_`+index+`" name="data[coop_account_detail][`+index+`][account_amount]" onKeyUp="format_the_number_decimal(this)"></td>
                        <td id="remove_`+index+`" class="remove-cash-tr" data-index="`+index+`"><a href="#">ลบ</a></td>
                    </tr>`;
            $("#account_data_cash").append(html);
            $("#account_data_cash").attr("index", index);
            createSelect2("add_account_cash");
        });
        $(document).on("click",".remove-cash-tr",function() {
            index = $(this).attr("data-index");
            $("#tr_acc_"+index).remove();
        });
        $(".edit-acc-btn").click(function() {
            account_id = $(this).attr("data-account-id");
            $.get(base_url+"account/get_account_detail?account_id="+account_id
			, function(result) {
                data = JSON.parse(result);
                if(data.journal_type == "J" || data.journal_type == "S") {
                    $("#account_id_tran").val(data.account_id);
                    $("#account_datetime").val(data.account_datetime_be);
                    $("#account_description").val(data.account_description);
                    $("#journal_type_tran").val(data.journal_type);
                    $(".add-tr").remove();
                    $("#input_number").val(0);

                    $.ajaxSetup({async: false});
                    for (i = 0; i < data.details.length; i++) {
                        detail = data.details[i];
                        var input_number = $('#input_number').val();
                        $.post(base_url+"account/ajax_add_account_detail", 
                        {	
                            type: detail.account_type,
                            input_number : input_number
                        }
                        , function(result){
                            $('#account_data').append(result);
                            $("#sel_input_"+input_number).val(detail.account_chart_id);
                            $("#desc_input_"+input_number).val(detail.description);
                            if(detail.account_type == "debit") {
                                $("#debit_input"+input_number).val(detail.account_amount);
                            } else if (detail.account_type == "credit") {
                                $("#credit_input"+input_number).val(detail.account_amount);
                            }
 
                            input_number++;
                            $('#input_number').val(input_number);
                        });
                    }

                    call_sum_credit_debit(0,0);
                    createSelect2("add_account_tran");
                    $("#add_account_tran").modal("show");
                } else {
                    if(data.journal_type == "P") {
                        $("#pay_type_1").prop("checked", true);
                    } else {
                        $("#pay_type_0").prop("checked", true);
                    }

                    $("#account_id_cash").val(data.account_id);
                    $("#account_datetime_cash").val(data.account_datetime_be);
                    $("#account_description_cash").val(data.account_description);
                    $(".add-tr").remove();

                    $("#account_data_cash").attr("index", 0);

                    for (i = 0; i < data.details.length; i++) {
                        detail = data.details[i];
                        if((data.journal_type == "P" && detail.account_type == "debit") || (data.journal_type == "R" && detail.account_type == "credit")) {
                            index = 0;
                            if(i > 0) {
                                index = parseInt($("#account_data_cash").attr("index")) + 1;
                                html = `<tr id="tr_acc_`+index+`" class="add-tr">
                                            <td>
                                                <select id="account_chart_id_cash_`+index+`" class="form-control js-data-example-ajax" name="data[coop_account_detail][`+index+`][account_chart_id]">
                                                    <option value="">เลือกรหัสผังบัญชี</option>
                                                    <?php 
                                                        foreach($account_chart as $key => $row) {
                                                    ?>
                                                        <option value="<?php echo $row['account_chart_id']; ?>"><?php echo $row['account_chart_id']." : ".$row['account_chart'];; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                                <input type="hidden" name="data[coop_account_detail][`+index+`][account_type]" value="<?php echo $type; ?>">
                                            </td>
                                            <td><input type="text" class="form-control account_desc" id="acc_desc_`+index+`" name="data[coop_account_detail][`+index+`][account_description]"></td>
                                            <td><input type="text" class="form-control acc_input" id="acc_`+index+`" name="data[coop_account_detail][`+index+`][account_amount]" onKeyUp="format_the_number_decimal(this)"></td>
                                            <td id="remove_`+index+`" class="remove-cash-tr" data-index="`+index+`"><a href="#">ลบ</a></td>
                                        </tr>`;
                                $("#account_data_cash").append(html);
                                $("#account_data_cash").attr("index", index);   
                            }
                            $("#account_chart_id_cash_"+index).val(detail.account_chart_id);
                            $("#acc_desc_"+index).val(detail.description);
                            $("#acc_"+index).val(detail.account_amount);
                            createSelect2("add_account_cash");
                        }
                    }
                    cal_acc_input();
                    $("#add_account_cash").modal("show");
                }
			});
        });
        $(".cancel-acc-btn").click(function() {
            account_id = $(this).attr("data-account-id");
            swal({
                title: "ท่านต้องการลบข้อมูลใช่หรือไม่?",
                text: "",
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
                    $("#cancel_account_id").val(account_id);
                    $("#form1_cancel").submit();
                } else {
                }
            });
        });
    });
</script>