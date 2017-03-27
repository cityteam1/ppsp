<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require_once "Users.php";
class Index extends CI_Controller{
    public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');
		$this->load->model('actitives_model');
		
	}
	
    public function index() {
        $data["Result"]			=  $this->selectCate();
    	$data["CateResult"]		=  $this->category_bar();
    	$data["EventIdResult"]	=  $this->MaxEventId();
    	
		$this->load->view('header');
		$this->load->view('index', $data);
		$this->load->view('footer');
	}
	
	public function category_bar() {
		$info = $this->actitives_model->category_bar();
		return $info;
	}
	
	public function selectCate() {
	
		$info = $this->actitives_model->select_post();
		return $info;
	}
	
		
	public function MaxEventId() {
		$info = $this->actitives_model->CulEventId();
		$info = $info;
		
		return $info;
	}
	
	
}


?>