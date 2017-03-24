<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	
    public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('admin_model');
		
	}
	
	public function board() {
		
		isset($_SESSION['is_admin']);
		
		if ($_SESSION['is_admin'] === 1) {

		$this->load->view('header');
		$this->load->view('admin/board');
		$this->load->view('footer');

		} else {
			
			
			
			$data = "You have no permission";
			// remove session datas
			// foreach ($_SESSION as $key => $value) {
			// 	unset($_SESSION[$key]);
			// }
			
			// user logout ok
			$this->load->view('header');
			$this->load->view('errors/login_admin_fail');
			
			// redirect(base_url('/'));
			
		}
	}
	
	public function login() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
				if ($this->form_validation->run() == false) {
				
				// validation not ok, send validation errors to the view
				$this->load->view('header');
				$this->load->view('admin/login/login');
				$this->load->view('footer');
				
				} else {
				
				// set variables from the form
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				
				if ($this->admin_model->resolve_user_login($username, $password)) {
					
					$user_id = $this->admin_model->get_user_id_from_username($username);
					$user    = $this->admin_model->get_user($user_id);
					
	
					
					// set session user datas
					$_SESSION['user_id']      = (int)$user->id;
					$_SESSION['username']     = (string)$user->username;
					$_SESSION['logged_in']    = (bool)true;
					$_SESSION['is_confirmed'] = (int)$user->is_confirmed;
					$_SESSION['is_admin']     = (int)$user->is_admin;
					
					// user login ok
					// $this->load->view('header');
					// $this->load->view('user/login/login_success', $data);
					// $this->load->view('footer');
					
					
						// if ($_SESSION['is_admin'] === 1) {
				
						// $this->load->view('header');
						// $this->load->view('admin/admin');
						// $this->load->view('footer');
				
						// } else {
							
						// 	$data = "You are not admin";
						// 	// remove session datas
						// 	foreach ($_SESSION as $key => $value) {
						// 		unset($_SESSION[$key]);
						// 	}
							
						// 	// user logout ok
						// 	$this->load->view('header');
						// 	$this->load->view('errors/login_admin_fail');
						// 	$this->load->view('footer');
						// 	// redirect(base_url('/'));
							
						// }
						redirect(base_url('admin'));
					
					
					
					} else {
					
					// login failed
					$data->error = 'Wrong username or password.';
					
					// send error to the view
					$this->load->view('header');
					$this->load->view('admin/login/login', $data);
					$this->load->view('footer');
					
				}
				
			}		


		
	}
	

}


?>