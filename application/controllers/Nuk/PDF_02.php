<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PDF_02 extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model("Interest_modal", "Interest_modal");
	}
	public function index()
	{
		echo "PDF_02";
    }

    public function Contract08()
	{
		// print_r($_GET['member_id']); exit;
		$loan_id = '6482';
		$arr_data = array();
		$this->load->model('Fsccoop_data', 'Fsccoop_data');
		// $result = $this->Fsccoop_data->get_profile($loan_id);
		// $arr_data["user"] = $result;
		// $result2 = $this->Fsccoop_data->fscoop_getloan_amount($loan_id);
		// $arr_data["loan_amount"] = $result2;
		// $result3 = $this->Fsccoop_data->fscoop_province($loan_id);
		// $arr_data["province"] = $result3;
		// $result4 = $this->Fsccoop_data->fscoop_amphur($loan_id);
		// $arr_data["amphur"] = $result4;
		// $result5 = $this->Fsccoop_data->fscoop_district($loan_id);
		// $arr_data["district"] = $result5;
		// $result6 = $this->Fsccoop_data->fscoop_share($loan_id);
		// $arr_data['share'] = $result6;
		$result = $this->Fsccoop_data->fscoop_full($loan_id);
		$arr_data['fscoop_full'] = $result;

		// echo "<pre>";
		// print_r($arr_data);
		// exit;
		$this->load->library('Center_function');
		$test = $this->center_function->convert('5');
		$this->center_function->mydate2date($row_member['birthday']);
		
        $this->load->view('PDF_01/Contract08',$arr_data);
	}

	public function Contract09()
	{

		$arr_data = array();
		
        $this->load->view('PDF_01/Contract09',$arr_data);
	}



}