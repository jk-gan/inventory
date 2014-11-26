<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
        $this->load->model('vendor_model');
        $this->load->model('order_model');
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
	
	public function add()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
            $this->form_validation->set_rules('orderDate', 'Order Date', 'required');
			$this->form_validation->set_rules('vendor', 'Vendor', 'required');
			$this->form_validation->set_rules('item', 'Item', 'required');
			$this->form_validation->set_rules('quantity', 'Quantity', 'required');
			$this->form_validation->set_rules('price', 'Price per unit', 'required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>', '</div>');
			
			$item = $this->input->post('item');
			$quantity = $this->input->post('quantity');
			$price = $this->input->post('price');
			$subtotal = $this->input->post('subtotal');
			$arrived = $this->input->post('arrived');

			if($this->form_validation->run())
			{
				for($i = 0; $i < sizeof($item); $i++ )
				{
					$itemName[$i] = $this->inventory_model->get_name($item[$i]);
				}

				$insert = array(
					'orderDate' =>	$this->input->post('orderDate'),
					'vendorID'  =>	$this->input->post('vendor'),
					'item'      =>	serialize($item),
					'quantity'   =>	serialize($quantity),
					'price'     =>	serialize($price),
					'subtotal'  =>	serialize($subtotal),
					'itemName'	=>	serialize($itemName),
					'total'     =>  $this->input->post('total'),
					'orderStatus'	=>	'pending',
					'arrived'	=>	serialize($arrived),
					'paymentStatus'    =>	$this->input->post('paymentStatus')	
					);

				$this->order_model->add($insert);
				redirect('order');
			}
        }
        
		$page['title']    	= "Add Order";
		$page['breadcrumb'] 	= "Add order";
		
		$data['header']   	= $this->load->view('include/header', $page, true);
		$data['breadcrumb'] 	= $this->load->view('include/breadcrumb', $page, true);
        $data['content'] = 'add_order';

        $data['vendor'] = $this->vendor_model->get_all();
        $this->load->view('template/master', $data);
	}

	public function all()
	{
		$page['title']    	= "Order";
		$page['breadcrumb'] 	= "Order";
		
		$data['header']   	= $this->load->view('include/header', $page, true);
		$data['breadcrumb'] 	= $this->load->view('include/breadcrumb', $page, true);
        //$data['_data']          = $this->payment_model->get_payments();
        $data['content']   = 'view_order';
		
		// $config["base_url"] = base_url()."vendor/index";
		// $config["total_rows"] = $this->payment_model->record_count();
		// $config["per_page"] = 10;
		// $config["uri_segment"] = 3;

		// $this->pagination->initialize($config);
		// $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// $data["results"] = $this->payment_model->limit($config["per_page"], $start);
		// $data["links"] = $this->pagination->create_links();
		
        $data['result'] = $this->order_model->get_all();

        $this->load->view('template/master', $data); 
	}

	public function check($id="")
	{

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			// $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>', '</div>');
			$item = $this->input->post('check');
			$id = $this->input->post('id');
			$this->order_model->checking($item ,$id);

			// if($this->form_validation->run())
			// {
			// 	$insert = array(
			// 		'orderDate' =>	$this->input->post('orderDate'),
			// 		'vendorID'  =>	$this->input->post('vendor'),
			// 		'item'      =>	serialize($item),
			// 		'quantity'   =>	serialize($quantity),
			// 		'price'     =>	serialize($price),
			// 		'subtotal'  =>	serialize($subtotal),
			// 		'total'     =>  $this->input->post('total'),
			// 		'orderStatus'	=>	'pending',
			// 		'paymentStatus'    =>	$this->input->post('paymentStatus')
			// 		);

			// 	$this->order_model->add($insert);
				redirect('order');
        }

		$page['title']    	= "Check Order";
		$page['breadcrumb'] 	= "Check order";
		
		$data['header']   	= $this->load->view('include/header', $page, true);
		$data['breadcrumb'] 	= $this->load->view('include/breadcrumb', $page, true);
        $data['content'] = 'check_order';

        $data['order'] = $this->order_model->get_order($id);
        // $data['inventory'] = $this->inventory_model->get_name(unserialize($data['order'][0]['item']));
        $this->load->view('template/master', $data);
	}

	public function get_item($id="")
	{

		$inventory = $this->inventory_model->get_item_by_vendor($id);
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
		
		$price = $this->inventory_model->get_cost_by_id($id);
		echo $price[0]['cost'];
	}
}
