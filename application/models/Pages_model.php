<?php
class Pages_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function can_login($username, $password) {
    	$this->db->where('username', $username);
    	$this->db->where('password', $password);
    	$query = $this->db->get('user');

    	if($query->num_rows() > 0) {
    		return true;
    	} else {
    		return false;
    	}
    }
}