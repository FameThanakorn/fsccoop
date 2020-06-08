<?php 
if(@$_GET['download']!=""){
    header("Content-type: application/vnd.ms-excel;charset=utf-8;");
    header("Content-Disposition: attachment; filename=รายงานการถอนเงินสามัญหมุนเวียน.xls"); 
    date_default_timezone_set('Asia/Bangkok');
}

?>
<style>
@page {
  size: 210mm 297mm; 
  /* Chrome sets own margins, we change these printer settings */
  margin: 15mm 0mm 15mm 0mm; 
}

span.title_view {
    font-size : 24px !important;
}

th, td {
    font-size : 16px !important;
}

</style>		
		
		<div style="width: 90%;" class="text-center" >
			<div class="panel panel-body" style="padding-top:10px !important;min-height: 1200px;">
				<table style="width: 100%;">
				<?php 
					
					// if(@$page == 1){
				?>	
					<tr>
                        <?php
                            if(@$_GET['download']==""){
                                ?>
                                    <td width=150>
                        
                                    </td>
                                    <td align="center" colspan="4">
                                        <img src="<?php echo base_url(PROJECTPATH.'/assets/images/coop_profile/'.$_SESSION['COOP_IMG']); ?>" alt="Logo" style="height: 80px;" />	

                                        <h3 class="title_view"><?php echo @$_SESSION['COOP_NAME'];?></h3>
                                        <h3 class="title_view">รายงานการถอนเงินสามัญหมุนเวียน</h3>
                                        
                                        <h3 class="title_view">
                                            
                                            <?php
                                                if($start_date == $end_date){
                                                    ?> 
                                                        ประจำวันที่ <?=@$start_date?>
                                                    <?php
                                                }else{
                                                    ?>
                                                        ประจำวันที่ <?=@$start_date?> ถึง <?=@$end_date?>
                                                    <?php
                                                }
                                            ?>
                                        </h3>
                                    </td>
                                    <td  width=150>
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
                                        <a class="no_print" target="_blank" onclick="goto()">
                                        <!-- <a class="no_print"  target="_blank" href="<?php echo base_url('/report_deposit_data/coop_report_account_transaction_excel'.$get_param); ?>"> -->
                                            <button class="btn btn-perview btn-after-input" type="button"><span class="icon icon icon-file-excel-o" aria-hidden="true"></span></button>
                                        </a>
                                    </td>
                                <?php
                            }else{
                                ?>
                                    <td align="center" colspan="6">
                                        <h3 class="title_view"><?php echo @$_SESSION['COOP_NAME'];?></h3>
                                        <h3 class="title_view">รายงานการถอนเงินสามัญหมุนเวียน</h3>
                                        
                                        <h3 class="title_view">
                                            <?php
                                                if($start_date == $end_date){
                                                    ?> 
                                                        ประจำวันที่ <?=@$start_date?>
                                                    <?php
                                                }else{
                                                    ?>
                                                        ประจำวันที่ <?=@$start_date?> ถึง <?=@$end_date?>
                                                    <?php
                                                }
                                            ?>
                                        </h3>
                                    </td>
                                <?php
                            }
                        ?>
					</tr>  					
                    
                    <tr>
                        <td colspan='3' align=left>
                            <span class="title_view">วันที่ <?php echo $this->center_function->ConvertToThaiDate(@date('Y-m-d'),1,0);?></span>		
                            <span class="title_view">เวลา <?php echo date('H:i:s');?></span><br>
                            
                        </td>
                        <td colspan='3' align=right>
                            <span class="title_view">ผู้ทำรายการ <?=$st_by_name?></span>	
                        </td>
                    </tr>

                    

				</table>

                <br>

				<table style="width: 100%;" border=1 class="st">
					<thead> 
						<tr class="st">
							<th  class="text-center" style="padding: 7px;" width='70' align='center' >ลำดับ</th>
							<th  class="text-center" style="padding: 7px;" width="80" align='center'>วันที่สั่งจ่าย</th>
                            <th  class="text-center" style="padding: 7px;" width="100" align='center'>เลขที่สัญญา</th>
                            <th  class="text-center" style="padding: 7px;" width="100" align='center'>เลขที่สมาชิก</th>
                            <th  class="text-center" style="padding: 7px;" width="150" align='center'>ชื่อ-นามสกุล</th>
                            <th  class="text-center" style="padding: 7px;" width="100" align='center'>จำนวนเงินสั่งจ่าย</th>
						</tr>  
					</thead>
					<tbody>
                        <?php
                            if($st){
                                $c=1;
                                foreach ($st as $key => $value) {
                                    ?>
                                        <tr class="st">
                                            <td align="center" style="padding: 7px;"><?=($c++)?></td>
                                            <td align="center" style="padding: 7px;"><?=@($value->transaction_time!="") ? $this->center_function->ConvertToThaiDate(@$value->transaction_time, 1 ,0) : "-"?></td>
                                            <td align="center" style="padding: 7px;"><?=$value->contract_number?></td>
                                            <td align="center" style="padding: 7px;"><?=$value->member_id?></td>
                                            <td align="left" style="padding: 7px;"><?=$value->fullname?></td>
                                            <td align="right" style="padding: 7px;"><?=number_format($value->loan_request, 2)?></td>
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
					</tbody>    
				</table>
			</div>
		</div>
<?php 
// 	}
// } 
?>

<style>
table.st {
    border-collapse: collapse;
}
tr:nth-child(even).st {background-color: #f2f2f2;}
tr:hover.st {background-color: #f5f5f5;}
</style>

<script>
    function goto(){
        // console.log(window.location.href );
        window.open(window.location.href+'&download=1');
    }
</script>