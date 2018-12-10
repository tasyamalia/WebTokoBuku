<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kategori','kat');
	}
	public function index()
	{
		$data['tampil_kategori']=$this->kat->tampil_kat();
		$data['konten']="v_kategori";
		$this->load->view('template', $data);
	}
	public function tambah()
	{
		if($this->input->post('simpan')){
			if($this->kat->simpan_kat()){
				$this->session->set_flashdata('pesam', 'menambah kategori');
				redirect('kategori','refresh');
			}else{
				$this->session->set_flashdata('pesan', 'gagal menambah kategori');
				redirect('kategori','refresh');
			}
		}
	}
	public function edit_kategori($id)
	{
		$data=$this->kat->detail($id);
		echo json_encode($data);
	}
	public function kategori_update()
	{
		if($this->input->post('edit')){
			if($this->kat->edit_kat()){
				$this->session->set_flashdata('pesan', 'Sukses Hapus Kategori');
				redirect('kategori','refresh');
			}else{
				$this->session->set_flashdata('pesan', 'Gagal hapus Kategori');
				redirect('kategori','refresh');
			}
		}
	}
	public function hapus($id='')
	{
		if($this->kat->hapus_kat($id)){
			$this->session->set_flashdata('pesan', 'Sukses hapus kategori');
			redirect('kategori','refresh');
		}else{
			$this->session->set_flashdata('pesan', 'Gagal hapus kategori');
			redirect('kategori','refresh');
		}
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */