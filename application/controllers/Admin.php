<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	
    public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->helper('form');
		$this->load->model('admin_model');
		
	}
	
	public function board() {
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data["user"] = $this->list_user();
		
		if ($_SESSION['is_admin'] === 1) {

		$this->load->view('header');
		$this->load->view('admin/board', $data);
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
	
	public function list_user(){
		
		$user = $this->admin_model->list_user();
		return $user;
	}

	public function edit_user(){
		
		
		$data = new stdClass();
		
		$id 	  = $this->input->post('id');
		$username = $this->input->post('username');
		$email    = $this->input->post('email');
		
		$data = array(
				'USERNAME'=> $username,
				'EMAIL'=> $email,
		);
		
		$this->admin_model->edit_user($id, $data);
		
		$data["user"] = $this->list_user();
		$this->load->view('header');
		$this->load->view('admin/board', $data);
		$this->load->view('footer');
	}
	
	public function delete_user(){
		
		$this->load->helper('form');
		
		$data = new stdClass();
		
		$id = $this->input->post('id');
		
		$data = array(
				'ID'=> $id,
		);
		
		$this->admin_model->delete_user($id, $data);
		
		$data["user"] = $this->list_user();
		$this->load->view('header');
		$this->load->view('admin/board', $data);
		$this->load->view('footer');
		
	}
	
	
	

}


?>