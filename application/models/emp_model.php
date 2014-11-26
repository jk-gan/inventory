<?php

class Emp_model extends CI_Model
{	
	public function add($insert)
	{
		$this->db->insert('tb_vendors', $insert);
	}
	
	public function get_all()
	{
		$this->db->where('status', 'active');
		$query = $this->db->get('tb_employee');
		return $query->result_array();
	}

	public function delete($id="")
	{
		$data['status'] = 'deleted';

		$this->db->where('vendorID', $id);
		$this->db->update('tb_vendors', $data); 
	}	

	public function get_vendor($id="")
	{
		$this->db->where('vendorID', $id);
		$query = $this->db->get('tb_vendors');

		return $query->result_array();
	}

}	
