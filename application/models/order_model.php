<?php

class Order_model extends CI_Model
{	
	public function add($insert)
	{
		$this->db->insert('tb_order', $insert);
		$id = $this->db->insert_id();
		return $id;
	}

	public function update($id, $data)
	{
		$this->db->where('orderID', $id);
		$this->db->update('tb_order', $data);
	}
	
	public function get_all()
	{
		// $query = $this->db->get('tb_order');
		$this->db->select('*');
		$this->db->from('tb_order');
		$this->db->join('tb_vendors', 'tb_order.vendorID = tb_vendors.vendorID');
		$this->db->order_by("tb_order.orderDate", "asc");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_order($id="")
	{
		$this->db->select('*');
		$this->db->from('tb_order');
		$this->db->join('tb_vendors', 'tb_order.vendorID = tb_vendors.vendorID');
		$this->db->where('orderID', $id);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function checking($item, $id)
	{
		$this->db->where('orderID', $id);
		$query = $this->db->get('tb_order');
		$result = $query->result_array();
		$itemID = unserialize($result[0]['item']);

		for($i=0; $i<sizeof($item); $i++)
		{
			for($j=0; $j<sizeof($itemID); $j++)
			{
				if($item[$i] === $itemID[$j])
				{
					$this->db->select('quantity');
					$this->db->where('inventoryID', $item[$i]);
					$query = $this->db->get('tb_inventory');
					$temp = $query->result_array();
					$quantity = $temp[0]['quantity'];

					$data = array(
						'quantity' => $quantity + unserialize($result[0]['quantity'])[$j]
						);

					$this->db->where('inventoryID', $item[$i]);
					$this->db->update('tb_inventory', $data);

					$this->db->select('arrived');
					$this->db->where('orderID', $id);
					$query = $this->db->get('tb_order');
					$temp = $query->result_array();
					$arrived = unserialize($temp[0]['arrived']);
					$arrived[$j] = '1';


					$update = array(
						'arrived'	=>	serialize($arrived)
						);
					$this->db->where('orderID', $id);
					$this->db->update('tb_order', $update);
				}
			}
		}
	}

	public function get_order_for_pdf($id)
	{
		$this->db->select('total, quantity, price, subtotal, itemName, orderDate, receiptID, v.vendorName');
		$this->db->from('tb_order as o');
		$this->db->join('tb_vendors as v', 'o.vendorID = v.vendorID');
		$this->db->where('orderID', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	// public function get_user($id="")
	// {
	// 	$this->db->select('e.name');
	// 	$this->db->from('tb_order');
	// 	$this->db->join('tb_vendors', 'tb_order.vendorID = tb_vendors.vendorID');
	// 	$this->db->where('orderID', $id);
	// 	$query = $this->db->get();

	// 	return $query->result_array();
	// }

}	
