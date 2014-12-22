<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendor extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
        $this->load->model('emp_model');
        $this->load->model('vendor_model');
        
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
            $this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('hp', 'Handphone no', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('empID', 'Employee ID', 'required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>', '</div>');

			if($this->form_validation->run())
			{
				$insert = array(
					'vendorName'	=>	$this->input->post('name'),
					'hp'	=>	$this->input->post('hp'),
					'email'	=>	$this->input->post('email'),
					'address'	=>	$this->input->post('address'),
					'status'	=>	$this->input->post('status'),
					'empID'		=>	$this->input->post('empID'),
					'status'	=>	'active',
					'dateCreated'	=>	date("Y-m-d H:i:s")
					);

				$this->vendor_model->add($insert);
				redirect('vendor');
			}
        }
        
		$page['title']    	= "Add Vendor";
		$page['breadcrumb'] 	= "Add vendor";
	
		$data['header']   	= $this->load->view('include/header', $page, true);
		$data['breadcrumb'] 	= $this->load->view('include/breadcrumb', $page, true);
        $data['content'] = 'add_vendor';
        $data['emp'] = $this->emp_model->get_all();

        $this->load->view('template/master', $data); 
	}

	public function all()
	{
		$page['title']    	= "Vendor";
		$page['breadcrumb'] 	= "Vendor";
		
		$data['header']   	= $this->load->view('include/header', $page, true);
		$data['breadcrumb'] 	= $this->load->view('include/breadcrumb', $page, true);
        //$data['_data']          = $this->payment_model->get_payments();
        $data['content']   = 'view_vendor';
		
		// $config["base_url"] = base_url()."vendor/index";
		// $config["total_rows"] = $this->payment_model->record_count();
		// $config["per_page"] = 10;
		// $config["uri_segment"] = 3;

		// $this->pagination->initialize($config);
		// $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// $data["results"] = $this->payment_model->limit($config["per_page"], $start);
		// $data["links"] = $this->pagination->create_links();
		
        $data['result'] = $this->vendor_model->get_all();

        $this->load->view('template/master', $data); 
	}

	public function delete($id="")
	{
		$this->vendor_model->delete($id);
		redirect('vendor');
	}

	public function edit($id="")
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
            $this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('hp', 'Handphone no', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('empID', 'Employee ID', 'required');

			if($this->form_validation->run())
			{
				$data = array(
					'vendorName'	=>	$this->input->post('name'),
					'hp'	=>	$this->input->post('hp'),
					'email'	=>	$this->input->post('email'),
					'address'	=>	$this->input->post('address'),
					'status'	=>	'active',
					'empID'		=>	$this->input->post('empID'),
					'dateCreated'	=>	date("Y-m-d H:i:s")
					);

				$id = $this->input->post('id');
				$this->vendor_model->edit($id, $data);
				redirect('vendor');
			}
        }
        
		$page['title']    	= "Edit Vendor";
		$page['breadcrumb'] 	= "Edit vendor";
	
		$data['header']   	= $this->load->view('include/header', $page, true);
		$data['breadcrumb'] 	= $this->load->view('include/breadcrumb', $page, true);
        $data['content'] = 'edit_vendor';
        $data['vendor'] = $this->vendor_model->get_vendor_all($id);

        $data['emp'] = $this->emp_model->get_all();

        $this->load->view('template/master', $data);
	}
}
