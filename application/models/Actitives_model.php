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
	
	public function category_bar() {

		$this->db->distinct();
		$this->db->select('CATE_CD, CATE_NAME');
		$this->db->from('lkp_category');
		
		return $this->db->get()->result();
	}

	public function select_post() {

		$this->db->select('ACT_ID, CATE_NAME, ACT_DATE, START_TIME, END_TIME, INFO, username, NO_PPL, MAX_NO_PPL, LOCATION, CREATE_USR_ID');
		$this->db->from('actitive');
		$this->db->join('lkp_category', 'actitive.CATE_CD = lkp_category.CATE_CD', 'left outer');
		$this->db->join('users', 'actitive.CREATE_USR_ID = users.id', 'left outer');
		
		if(isset($_GET['category_cd'])){ 
			$SchDataSubQuery = $_GET['category_cd'];
			$this->db->where('actitive.CATE_CD', $SchDataSubQuery);
		}
		return $this->db->get()->result();
	}
	
	public function select_partner() {
		$this->db->select('username');
		$this->db->from('USER_EVENT');
		$this->db->join('users', 'USER_EVENT.USER_ID = users.id', 'left outer');
		
		$SchDataSubQuery = $_POST['join_acti'];
		$this->db->where('USER_EVENT.EVENT_ID', $SchDataSubQuery);

		return $this->db->get()->result();
	}

	public function create_post($sl_Category,$nm_Date,$Stime,$Etime,$nm_location,$MaxPPL,$nm_info,$nm_userid,$nm_eventid) {
			$data = array(
				'ACT_ID'   		=> $nm_eventid,
				'CATE_CD'   	=> $sl_Category,
				'ACT_DATE'      => $nm_Date,
				'START_TIME'	=> $Stime,
				'END_TIME'		=> $Etime,
				'LOCATION'		=> $nm_location,
				'NO_PPL'		=> 1,
				'MAX_NO_PPL'	=> $MaxPPL,
				'INFO'			=> $nm_info,
				'CREATE_USR_ID'	=> $nm_userid,
			);
			return $this->db->insert('actitive', $data);
	}
	
	public function create_sch($nm_userid,$nm_eventid) {
			$data = array(
				'EVENT_ID'   	=> $nm_eventid,
				'USER_ID'		=> $nm_userid,
			);
			return $this->db->insert('USER_EVENT', $data);
	}
	
	public function update_sch($nm_noppl,$nm_eventid) {
			$data = array(
				'NO_PPL'   	=> $nm_noppl,
			);
			$this->db->where('ACT_ID',$nm_eventid);
			return $this->db->update('actitive', $data);
			
	}
	
	public function disable($id){
		$this -> db -> where('ACT_ID', $id);
		return $this -> db -> delete('actitive');	
	}
	
	public function update($aid, $data) {
		$this->db->where('ACT_ID', $aid);
		return $this->db->update('actitive', $data);
	}
	
	public function search($keyword){
		$this->db->select('ACT_ID, CATE_NAME, ACT_DATE, START_TIME, END_TIME, INFO, username, NO_PPL, MAX_NO_PPL, LOCATION, CREATE_USR_ID');
		$this->db->from('actitive');
		$this->db->like('actitive.LOCATION', $keyword);
		$this->db->or_like('actitive.INFO', $keyword);
		$this->db->join('lkp_category', 'actitive.CATE_CD = lkp_category.CATE_CD', 'left outer');
		$this->db->join('users', 'actitive.CREATE_USR_ID = users.id', 'left outer');
		
		if(isset($_GET['category_cd'])){ 
			$SchDataSubQuery = $_GET['category_cd'];
			$this->db->where('actitive.CATE_CD', $SchDataSubQuery);
		}
	
		return $this->db->get()->result();
	}
	
	public function select($id){
		$this->db->select('ACT_ID, CATE_NAME, ACT_DATE, START_TIME, END_TIME, INFO, username, NO_PPL, MAX_NO_PPL, LOCATION, CREATE_USR_ID');
		$this->db->from('actitive');
		$this->db->where('actitive.ACT_ID', $id);
		$this->db->join('lkp_category', 'actitive.CATE_CD = lkp_category.CATE_CD', 'left outer');
		$this->db->join('users', 'actitive.CREATE_USR_ID = users.id', 'left outer');
		
		if(isset($_GET['category_cd'])){ 
			$SchDataSubQuery = $_GET['category_cd'];
			$this->db->where('actitive.CATE_CD', $SchDataSubQuery);
		}
		$row = $this->db->get();
		return $row->row();
	}
	
	public function edit_post() {
		
		
	}
	
	public function delete_post() {
		
		
	}
	
	public function join_post() {
		$this->db->select('ACT_ID, CATE_NAME, ACT_DATE, START_TIME, END_TIME, INFO, username, NO_PPL, MAX_NO_PPL, LOCATION, CREATE_USR_ID');
		$this->db->from('actitive');
		$this->db->join('lkp_category', 'actitive.CATE_CD = lkp_category.CATE_CD', 'left outer');
		$this->db->join('users', 'actitive.CREATE_USR_ID = users.id', 'left outer');
		
		$SchDataSubQuery = $_POST['join_acti'];
		$this->db->where('actitive.ACT_ID', $SchDataSubQuery);

		return $this->db->get()->result();
		
	}
	
	public function CulEventId() {

		$this->db->select_max('ACT_ID');
		$this->db->from('actitive');
		
		return $this->db->get()->result();
	}
}

?>