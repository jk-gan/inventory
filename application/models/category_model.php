<?php

class Category_model extends CI_Model
{	
	public function add($insert)
	{
		$this->db->insert('tb_category', $insert);
	}
	
	public function get_category($id)
	{
		$this->db->where('categoryID', $id);
		$query = $this->db->get('tb_category');
		return $query->result_array();
	}

	public function get_all()
	{
		$this->db->where('status', 'active');
		$query = $this->db->get('tb_category');
		return $query->result_array();
	}

	public function update($id, $data)
	{
		$this->db->where('categoryID', $id);
		$this->db->update('tb_category', $data);
	}

	public function delete($id="")
	{
		$data['status'] = 'deleted';

		$this->db->where('categoryID', $id);
		$this->db->update('tb_category', $data); 
	}	
}	
