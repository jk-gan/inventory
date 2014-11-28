<?php

class Inventory_model extends CI_Model
{	
	public function add($insert)
	{
		$this->db->insert('tb_inventory', $insert);
	}
	
	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('tb_inventory as i');
		$this->db->join('tb_category as c', 'i.categoryID = c.categoryID');
		$this->db->where('i.status', 'active');
		$this->db->join('tb_vendors as v', 'i.vendorID = v.vendorID');
		$query = $this->db->get();
		return $query->result_array();

		// $query = $this->db->get('tb_inventory');
		// return $query->result_array();
	}

	public function limit($limit, $start) 
	{   
		$this->db->select('*');
		$this->db->from('tb_inventory as i');
		$this->db->join('tb_category as c', 'i.categoryID = c.categoryID');
		$this->db->where('i.status', 'active');
		$this->db->join('tb_vendors as v', 'i.vendorID = v.vendorID');
		$this->db->order_by("i.dateAdded", "desc");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function count_inventory() 
	{
		$this->db->where('status', 'active');
		return $this->db->count_all_results('tb_inventory');
	}

	public function edit($id, $data)
	{	
		$this->db->where('inventoryID', $id);
		$this->db->update('tb_inventory', $data);
	}

	public function get_inventory($id="")
	{
		$this->db->select('*');
		$this->db->from('tb_inventory as i');
		$this->db->join('tb_category as c', 'i.categoryID = c.categoryID');
		$this->db->join('tb_vendors as v', 'i.vendorID = v.vendorID');
		$this->db->where('inventoryID', $id);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_item_by_vendor($id="")
	{
		$this->db->select('inventoryID, itemName');
		$this->db->where('vendorID', $id);
		$this->db->where('status', 'active');
		$query = $this->db->get('tb_inventory');

		return $query->result_array();
	}

	public function get_items()
	{
		$this->db->select('inventoryID, itemName');
		$this->db->where('status', 'active');
		$this->db->where('quantity >', 0);
		$query = $this->db->get('tb_inventory');

		return $query->result_array();
	}

    public function	get_cost_by_id($id="")
    {
    	$this->db->select('cost');
    	$this->db->where('inventoryID', $id);
		$query = $this->db->get('tb_inventory');

		return $query->result_array();
    }

    public function	get_price_by_id($id="")
    {
    	$this->db->select('retailPrice');
    	$this->db->where('inventoryID', $id);
		$query = $this->db->get('tb_inventory');

		return $query->result_array();
    }

	public function delete($id="")
	{
		$data['status'] = 'deleted';

		$this->db->where('inventoryID', $id);
		$this->db->update('tb_inventory', $data); 
	}	

	public function get_name($id)
	{
		$this->db->select('itemName');
		$this->db->where('inventoryID', $id);

		$query = $this->db->get('tb_inventory');
		$result = $query->result_array();
		return $result[0]['itemName']; 
	}

	public function get_quantity($id)
	{
		$this->db->select('quantity');
		$this->db->where('inventoryID', $id);
		$query = $this->db->get('tb_inventory');
		return $query->result_array();
	}

	public function get_low_limit()
	{
		$this->db->select('inventoryID, itemName, quantity, lowLimit, i.vendorID, v.vendorName');
		$this->db->from('tb_inventory as i');
		$this->db->join('tb_vendors as v', 'i.vendorID = v.vendorID');
		$this->db->where('quantity < lowLimit');
		$this->db->where('i.status', 'active');
		$query = $this->db->get();
		return $query->result_array();
	}
}	
