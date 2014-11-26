<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function index()
	{
		$page['title'] = 'Dashboard';
		$page['breadcrumb'] = 'Dashboard';

		$data['header'] = $this->load->view('include/header', $page, TRUE);
		$data['breadcrumb'] = $this->load->view('include/breadcrumb', $page, TRUE);

		$data['content'] = 'dashboard';
		$this->load->view('template/master', $data);
	}
}
