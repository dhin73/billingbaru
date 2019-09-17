<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Login_model extends CI_Model {

	function validate($email=false,$password=false) {
		$this->db->where('user_email',$email);
		$this->db->where('user_password',$password);
		$result = $this->db->get('user',1);
		if ($result->num_rows()>0){
			return $result->row();
		}
		return false;
	}

}
