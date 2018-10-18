<?php
class Store_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_store($zipcode = FALSE) {
        if ($zipcode === FALSE) {
            $query = $this->db->get('store');
            return $query->result_array();
        }

        $this->db->like('zipcode', $zipcode);
        $query = $this->db->get('store');
        //$query = $this->db->get_where('store', array('zipcode' => $zipcode));
        return $query->result_array();
	}

	public function set_store() {
	    $data = array(
	        'name' => $this->input->post('name'),
	        'address' => $this->input->post('address'),
	        'zipcode' => $this->input->post('zipcode')
	    );

	    return $this->db->insert('store', $data);
	}
}