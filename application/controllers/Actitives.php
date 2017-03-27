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
    	$data["Result"]			=  $this->selectCate();
    	$data["CateResult"]		=  $this->category_bar();
    	$data["EventIdResult"]	=  $this->MaxEventId();
    	
		$this->load->view('header');
		$this->load->view('Actitives/actitives', $data);
		$this->load->view('footer');
	}
	
	public function category_bar() {
		$info = $this->actitives_model->category_bar();
		return $info;
	}
	
	public function selectCate() {
	
		$info = $this->actitives_model->select_post();
		
		 $_SESSION['actitive_id'] = "Testing";
		return $info;
	}
	
	public function selectPartner() {
		$info = $this->actitives_model->select_partner();
		return $info;
	}
	
	public function MaxEventId() {
		$info = $this->actitives_model->CulEventId();
		
		return $info;
	}
	
	public function join_post() {
		$info = $this->actitives_model->join_post();
		
		return $info;
	}
	
	public function Create() {
		if($this->input->post('create') != ""){
			$nm_eventid		= $this->input->post('nm_eventid');
			$sl_Category	= $this->input->post('sl_Category');
			$nm_Date		= $this->input->post('nm_Date');
			$Stime			= $this->input->post('Stime');
			$Etime			= $this->input->post('Etime');
			$nm_location	= $this->input->post('nm_location');
			$MaxPPL 		= $this->input->post('MaxPPL');
			$nm_info		= $this->input->post('nm_info');
			$nm_userid		= $this->input->post('nm_userid');

			$info = $this->actitives_model->create_post($sl_Category,$nm_Date,$Stime,$Etime,$nm_location,$MaxPPL,$nm_info,$nm_userid,$nm_eventid);
			$info = $this->actitives_model->create_sch($nm_userid,$nm_eventid);	
			
			redirect(base_url('/'));
		}
   
		$data["CateResult"]		=  $this->category_bar();
		$data["EventIdResult"]	=  $this->MaxEventId();
		
		$this->load->view('header');
		$this->load->view('Actitives/Create/actitives_create',$data);
		$this->load->view('footer');
	
		//return $info;
	}
	
	public function Join() {
		
		if($this->input->post('join_Event') != ""){
			
			$nm_eventid		= $this->input->post('join_Event');
			$nm_userid		= $this->input->post('nm_userid');
			$nm_noppl		= $this->input->post('nm_noppl');

			$info = $this->actitives_model->create_sch($nm_userid,$nm_eventid);	
			$info = $this->actitives_model->update_sch($nm_noppl,$nm_eventid);	
			redirect(base_url('/'));
		}
		
		$data["Result"]			=  $this->join_post();
		$data["ResultPartner"]	=  $this->selectPartner();
		
		$this->load->view('header');
		$this->load->view('Actitives/Join/actitives_join',$data);
		$this->load->view('footer');
		
		//return $info;
	}
	
	// disable function
	public function Disable(){
		if($this->input->post('disable_acti') != ""){
			// process
			$id = $this->input->post('disable_acti');
			$this->actitives_model->disable($id);	
			
			// view
			$data["Result"]			=  $this->selectCate();
    		$data["CateResult"]		=  $this->category_bar();
    		$data["EventIdResult"]	=  $this->MaxEventId();
    	
			$this->load->view('header');
			$this->load->view('Actitives/actitives', $data);
			$this->load->view('footer');
		}
	}
	
	public function Search(){
		if($this->input->post('keyword') != ""){
			// process
			$keyword = $this->input->post('keyword');
			
			// view
			$data["Result"]			=  $this->actitives_model->search($keyword);
    		$data["CateResult"]		=  $this->category_bar();
    		$data["EventIdResult"]	=  $this->MaxEventId();
    		
			$this->load->view('header');
			$this->load->view('Actitives/actitives', $data);
			$this->load->view('footer');
		}
	}
	
	public function Update($sourceid = ''){
		 $this->load->library('form_validation');
		 	 $this->load->library('form_validation');
		  $this->form_validation->set_rules('MaxPPL', 'MaxPPL', 'greater_than['.$this->input->post('OriMaxPPL').']');
		  
		if($this->input->post('update_acti') != ""){
			// process
			// get data
			$id = $this->input->post('update_acti');
			
		
		}else if($sourceid != ''){
			$id = $sourceid;
		}
		
		if(isset($id)){
			$data["Result"]	=  $this->actitives_model->select($id);
			// $data["Result"]			=  $this->selectCate();
    		$data["CateResult"]		=  $this->category_bar();
    		$data["EventIdResult"]	=  $this->MaxEventId();
    		
			$this->load->view('header');
			$this->load->view('Actitives/actitives_update', $data);
			$this->load->view('footer');
		}else{
			// view
			$data["Result"]			=  $this->selectCate();
    		$data["CateResult"]		=  $this->category_bar();
    		$data["EventIdResult"]	=  $this->MaxEventId();
    	
			$this->load->view('header');
			$this->load->view('Actitives/actitives', $data);
			$this->load->view('footer');
			
		}
	}
	
	public function DoUpdate(){
	
		if($this->input->post('btnUpdate') != ""){
			// get data
			$id = $this->input->post('ACTID');
			
			$sl_Category= $this->input->post('sl_Category');
			$nm_Date= $this->input->post('nm_Date');
			$Stime= $this->input->post('Stime');
			$Etime= $this->input->post('Etime');
			$nm_location= $this->input->post('nm_location');
			$MaxPPL= $this->input->post('MaxPPL');
			$nm_info= $this->input->post('nm_info');
			$nm_userid= $this->input->post('nm_userid');
			$nm_eventid     = $this->input->post('nm_eventid');   

	
				//'ACT_ID'   		=> $nm_eventid,
			$data = array(
				'CATE_CD'   	=> $sl_Category,
				'ACT_DATE'      => $nm_Date,
				'START_TIME'	=> $Stime,
				'END_TIME'		=> $Etime,
				'LOCATION'		=> $nm_location,
				'MAX_NO_PPL'	=> $MaxPPL,
				'INFO'			=> $nm_info,
				'CREATE_USR_ID'	=> $nm_userid,
			);
			
			$this->actitives_model->update($id, $data);	
			
			// view
			$this->index();
    		
		}
	}
}


?>