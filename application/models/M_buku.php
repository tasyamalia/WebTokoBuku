<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model {

	public function tampil_buku()
	{
		$tm_buku=$this->db->join('kategori_buku','kategori_buku.kode_kategori=data_buku.kode_kategori')->get('data_buku')->result();
		return $tm_buku;
	}
	public function data_kategori()
	{
		return $this->db->get('kategori_buku')->result();
	}
	public function simpan_buku($nama_file)
	{
		if($nama_file==""){
			$object=array(
				'kode_buku'=>$this->input->post('kode_buku'),
				'judul_buku'=>$this->input->post('judul_buku'),
				'tahun'=>$this->input->post('tahun'),
				'kode_kategori'=>$this->input->post('kategori'),
				'harga'=>$this->input->post('harga'),
				'penerbit'=>$this->input->post('penerbit'),
				'penulis'=>$this->input->post('penulis'),
				'stok'=>$this->input->post('stok'),
				'diskon'=>$this->input->post('diskon'),
			);
		}else{
			$object=array(
				'kode_buku'=>$this->input->post('kode_buku'),
				'judul_buku'=>$this->input->post('judul_buku'),
				'tahun'=>$this->input->post('tahun'),
				'kode_kategori'=>$this->input->post('kategori'),
				'harga'=>$this->input->post('harga'),
				'penerbit'=>$this->input->post('penerbit'),
				'penulis'=>$this->input->post('penulis'),
				'stok'=>$this->input->post('stok'),
				'diskon'=>$this->input->post('diskon'),
				'foto_cover'=>$nama_file
			);
		}
		return $this->db->insert('data_buku',$object);
	}
	public function detail($a)
	{
		$tm_buku=$this->db->join('kategori_buku','kategori_buku.kode_kategori=data_buku.kode_kategori')->where('kode_buku',$a)->get('data_buku')->row();
		return $tm_buku;
	}
	public function buku_update_no_foto()
	{
		$object=array(
				'kode_buku'=>$this->input->post('kode_buku'),
				'judul_buku'=>$this->input->post('judul_buku'),
				'tahun'=>$this->input->post('tahun'),
				'kode_kategori'=>$this->input->post('kategori'),
				'harga'=>$this->input->post('harga'),
				'penerbit'=>$this->input->post('penerbit'),
				'penulis'=>$this->input->post('penulis'),
				'stok'=>$this->input->post('stok'),
				'diskon'=>$this->input->post('diskon'),
		);
		return $this->db->where('kode_buku',$this->input->post('kode_buku'))->update('data_buku',$object);
	}
	public function buku_update_dengan_foto($nama_foto='')
	{
			$object=array(
				'kode_buku'=>$this->input->post('kode_buku'),
				'judul_buku'=>$this->input->post('judul_buku'),
				'tahun'=>$this->input->post('tahun'),
				'kode_kategori'=>$this->input->post('kategori'),
				'harga'=>$this->input->post('harga'),
				'penerbit'=>$this->input->post('penerbit'),
				'penulis'=>$this->input->post('penulis'),
				'stok'=>$this->input->post('stok'),
				'diskon'=>$this->input->post('diskon'),
				'foto_cover'=>$nama_foto
			);
		return $this->db->where('kode_buku',$this->input->post('kode_buku'))->update('data_buku',$object);
	}
	public function hapus_buku($kode_buku='')
	{
		return $this->db->where('kode_buku',$kode_buku)->delete('data_buku');
	}

}

/* End of file M_buku.php */
/* Location: ./application/models/M_buku.php */