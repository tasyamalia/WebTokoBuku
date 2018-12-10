<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{		
		$data['konten']='home';
		$this->load->view('template', $data);
	}

	public function login()
	{

		$this->load->view('login');
		
	}
	public function proses_login()
	{
		if($this->input->post('login')){
			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');
			if($this->form_validation->run() == TRUE) {
				$this->load->model('m_admin');
				if($this->m_admin->get_login()->num_rows()>0){
					$data=$this->m_admin->get_login()->row();
					$array= array(
						'login'=> TRUE,
						'kode_user'=>$data->kode_user,
						'username'=>$data->username,
						'password'=>$data->password,
						'level'=>$data->level
					);
					$this->session->set_userdata( $array );
					redirect('admin','refresh');
				}else{
					$this->session->set_flashdata('pesan', 'salah username dan password');
					redirect('admin/login','refresh');
				}
			} else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('admin/login','refresh');
			}
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login','refresh');
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */