<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
        $this->load->model('category_model');
        
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
		$this->all_category();
	}
	
	public function add_category()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
            $this->form_validation->set_rules('categoryName', 'Category Name', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>', '</div>');

			if($this->form_validation->run())
			{
				$insert = array(
					'categoryName'	=>	$this->input->post('categoryName'),
					'description'	=>	$this->input->post('description'),
					'status'		=>	'active',
					'dateAdded'	=>	date("Y-m-d H:i:s")
					);

				$this->category_model->add($insert);
				redirect('category');
			}
        }
        
		$page['title']    	= "Add Category";
		$page['breadcrumb'] 	= "Add Category";
	
		$data['header']   	= $this->load->view('include/header', $page, true);
		$data['breadcrumb'] 	= $this->load->view('include/breadcrumb', $page, true);
        $data['content'] = 'add_category';
        $this->load->view('template/master', $data); 
	}


	public function all_category()
	{
		$page['title']    	= "Category";
		$page['breadcrumb'] 	= "Category";
		
		$data['header']   	= $this->load->view('include/header', $page, true);
		$data['breadcrumb'] 	= $this->load->view('include/breadcrumb', $page, true);
        //$data['_data']          = $this->payment_model->get_payments();
        $data['content']   = 'view_category';
		
		// $config["base_url"] = base_url()."vendor/index";
		// $config["total_rows"] = $this->payment_model->record_count();
		// $config["per_page"] = 10;
		// $config["uri_segment"] = 3;

		// $this->pagination->initialize($config);
		// $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// $data["results"] = $this->payment_model->limit($config["per_page"], $start);
		// $data["links"] = $this->pagination->create_links();
		
        $data['result'] = $this->category_model->get_all();

        $this->load->view('template/master', $data);
	}

	public function edit($id="")
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

				$id = $this->input->post('id');
				$this->category_model->update($id, $data);
				redirect('category');
			}
        }
        
		$page['title']      = "Edit Category";
		$page['breadcrumb'] = "Edit Category";
		
		$data['header']     = $this->load->view('include/header', $page, true);
		$data['breadcrumb'] = $this->load->view('include/breadcrumb', $page, true);
		$data['content']    = 'edit_category';

		$data['category'] = $this->category_model->get_category($id);

        $this->load->view('template/master', $data);
	}

	public function delete($id="")
	{
		$this->category_model->delete($id);
		redirect('category');
	}
	

}
