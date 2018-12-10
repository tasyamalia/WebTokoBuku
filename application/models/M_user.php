<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function tampil_user()
	{
		$tm_user=$this->db->get('data_user')->result();
return $tm_user;
	}
	public function simpan_user()
	{
		$object= array(
			'kode_user'=>$this->input->post('kode_user'),
			'nama_user'=>$this->input->post('nama_user'),
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			'level'=>$this->input->post('level')
		);
		return $this->db->insert('data_user',$object);
	}
	public function detail($a)
	{
		return $this->db->where('kode_user',$a)->get('data_user')->row();
	}
	public function edit_user()
	{
		$object= array(
			'kode_user'=>$this->input->post('kode_user'),
			'nama_user'=>$this->input->post('nama_user'),
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			'level'=>$this->input->post('level')
		);
		return $this->db->where('kode_user',$this->input->post('kode_user_lama'))->update('data_user',$object);
		
	}
	public function hapus_user($id='')
	{
		return $this->db->where('kode_user',$id)->delete('data_user');
	}

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */