<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('vendor_model');
        $this->load->model('inventory_model');
        $this->load->library('pagination');
        
        if(!$this->session->userdata('is_logged_in'))
		{
            redirect('users');
        }

        if($this->session->userdata('status') == "new")
        {
        	redirect('employee/new_user');
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
            $this->form_validation->set_rules('itemName', 'Item Name', 'required');
			$this->form_validation->set_rules('quantity', 'Quantity', 'required');
			$this->form_validation->set_rules('cost', 'Cost', 'required');
			$this->form_validation->set_rules('retailPrice', 'Retail Price', 'required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>', '</div>');

			if($this->form_validation->run())
			{
				$cost = $this->input->post('cost');
				$retailPrice = $this->input->post('retailPrice');
				
				$config['upload_path'] = './assets/img/inventory/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['encrypt_name']  = TRUE;
				//$config['max_size']	= '100';
				//$config['max_width']  = '1024';
				//$config['max_height']  = '768';

				$this->load->library('upload', $config);
				
				if (!$this->upload->do_upload('image'))
				{
					// hvn done
					$error = array('error' => $this->upload->display_errors());
					// redirect('profile/ppicture');
					$image = "FALSE";
				}
				else
				{
					$data = $this->upload->data();
					
					$id = md5(time());
					$extension  = explode(".", $data['file_name']);
					$ext 		= ".".$extension[1];
					$newName	= $id.$ext;
					rename("assets/img/inventory/".$data['file_name'], "assets/img/inventory/".$newName);

					$image = $newName;
				}

				$insert = array(
					'itemName'	=>	$this->input->post('itemName'),
					'quantity'	=>	$this->input->post('quantity'),
					'cost'	=>	$cost,
					'retailPrice'	=>	$retailPrice,
					'profit'		=>	($retailPrice - $cost),
					'categoryID'	=>	$this->input->post('category'),
					'lowLimit'		=>	$this->input->post('lowLimit'),
					'status'		=>	'active',
					'vendorID'		=>	$this->input->post('vendor'),
					'image'			=>	$image,
					'dateAdded'	=>	date("Y-m-d H:i:s")
					);

				$this->inventory_model->add($insert);
				redirect('inventory');
			}
        }
        
		$page['title']    	= "Add Inventory";
		$page['breadcrumb'] 	= "Add Inventory";
	
		$data['header']   	= $this->load->view('include/header', $page, true);
		$data['breadcrumb'] 	= $this->load->view('include/breadcrumb', $page, true);
        $data['content'] = 'add_inventory';
        $data['category'] = $this->category_model->get_all();
        $data['vendor'] = $this->vendor_model->get_all();
        $this->load->view('template/master', $data); 
	}

	public function all()
	{
		$page1 = $this->uri->segment(3);
			
		$config["base_url"] = base_url()."inventory/all";
		$config["total_rows"] = $this->inventory_model->count_inventory();
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;
		
		$config['full_tag_open'] = "<ul class='pagination pagination-sm'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";


		$this->pagination->initialize($config);
		$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["results"] = $this->inventory_model->limit($config["per_page"], $start);
		$data["links"] = $this->pagination->create_links();


		$page['title']    	= "Inventory";
		$page['breadcrumb'] 	= "Inventory";
		
		$data['header']   	= $this->load->view('include/header', $page, true);
		$data['breadcrumb'] 	= $this->load->view('include/breadcrumb', $page, true);
        //$data['_data']          = $this->payment_model->get_payments();
        $data['content']   = 'view_inventory';
		
		// $config["base_url"] = base_url()."vendor/index";
		// $config["total_rows"] = $this->payment_model->record_count();
		// $config["per_page"] = 10;
		// $config["uri_segment"] = 3;

		// $this->pagination->initialize($config);
		// $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// $data["results"] = $this->payment_model->limit($config["per_page"], $start);
		// $data["links"] = $this->pagination->create_links();
		
        //$data['result'] = $this->inventory_model->get_all();

        $this->load->view('template/master', $data);
	}

	public function upload_pic($image)
	{
		$config['upload_path'] = './assets/img/inventory/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name']  = TRUE;
		//$config['max_size']	= '100';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';

		$this->load->library('upload', $config);
		
		if (!$image)
		{
			// hvn done
			$error = array('error' => $this->upload->display_errors());
			// redirect('profile/ppicture');
			return FALSE;
		}
		else
		{
			$data = $this->upload->data();
			
			$id = md5(time());
			$extension  = explode(".", $data['file_name']);
			$ext 		= ".".$extension[1];
			$newName	= $id.$ext;
			rename("assets/img/inventory/".$data['file_name'], "assets/img/inventory/".$newName);

			return $newName;
		}
	}

	public function edit($id="")
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
            $this->form_validation->set_rules('itemName', 'Item Name', 'required');
			$this->form_validation->set_rules('quantity', 'Quantity', 'required');
			$this->form_validation->set_rules('cost', 'Cost', 'required');
			$this->form_validation->set_rules('retailPrice', 'Retail Price', 'required');

			if($this->form_validation->run())
			{
				$cost = $this->input->post('cost');
				$retailPrice = $this->input->post('retailPrice');

				$config['upload_path'] = './assets/img/inventory/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['encrypt_name']  = TRUE;
				//$config['max_size']	= '100';
				//$config['max_width']  = '1024';
				//$config['max_height']  = '768';

				$this->load->library('upload', $config);
				
				if (!$this->upload->do_upload('image'))
				{
					// hvn done
					$error = array('error' => $this->upload->display_errors());
					// redirect('profile/ppicture');
					$image = "FALSE";
				}
				else
				{
					$data = $this->upload->data();
					
					$id = md5(time());
					$extension  = explode(".", $data['file_name']);
					$ext 		= ".".$extension[1];
					$newName	= $id.$ext;
					rename("assets/img/inventory/".$data['file_name'], "assets/img/inventory/".$newName);

					$image = $newName;
				}
				
				$data = array(
					'itemName'        =>	$this->input->post('itemName'),
					'quantity'    =>	$this->input->post('quantity'),
					'cost'        =>	$cost,
					'retailPrice' =>	$retailPrice,
					'profit'      =>	($retailPrice - $cost),
					'lowLimit'		=>	$this->input->post('lowLimit'),
					'vendorID'		=>	$this->input->post('vendor'),
					'image'			=>	$image,
					'categoryID'  =>	$this->input->post('category')
					);

				$id = $this->input->post('id');
				$this->inventory_model->edit($id, $data);
				redirect('inventory');
			}
        }
        
		$page['title']      = "Edit Inventory";
		$page['breadcrumb'] = "Edit Inventory";
		
		$data['header']     = $this->load->view('include/header', $page, true);
		$data['breadcrumb'] = $this->load->view('include/breadcrumb', $page, true);
		$data['content']    = 'edit_inventory';

		$data['inventory']  = $this->inventory_model->get_inventory($id);
		$data['category'] = $this->category_model->get_all();
		$data['vendor'] = $this->vendor_model->get_all();

        $this->load->view('template/master', $data);
	}

	public function delete($id="")
	{
		$this->inventory_model->delete($id);
		redirect('inventory');
	}

	
	

	public function edit_category($id = '')
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
            $this->form_validation->set_rules('categoryName', 'Category Name', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			
			if($this->form_validation->run())
			{
				$data = array(
					'categoryName'	=>	$this->input->post('categoryName'),
					'description'	=>	$this->input->post('description')
					);

				$this->category_model->update($id, $data);
				redirect('inventory');
			}
        }
        
		$page['title']    	= "Edit Category";
		$page['breadcrumb'] 	= "Edit Category";
	
		$data['header']   	= $this->load->view('include/header', $page, true);
		$data['breadcrumb'] 	= $this->load->view('include/breadcrumb', $page, true);
        $data['content'] = 'edit_category';
        $this->load->view('template/master', $data); 
	}

	public function view($id="")
	{
		$page['title']    	= "Inventory Detail";
		$page['breadcrumb'] 	= "Inventory Detail";
	
		$data['header']   	= $this->load->view('include/header', $page, true);
		$data['breadcrumb'] 	= $this->load->view('include/breadcrumb', $page, true);
        $data['content'] = 'inventory_detail';
		$data['inventory'] = $this->inventory_model->get_inventory($id);

        $this->load->view('template/master', $data); 
	}
}
