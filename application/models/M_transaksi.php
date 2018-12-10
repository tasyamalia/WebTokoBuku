<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function tm_transaksi()
	{
		return $this->db->get('data_user')->result();
	}
	public function cek($id)
	{
		$cek_stok=$this->db->where('kode_buku',$id)->get('data_buku')->row()->stok;
		if($cek_stok <= 0){
			return 0;
		}else{
			return 1;
		}
	}
	public function check()
	{
		$cek=1;
		for($i=0;$i<count($this->input->post('rowid'));$i++){
			$stok=$this->db->where('kode_buku',$this->input->post('kode_buku')[$i])->get('data_buku')->row()->stok;
			$qty=$this->input->post('qty')[$i];
			$sisa=$stok - $qty;
			if($sisa <0){
				$oke =0;
			}else{
				$oke=1;
			}
			$cek= $oke * $cek;
		}
			return $cek;
		}
	public function simpan_cart_db()
	{
		for($i=0;$i<count($this->input->post('rowid'));$i++){
			$stok=$this->db->where('kode_buku',$this->input->post('kode_buku')[$i])->get('data_buku')->row()->stok;
			$qty=$this->input->post('qty')[$i];
			$sisa=$stok - $qty;
		$updatestok = array('stok'=>$sisa);
		$this->db->where('kode_buku',$this->input->post('kode_buku')[$i])->update('data_buku',$updatestok);
		}
		$object=array(
			'total'=>$this->input->post('total'),
			'nama_pembeli'=>$this->input->post('nama_pembeli'),
			'tanggal_beli'=>date('Y-m-d'),
			'bayar'=>$this->input->post('bayari'),
			'kode_user'=>$this->session->userdata('kode_user')
		);

		$this->db->insert('transaksi',$object);
		$tm_nota=$this->db->order_by('kode_transaksi','desc')
						->where('kode_user',$this->session->userdata('kode_user'))
						->limit(1)
						->get('transaksi')
						->row();

		for($i=0;$i<count($this->input->post('rowid'));$i++){
			$hasil[]=array(
				'kode_transaksi'=>$tm_nota->kode_transaksi,
				'kode_buku'=>$this->input->post('kode_buku')[$i],
				'jumlah'=>$this->input->post('qty')[$i]
			);
		}
		$proses=$this->db->insert_batch('detil_transaksi',$hasil);
		if($proses){
			return $tm_nota->kode_transaksi;
		}else{
			return 0;
		}
	}
	public function detail_nota($id_nota)
	{
		return $this->db->where('kode_transaksi',$id_nota)
						->join('data_user','data_user.kode_user=transaksi.kode_user')
						->get('transaksi')->row();
	}
	public function detail_transaksi($id_nota)
	{
		return $this->db->where('kode_transaksi',$id_nota)
					->join('data_buku','data_buku.kode_buku=detil_transaksi.kode_buku')
					->join('kategori_buku','kategori_buku.kode_kategori=data_buku.kode_kategori')
					->get('detil_transaksi')->result();
	}


}

/* End of file M_transaksi.php */
/* Location: ./application/models/M_transaksi.php */