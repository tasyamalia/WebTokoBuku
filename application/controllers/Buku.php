<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_buku','buku');
	}
	public function index()
	{
		$data['tampil_buku']=$this->buku->tampil_buku();
		$data['kategori']=$this->buku->data_kategori();
		$data['konten']="v_buku";
		$this->load->view('template', $data);
	}
	public function tambah()
	{
		$this->form_validation->set_rules('kode_buku', 'kode_buku', 'trim|required');
		$this->form_validation->set_rules('judul_buku', 'judul_buku', 'trim|required');
		$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('penerbit', 'penerbit', 'trim|required');
		$this->form_validation->set_rules('penulis', 'penulis', 'trim|required');
		$this->form_validation->set_rules('stok', 'stok', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			if($_FILES['foto_cover']['name']!=""){
				$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto_cover')){
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
			}
			else{
				if($this->buku->simpan_buku($this->upload->data('file_name'))){
					$this->session->set_flashdata('pesan', 'Sukses menambah');
				}else{
					$this->session->set_flashdata('pesan', 'Gagal Menambah');
				}
				redirect('buku','refresh');
				
			}
		} else {
			if($this->buku->simpan_buku('')){
				$this->session->set_flashdata('pesan', 'Suskes Menambah');
			}else{
				$this->session->set_flashdata('pesan', 'Gagal Menambah');
			}
			redirect('buku','refresh');
		}

	}else{
		$this->session->set_flashdata('pesan', validation_errors());
		redirect('buku','refresh');
	}
	}
	public function edit_buku($id)
	{
		$data=$this->buku->detail($id);
		echo json_encode($data);
	}
	public function buku_update()
	{
		if($this->input->post('simpan')){
			if($_FILES['foto_cover']['name']==""){
				if($this->buku->buku_update_no_foto()){
					$this->session->set_flashdata('pesan', 'Suskes Update');
					redirect('buku');
				}else{
					$config['upload_path'] = './assets/img/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']  = '100';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('foto_cover')){
						$this->session->set_flashdata('pesan', 'Gagal Upload');
						redirect('buku');
					}
					else{
						if($this->buku->buku_update_dengan_foto($this->upload->data('file_name'))){
								$this->session->set_flashdata('pesan', 'Suskes Update');
								redirect('buku');
						}else{
							$this->session->set_flashdata('pesan', 'Gagal Update');
							redirect('buku');
						}
					}
				}
		}
	}
}
	public function hapus($kode_buku='')
	{
		if($this->buku->hapus_buku($kode_buku)){
			$this->session->set_flashdata('pesan', 'Suskes Hapus Buku');
			redirect('buku','refresh');
		}else{
			$this->session->set_flashdata('pesan', 'Gagal hapus buku');
			redirect('buku','refresh');
		}
	}
}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */