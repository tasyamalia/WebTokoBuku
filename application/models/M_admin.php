<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	public function get_login()
	{
		return $this->db->where('username',$this->input->post('username'))->where('password',$this->input->post('password'))->get('data_user');
	}
	

}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */