<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$this->load->view('admin/login_form');
	}
	
	public function validate_login()
	{
		/*Load admin model inside function to not allow global class access when you start to create customer accounts*/
		$this->load->model('admin_model');
		$res = $this->admin_model->validate();
		
		if($res)
		{
		
			$data = array( 'username' => $this->input->post('username'),
						   'is_loggedin' => true);
						   
			$this->session->set_userdata($data);
			/* direct them to the index() method in the admin controller
			   which leads to the main admin page */
			redirect('admin');
			
		}
		else
		{
			$this->index();
		}
	}
	
	function logout()  
	{  
		/* 	sess_destroy() would destroy all session variables (in the browser it was used in), even the customers cart products.
			Use unset_userdata() instead.
			$this->session->sess_destroy();
		*/
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('is_loggedin');
		$this->index();  
	}  
	
	public function create_account()
	{
		$this->load->view('admin/create_account');
	}
	
	public function create()
	{
		
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[2]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		
		$this->form_validation->set_error_delimiters('<span class="label label-danger">','</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['validation_error'] = "A Validation error occurred.";
			$this->load->view('admin/create_account',$data);
		}
		else
		{
			$this->load->model('admin_model');
			$res = $this->admin_model->create_account();
		
			if($res)
			{
				$this->session->set_flashdata('account_success', 'Account created successfully.');
				redirect('admin');
			}
			else
			{
				$this->session->set_flashdata('account_error', 'An error occurred while trying to create your account.');
				redirect('admin');
			}
		}
	}
	
}