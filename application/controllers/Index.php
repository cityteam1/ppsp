<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require_once "Users.php";
class Index extends CI_Controller{
    	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');
		
	}
	
        public function index() {
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}
}


?>