<?php

class Users_model extends CI_Model
{	
	// Get the specific user data for login purpose.
	public function get_users($username = "")
	{
		$this->db->where('username', $username);
		$query = $this->db->get('tb_employee');
		
		// Check the id whether is in the database
		if($query->num_rows == 1)
		{
			$row = $query->result_array();
			$data = array(
				'id'         =>	$row[0]['empID'],
				'name'       => $row[0]['name'],
				'password'   => $row[0]['password'],
				'last_login' => $row[0]['lastLogin'],
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

}
