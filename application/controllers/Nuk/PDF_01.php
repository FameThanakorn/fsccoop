<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PDF_01 extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model("Interest_modal", "Interest_modal");
	}
	public function index()
	{
		echo "TEST";
    }

    public function Contract()
	{
		$loan_id = '9001';
		$arr_data = array();
		$this->load->model('Fsccoop_data', 'Fsccoop_data');
		$result = $this->Fsccoop_data->fscoop_full($loan_id);
		$arr_data['loan_fscoop'] = $result;

		$this->load->library('Center_function');
		$month_arr = $this->center_function->month_arr();
		$month_short_arr = $this->center_function->month_short_arr();
		$arr_data['month_arr'] = $month_arr;
		$arr_data['month_short_arr'] = $month_short_arr;
		// print_r($arr_data['month_arr']);exit;
		
		$this->load->view('PDF_01/Contract',$arr_data);
	}
	
	public function Contract02()
	{

		$loan_id = '9001';
		$arr_data = array();
		$this->load->model('Fsccoop_data', 'Fsccoop_data');
		$result = $this->Fsccoop_data->fscoop_full($loan_id);
		$arr_data['loan_fscoop'] = $result;

		$this->load->library('Center_function');
		$month_arr = $this->center_function->month_arr();
		$month_short_arr = $this->center_function->month_short_arr();
		$arr_data['month_arr'] = $month_arr;
		$arr_data['month_short_arr'] = $month_short_arr;                                                                                                                 
		
        $this->load->view('PDF_01/Contract02',$arr_data);
	}
	public function Contract03()
	{

		$loan_id = '9001';
		$arr_data = array();
		$this->load->model('Fsccoop_data', 'Fsccoop_data');
		$result = $this->Fsccoop_data->fscoop_full($loan_id);
		$arr_data['loan_fscoop'] = $result;

		$this->load->library('Center_function');
		$month_arr = $this->center_function->month_arr();
		$month_short_arr = $this->center_function->month_short_arr();
		$arr_data['month_arr'] = $month_arr;
		$arr_data['month_short_arr'] = $month_short_arr;
		
        $this->load->view('PDF_01/Contract03',$arr_data);
	}
	public function Contract04()
	{
		$loan_id = '9001';
		$arr_data = array();
		$this->load->model('Fsccoop_data', 'Fsccoop_data');
		$result = $this->Fsccoop_data->fscoop_full($loan_id);
		$arr_data['loan_fscoop'] = $result;

		$this->load->library('Center_function');
		$month_arr = $this->center_function->month_arr();
		$month_short_arr = $this->center_function->month_short_arr();
		$arr_data['month_arr'] = $month_arr;
		$arr_data['month_short_arr'] = $month_short_arr;                                                                                                                 
		
        $this->load->view('PDF_01/Contract04',$arr_data);
	}
	public function Contract05()
	{
		$loan_id = '9001';
		$arr_data = array();
		$this->load->model('Fsccoop_data', 'Fsccoop_data');
		$result = $this->Fsccoop_data->fscoop_full($loan_id);
		$arr_data['loan_fscoop'] = $result;

		$this->load->library('Center_function');
		$month_arr = $this->center_function->month_arr();
		$month_short_arr = $this->center_function->month_short_arr();
		$arr_data['month_arr'] = $month_arr;
		$arr_data['month_short_arr'] = $month_short_arr;
		$this->load->view('PDF_01/Contract05',$arr_data);
	}
	public function Contract06()
	{
		$loan_id = '9001';
		$arr_data = array();
		$this->load->model('Fsccoop_data', 'Fsccoop_data');
		$result = $this->Fsccoop_data->fscoop_full($loan_id);
		$arr_data['loan_fscoop'] = $result;

		$this->load->library('Center_function');
		$month_arr = $this->center_function->month_arr();
		$month_short_arr = $this->center_function->month_short_arr();
		$arr_data['month_arr'] = $month_arr;
		$arr_data['month_short_arr'] = $month_short_arr;
		$this->load->view('PDF_01/Contract06',$arr_data);
	}
	public function Contract07()
	{
		$loan_id = '9001';
		$arr_data = array();
		$this->load->model('Fsccoop_data', 'Fsccoop_data');
		$result = $this->Fsccoop_data->fscoop_full($loan_id);
		$arr_data['loan_fscoop'] = $result;

		$this->load->library('Center_function');
		$month_arr = $this->center_function->month_arr();
		$month_short_arr = $this->center_function->month_short_arr();
		$arr_data['month_arr'] = $month_arr;
		$arr_data['month_short_arr'] = $month_short_arr;
		$this->load->view('PDF_01/Contract07',$arr_data);
	}

	public function Contract08()
	{
		// print_r($_GET['member_id']); exit;
		$loan_id = '9001';
		$arr_data = array();
		$this->load->model('Fsccoop_data', 'Fsccoop_data');
		$result = $this->Fsccoop_data->fscoop_full($loan_id);
		$arr_data['loan_fscoop'] = $result;
		$this->load->library('Center_function');
		$month_arr = $this->center_function->month_arr();
		$month_short_arr = $this->center_function->month_short_arr();
		$arr_data['month_arr'] = $month_arr;
		$arr_data['month_short_arr'] = $month_short_arr;
		
        $this->load->view('PDF_01/Contract08',$arr_data);
	}

	public function Contract09()
	{
		$loan_id = '9001';
		$arr_data = array();
		$this->load->model('Fsccoop_data', 'Fsccoop_data');
		$result = $this->Fsccoop_data->fscoop_full($loan_id);
		$arr_data['loan_fscoop'] = $result;

		$this->load->library('Center_function');
		$month_arr = $this->center_function->month_arr();
		$month_short_arr = $this->center_function->month_short_arr();
		$arr_data['month_arr'] = $month_arr;
		$arr_data['month_short_arr'] = $month_short_arr;
		// echo '<pre>';print_r($arr_data);exit;
        $this->load->view('PDF_01/Contract09',$arr_data);
	}



}