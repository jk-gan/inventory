<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sale extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
        $this->load->model('sale_model');
        $this->load->model('inventory_model');
        
        if(!$this->session->userdata('is_logged_in'))
		{
            redirect('users');
        }
    }

	public function index()
	{
		$this->all();
	}
	
	public function add_sale()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
            $this->form_validation->set_rules('item', 'Item', 'required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>', '</div>');

			if($this->form_validation->run())
			{
				$item = $this->input->post('item');
				$quantity = $this->input->post('quantity');
				$price = $this->input->post('price');
				$subtotal = $this->input->post('subtotal');


				// insert to tb_sale
				$data['total'] = $this->input->post('total');
				$data['totalProfit'] = 0;
				for($i = 0; $i<sizeof($item); $i++)
				{	
					$profit = $this->sale_model->get_profit($item[$i]);
					$profit *= $quantity[$i];
					$data['totalProfit'] += $profit;
				}
				$data['dateAdded']	=	date("Y-m-d H:i:s");
				$data['empID'] = $this->session->userdata('id');
				$id = $this->sale_model->insert_sale($data);

				for($i = 0; $i<sizeof($item); $i++)
				{
					$insert = array(
					'inventoryID'	=>	$item[$i],
					'quantity'	=>	$quantity[$i],
					'retailPrice'		=>	$price[$i],
					'empID' => $this->session->userdata('id'),
					'saleID' => $id,
					'dateAdded'	=>	date("Y-m-d H:i:s")
					);

				$this->sale_model->add($insert);
				}
				
				redirect('sale');
			}
        }
        
		$page['title']    	= "Add Sale";
		$page['breadcrumb'] 	= "Add Sale";
	
		$data['header']   	= $this->load->view('include/header', $page, true);
		$data['breadcrumb'] 	= $this->load->view('include/breadcrumb', $page, true);
        $data['content'] = 'add_sale';
		$data['item'] = $this->inventory_model->get_items();

        $this->load->view('template/master', $data); 
	}

	public function all()
	{
		$page['title']    	= "Sales";
		$page['breadcrumb'] 	= "Sales";
		
		$data['header']   	= $this->load->view('include/header', $page, true);
		$data['breadcrumb'] 	= $this->load->view('include/breadcrumb', $page, true);
        $data['content']   = 'view_sale';
		
		// $config["base_url"] = base_url()."vendor/index";
		// $config["total_rows"] = $this->payment_model->record_count();
		// $config["per_page"] = 10;
		// $config["uri_segment"] = 3;

		// $this->pagination->initialize($config);
		// $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// $data["results"] = $this->payment_model->limit($config["per_page"], $start);
		// $data["links"] = $this->pagination->create_links();
		
        $data['results'] = $this->sale_model->get_all();
        $this->load->view('template/master', $data); 
    }

	// public function edit($id="")
	// {
	// 	if ($this->input->server('REQUEST_METHOD') === 'POST')
	// 	{
 //            $this->form_validation->set_rules('itemName', 'Item Name', 'required');
	// 		$this->form_validation->set_rules('quantity', 'Quantity', 'required');
	// 		$this->form_validation->set_rules('cost', 'Cost', 'required');
	// 		$this->form_validation->set_rules('retailPrice', 'Retail Price', 'required');

	// 		if($this->form_validation->run())
	// 		{
	// 			$cost = $this->input->post('cost');
	// 			$retailPrice = $this->input->post('retailPrice');
				
	// 			$data = array(
	// 				'itemName'        =>	$this->input->post('itemName'),
	// 				'quantity'    =>	$this->input->post('quantity'),
	// 				'cost'        =>	$cost,
	// 				'retailPrice' =>	$retailPrice,
	// 				'profit'      =>	($retailPrice - $cost),
	// 				'lowLimit'		=>	$this->input->post('lowLimit'),
	// 				'categoryID'  =>	$this->input->post('category')
	// 				);

	// 			$id = $this->input->post('id');
	// 			$this->inventory_model->edit($id, $data);
	// 			redirect('inventory');
	// 		}
 //        }
        
	// 	$page['title']      = "Edit Inventory";
	// 	$page['breadcrumb'] = "Edit Inventory";
		
	// 	$data['header']     = $this->load->view('include/header', $page, true);
	// 	$data['breadcrumb'] = $this->load->view('include/breadcrumb', $page, true);
	// 	$data['content']    = 'edit_inventory';

	// 	$data['inventory']  = $this->inventory_model->get_inventory($id);
	// 	$data['category'] = $this->category_model->get_all();

 //        $this->load->view('template/master', $data);
	// }

	// public function delete($id="")
	// {
	// 	$this->inventory_model->delete($id);
	// 	redirect('inventory');
	// }

	public function get_item()
	{

		$inventory = $this->inventory_model->get_items();
		echo '<option value="">Choose an Inventory</option>';
		foreach ($inventory as $row)
	    {
	        echo '<option value="';
	        echo $row['inventoryID'];
	        echo '">';
	        echo $row["itemName"];
	        echo '</option>';
	    }

	}

	public function get_price($id="")
	{
		
		$price = $this->inventory_model->get_price_by_id($id);
		echo $price[0]['retailPrice'];
	}

}
