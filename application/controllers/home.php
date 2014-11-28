<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
        $this->load->model('inventory_model');
        
        if(!$this->session->userdata('is_logged_in'))
		{
            redirect('users');
        }
    }

	public function index()
	{
		$page['title'] = 'Dashboard';
		$page['breadcrumb'] = 'Dashboard';

		$data['header'] = $this->load->view('include/header', $page, TRUE);
		$data['breadcrumb'] = $this->load->view('include/breadcrumb', $page, TRUE);

		$data['content'] = 'dashboard';

		$data['results'] = $this->inventory_model->get_low_limit();

		$this->load->view('template/master', $data);
	}
}
