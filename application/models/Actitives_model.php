<?php
class Actitives_model extends CI_Model {
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}

	public function select_post() {

		$this->db->select('ACT_ID, CATE_NAME, ACT_DATE, START_TIME, END_TIME, INFO, username, NO_PPL, MAX_NO_PPL');
		$this->db->from('actitive');
		$this->db->join('lkp_category', 'actitive.CATE_CD = lkp_category.CATE_CD', 'left outer');
		$this->db->join('users', 'actitive.CREATE_USR_ID = users.id', 'left outer');
		
		if(isset($_GET['category_cd'])){ 
			$SchDataSubQuery = $_GET['category_cd'];
			$this->db->where('actitive.CATE_CD', $SchDataSubQuery);
		}
		
		return $this->db->get()->result();
	}

	public function create_post() {

	}
	
	public function edit_post() {
		
		
	}
	
	public function delete_post() {
		
		
	}
}

?>