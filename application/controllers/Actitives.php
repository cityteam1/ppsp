<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once "Users.php";
class Actitives extends CI_Controller{
	public function __construct() {
		
		parent::__construct();
		$this->load->library('session');
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('actitives_model');
		
	}
	
    public function index() {
    	$data["Result"]=  $this->selectCate();
		$this->load->view('header');
		$this->load->view('Actitives/actitives', $data);
		$this->load->view('footer');
	}
	
	public function selectCate() {
	
		$info = $this->actitives_model->select_post();
		
		 $_SESSION['actitive_id'] = "Testing";
		return $info;
		
	}
	
	public function CreateActitives() {
	
		$info = $this->actitives_model->create_post();
		$this->load->view('header');
		$this->load->view('Actitives/actitives_create');
		$this->load->view('footer');
		$_SESSION['actitive_id'] = "Testing";
		return $info;
		
	}	
	
	
	

}


?>