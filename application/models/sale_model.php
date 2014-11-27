<?php

class Sale_model extends CI_Model
{	
	public function insert_sale($data)
	{
		$this->db->insert('tb_sales', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function add($data)
	{
		$this->db->insert('tb_sale_item', $data);
	} 
	
	public function get_profit($id)
	{
		$this->db->select('profit');
		$this->db->where('inventoryID', $id);
		$query = $this->db->get('tb_inventory');
		$result = $query->result_array();
		return $result[0]['profit'];
	}

	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('tb_sales');
		$this->db->order_by("dateAdded", "desc");
		$query = $this->db->get();
		return $query->result_array();      
		// $query = $this->db->get('tb_inventory');
		// return $query->result_array();
	}

	public function get_sale_for_pdf($id)
	{
		$this->db->select('s.total, si.quantity, si.retailPrice, si.subtotal, i.itemName, s.dateAdded, s.receiptID');
		$this->db->from('tb_sales as s');
		$this->db->join('tb_sale_item as si', 's.saleID = si.saleID');
		$this->db->where('s.saleID', $id);
		$this->db->join('tb_inventory as i', 'si.inventoryID = i.inventoryID');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update($id, $data)
	{
		$this->db->where('saleID', $id);
		$this->db->update('tb_sales', $data);
	}

	public function get_quantity($id)
	{
		$this->db->select('quantity');
		$this->db->where('inventoryID', $id);
		$query = $this->db->get('tb_inventory');
		return $query->result_array();
	}
	// public function limit($limit, $start) 
	// {   
	// 	$this->db->select('*');
	// 	$this->db->from('tb_inventory as i');
	// 	$this->db->join('tb_category as c', 'i.categoryID = c.categoryID');
	// 	$this->db->where('i.status', 'active');
	// 	$this->db->join('tb_vendors as v', 'i.vendorID = v.vendorID');
	// 	$this->db->order_by("i.dateAdded", "desc");
	// 	$this->db->limit($limit, $start);
	// 	$query = $this->db->get();
	// 	return $query->result_array();	
	// }

	// public function count_inventory() 
	// {
	// 	$this->db->where('status', 'active');
	// 	return $this->db->count_all_results('tb_inventory');
	// }

	// public function edit($id, $data)
	// {	
	// 	$this->db->where('inventoryID', $id);
	// 	$this->db->update('tb_inventory', $data);
	// }

	// public function get_inventory($id="")
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('tb_inventory as i');
	// 	$this->db->join('tb_category as c', 'i.categoryID = c.categoryID');
	// 	$this->db->join('tb_vendors as v', 'i.vendorID = v.vendorID');
	// 	$this->db->where('inventoryID', $id);
	// 	$query = $this->db->get();

	// 	return $query->result_array();
	// }

	// public function get_item_by_vendor($id="")
	// {
	// 	$this->db->select('inventoryID, itemName');
	// 	$this->db->where('vendorID', $id);
	// 	$this->db->where('status', 'active');
	// 	$query = $this->db->get('tb_inventory');

	// 	return $query->result_array();
	// }

 //    public function	get_price_by_id($id="")
 //    {
 //    	$this->db->select('cost');
 //    	$this->db->where('inventoryID', $id);
	// 	$query = $this->db->get('tb_inventory');

	// 	return $query->result_array();
 //    }

	// public function delete($id="")
	// {
	// 	$data['status'] = 'deleted';

	// 	$this->db->where('inventoryID', $id);
	// 	$this->db->update('tb_inventory', $data); 
	// }	
}	
