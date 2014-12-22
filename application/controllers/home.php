<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
        $this->load->model('inventory_model');
        $this->load->model('vendor_model');
        
        if(!$this->session->userdata('is_logged_in'))
		{
			$this->session->set_flashdata('errmsg', 'Please login first.');
            redirect('users');
        }

        if($this->session->userdata('status') == "new")
        {
        	redirect('employee/new_user');
        }
    }

	public function index()
	{
		$page['title'] = 'Dashboard';
		$page['breadcrumb'] = 'Dashboard';

		$data['header'] = $this->load->view('include/header', $page, TRUE);
		$data['breadcrumb'] = $this->load->view('include/breadcrumb', $page, TRUE);

		$data['content'] = 'dashboard';
		$data['vendors'] = $this->vendor_model->get_vendors_name_n_id();

		foreach($data['vendors'] as $row)
		{
			$data[$row['vendorName']] = $this->inventory_model->get_low_limit_by_vendor($row['vendorID']);
		}

		$this->load->view('template/master', $data);
	}

}
