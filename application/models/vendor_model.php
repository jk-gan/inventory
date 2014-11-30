<?php

class Vendor_model extends CI_Model
{	
	public function add($insert)
	{
		$this->db->insert('tb_vendors', $insert);
	}

	public function edit($id, $data)
	{
		$this->db->where('vendorID', $id);
		$this->db->update('tb_vendors', $data);
	}
	
	public function get_all()
	{
		$this->db->where('status', 'active');
		$query = $this->db->get('tb_vendors');
		return $query->result_array();
	}

	public function delete($id="")
	{
		$data['status'] = 'deleted';

		$this->db->where('vendorID', $id);
		$this->db->update('tb_vendors', $data); 
	}	

	public function get_vendor_all($id="")
	{
		$this->db->where('vendorID', $id);
		$query = $this->db->get('tb_vendors');

		return $query->result_array();
	}

	public function get_vendors_name_n_id()
	{
		$this->db->select('vendorID, vendorName');
		$this->db->where('status', 'active');
		$query = $this->db->get('tb_vendors');
		return $query->result_array();
	}

	public function get_vendor_by_id($id="")
	{	
		$this->db->select('vendorID, vendorName');
		$this->db->where('vendorID', $id);
		$query = $this->db->get('tb_vendors');

		return $query->result_array();
	}
}	
