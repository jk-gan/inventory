<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
        $this->load->model('users_model');
        
        if(!$this->session->userdata('is_logged_in'))
		{
            redirect('users');
        }
    }
	
	public function new_user()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[password]');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>', '</div>');

			if($this->form_validation->run())
			{
				$id = $this->session->userdata('id');

				$insert = array(
					'password'	=>	$this->input->post('password'),
					'status'		=>	'active'
					);

				$this->users_model->update($id, $insert);
				$data['status'] = 'active';
				$this->session->set_userdata($data);
				redirect('users');
			}
        }

		$page['title']    	= "Change Password";
		$page['breadcrumb'] 	= "Change Password";
	
		$data['header']   	= $this->load->view('include/header', $page, true);
		$data['breadcrumb'] 	= $this->load->view('include/breadcrumb', $page, true);
        $data['content'] = 'chg_password';
        $this->load->view('template/master', $data);
	}
}


	