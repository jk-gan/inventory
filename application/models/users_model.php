<?php

class Users_model extends CI_Model
{	
	// Get the specific user data for login purpose.
	public function get_users($username = "")
	{
		$this->db->select('empID, name, position, password, status');
		$this->db->where('status', 'active');
		$this->db->where('username', $username);
		$this->db->or_where('status', 'new');
		$this->db->where('username', $username);
		$query = $this->db->get('tb_employee');
		
		// Check the id whether is in the database
		if($query->num_rows == 1)
		{
			$row = $query->result_array();
			$data = array(
				'id'         =>	$row[0]['empID'],
				'name'       => $row[0]['name'],
				'position'	=>	$row[0]['position'],
				'password'  => $row[0]['password'],
				'status'	=>	$row[0]['status'],
				'isSuccess'  => true
			);
		}
		else
		{
			$data = array(
				'isSuccess'    => false
			);
		}
		
		return $data;
	}
	
	public function update_login($id, $info)
	{
		$this->db->where('empID', $id);
		$this->db->update('tb_employee', $info);
	}

	public function get_all()
	{
		$this->db->select('empID, name, position, lastLogin');
		$this->db->from('tb_employee');
		$this->db->where('status', 'active');
		$this->db->or_where('status', 'new');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_user_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('tb_employee');
		$this->db->where('empID', $id);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function add($insert)
	{
		$this->db->insert('tb_employee', $insert);
	}

	public function update($id, $data)
	{
		$this->db->where('empID', $id);
		$this->db->update('tb_employee', $data);
	}
}
