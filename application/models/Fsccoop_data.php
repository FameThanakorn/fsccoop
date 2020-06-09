<?php

class Fsccoop_data extends CI_Model 
{
	public function fscoop_full($loan_id)
	{
		$arr_data = array();
		$this->db->select('*');
		$this->db->from('coop_loan as N1');
		$this->db->join("coop_mem_apply as N2","N1.member_id = N2.member_id","left");
		$this->db->join("coop_mem_share as N3","N1.member_id = N3.member_id","left");
		$this->db->join("coop_district as N4","N2.district_id = N4.district_id","left");
		$this->db->join("coop_amphur as N5","N2.amphur_id = N5.amphur_id","left");
		$this->db->join("coop_province as N6","N2.province_id = N6.province_id","left");
		// $this->db->join("coop_province as N9","N2.c_province_id = N9.province_id","left");
		$this->db->join("coop_prename as N7","N2.prename_id = N7.prename_id","left");
		$this->db->join("coop_mem_group as N8","N2.level = N8.id","left");
		$this->db->WHERE("N1.id = '$loan_id'");
		$row = $this->db->get()->row_array();
		$arr_data['full'] =  $row;
		// echo '<pre>';print_r($row); exit;
		return $arr_data['full'];
	}



}
