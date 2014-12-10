<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
        $this->load->model('users_model');
        
  //      	if($this->session->userdata('is_logged_in'))
		// {
		// 	redirect('home');
		// }
		// else
		// {
		// 	$this->load->view('login_view');
		// }
    }

	public function index()
	{
		if($this->session->userdata('is_logged_in'))
		{
			redirect('home');
		}
		else
		{
			$this->load->view('login_view');
		}
	}
	
	public function login()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
		
			if ($this->form_validation->run())
			{
				$username  = $this->input->post('username');
				$password  = $this->input->post('password');
			
				$this->load->model('users_model');
				$_data = $this->users_model->get_users($username);
				
				if($_data['isSuccess'])
				{
					
					if($password != $_data['password'])
					{
						//$errmsg .= __("Invalid username or password.");
							$this->session->set_flashdata('errmsg', 'Invalid username or password.');
						 	redirect('users');
					}

					if($_data['position'] == "emp")
					{
						$data = array(
						'name' 	=> $_data['name'],
						'id'	=> $_data['id'],
						'is_logged_in' 	=> true,
						'admin_logged_in' => false
						);
						$this->session->set_userdata($data);
					}
					else if($_data['position'] == "manager")
					{
						$data = array(
						'name' 	=> $_data['name'],
						'id'	=> $_data['id'],
						'is_logged_in' => true,
						'admin_logged_in' 	=> true
						);
						$this->session->set_userdata($data);
					}
					
					
					$now = time();
					$date = date ("Y-m-d G:i:s", $now);
					// $ip_addr = $this->input->ip_address();
					
					$info = array
							(
								//'ip' => $ip_addr,
								'lastLogin' => $date
							);
					
					$this->users_model->update_login($_data['id'], $info);
					
					redirect('home');
				}
				else
				{
					// invalid username or password
					$this->session->set_flashdata('errmsg', 'Invalid username or password.');
					redirect('users');
				}
			}
		}
		redirect('users');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('users');
	}

	public function all()
	{
		$page['title'] = 'Users';
		$page['breadcrumb'] = 'Users';

		$data['header'] = $this->load->view('include/header', $page, TRUE);
		$data['breadcrumb'] = $this->load->view('include/breadcrumb', $page, TRUE);

		$data['content'] = 'view_users';
		$data['result'] = $this->users_model->get_all();
		$this->load->view('template/master', $data);
	}

	public function profile()
	{
		
	}
}
