<?php
// require_once "User_model.php";
class Admin_model extends CI_Model {
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
	
		/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	
	public function get_admin($is_admin) {
		
		$this->db->select('is_admin');
		$this->db->from('users');
		$this->db->where('username', $username);

		return $this->db->get()->row('is_admin');
		
	}
	
	public function list_user($username){
		
	    $this->db->select('username', $username);
		$this->db->from('users');

		return $this->db->get()->row('username');
	}
	
	public function edit_user($username) {
		
		
	}
	
	public function delete_user($username){
	    
	}
	
	public function resolve_user_login($username, $password) {
		
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('username', $username);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $hash);
		
	}
	
	public function update_user_login($data){
		$data = array(
			'updated_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('updated_at', $data);
	}
	
	/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_user_id_from_username($username) {
		
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('username', $username);

		return $this->db->get()->row('id');
		
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user($user_id) {
		
		$this->db->from('users');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
		
	}
	
	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}
	
}
?>