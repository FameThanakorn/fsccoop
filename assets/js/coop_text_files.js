function check_empty(type){
    var month = '';
    var year = '';
    var mem_type_id = '';

    if(type === 'SHARE'){
        mem_type_id = $('#hun_mem_type').val();
        month = $('#hun_month').val();
        year = $('#hun_year').val();
    }else if(type === 'LOAN'){
        mem_type_id = $('#loan_mem_type').val();
        month = $('#loan_month').val();
        year = $('#loan_year').val();
    }else if(type === 'DEPOSIT'){
        mem_type_id = $('#sav_mem_type').val();
        month = $('#sav_month').val();
        year = $('#sav_year').val();
    }else{
        return;
    }

    var data = {
        type: type,
        month: month,
        year: year,
        mem_type_id: mem_type_id
    };

    blockUI();
    $.post(base_url+'text_file/check_empty', data, function(data){
            console.log(data);
            unblockUI(1000);
            if(data.data_type === 'SHARE'){
                if(data.has_data  === 1){
                    $("#form1").submit();
                }else{
                    swal('ไม่มีข้อมูล', '','warning');
                }
            }else if(data.data_type === 'LOAN'){
                if(data.has_data  === 1){
                    $("#form2").submit();
                }else{
                    swal('ไม่มีข้อมูล', '','warning');
                }
            }else if(data.data_type === 'DEPOSIT'){
                if(data.has_data  === 1){
                    $("#form3").submit();
                }else{
                    swal('ไม่มีข้อมูล', '','warning');
                }
            }else{
                swal('เกิดข้อผิดพลาด', '','error');
            }

    });

}
