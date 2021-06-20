<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Home_model extends CI_Model{

//session data sementara
	public function check_user(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');	

		
		$query = $this->db->where('username', $username)
						->where('password', $password)
						->get('admin');

		if ($query->num_rows() > 0) {

			$data_login = $query->row();

			$data = array(
				'id_admin' => $data_login->id_admin,
				'nama' => $data_login->nama,
			    'username' => $data_login->username,
			    'level' => $data_login->level,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($data);

			return TRUE;
		}else {
			return FALSE;
		}
	}



//ambil database	
	public function get_admin()
	{
		return $this->db->get('admin')
						->result();
	}

	public function get_admin_a(){
		return $this->db->join('admin', 'admin.id_admin = transaksi.id_admin')
					->get('transaksi')
					->result();
	}

	public function get_buku(){
		return $this->db->get('buku')
						->result();
	}

	public function select_kategori(){
		return $this->db->get('kategori_buku')
						->result();
	}

	public function select_kat_buku(){
		return $this->db->join('kategori_buku', 'kategori_buku.id_kategori = buku.id_kategori')
				 ->get('buku')
				 ->result();
	}

	public function get_transaksi(){
		return $this->db->get('transaksi')
						->result();
	}
	/*public function select_buku(){
		return $this->db->join('transaksi', 'transaksi.id_buku = buku.id_buku')
					->get('transaksi')
					->result();
	}*/

//id get
	public function get_admin_id($id_admins){
		return $this->db->where('id_admin', $id_admins)
						->get('admin')
						->row();
	}
	public function get_buku_id($bukus){
		return $this->db->where('id_buku', $bukus)
						->get('buku')
						->row();
	}
	public function get_kategori_id($id_kategoris){
		return $this->db->where('id_kategori', $id_kategoris)
						->get('kategori_buku')
						->row();

	}
	public function get_tran_id($id){
		return $this->db->where('id_transaksi', $id)
					->get('id_transaksi')
					->row();
	}

//about admin

	public function add_admin($data){
		$this->db->insert('admin', $data);
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete_admin($id_admins){
		$this->db->where('id_admin', $id_admins)
				 ->delete('admin');
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function update_admin($admins){
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password'=>$this->input->post('password'),
			'level'=>$this->input->post('level')
			 );
		$this->db->where('id_admin', $this->input->post('id_admin'))
				 ->update('admin',$data);
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

//about buku

	public function add_buku($data){
		$this->db->insert('buku', $data);
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function update_buku(){
		$data = array(
			'id_kategori' => $this->input->post('id_kategori') ,
			'judul'=>$this->input->post('judul'),
			'tahun'=>$this->input->post('tahun'),
			
			'harga'=>$this->input->post('harga'),
			'penerbit'=>$this->input->post('penerbit'),
			'penulis'=>$this->input->post('penulis'),
			'stok'=>$this->input->post('stok')
			/*'foto_cover'=>$this->input->post('foto_cover')*/);
		$this->db->where('id_buku', $this->input->post('id_buku'))
				 ->update('buku',$data);
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
	


	public function delete_buku(){
		$this->db->where('id_buku', $this->input->post('hapus_id_buku'))
				 ->delete('buku');
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

//data kategori
	public function add_kategori($data){
		$this->db->insert('kategori_buku', $data);
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function update_kategori(){
		$data = array(
			'id_kategori' => $this->input->post('id_kategori') ,
			'nama_kategori' => $this->input->post('nama_kategori') );
			 $this->db->where('id_kategori', $this->input->post('id_kategori'))
					  ->update('kategori_buku', $data);
					  if ($this->db->affected_rows()>0) {
					  	return TRUE;
					  	
					  }else{
					  	return FALSE;
					  }
				
			}


			public function delete_kategori($id_kategoris){
				$this->db->where('id_kategori', $id_kategoris)
						 ->delete('kategori_buku');
				if ($this->db->affected_rows() > 0) {
					return TRUE;
				}else{
					return FALSE;
				}
			}
//DATA TRANSAKSI

			public function insertTransaksi()
			{
				$data = array(
					'id_admin' => $this->input->post('id_admin'),
					'nama_pembeli' => $this->input->post('nama_pembeli'),
					'total' => 0,
					'tanggal_beli' => date('Y-m-d H.i.s')
				 );
				$this->db->insert('transaksi', $data);

				if ($this->db->affected_rows()>0) {
					$array = array(
						'idTrans' => $this->db->insert_id(),
						'namaPembeli' => $data['nama_pembeli'],
						//'kasir' => $data['id_kasir']
					);
					
					$this->session->set_userdata( $array );
					return TRUE;
				}else{
					return FALSE;
				}
			}

			public function insertDetailTransaksi()
			{
				$harga = $this->db->where('id_buku',$this->input->post('id_buku'))
							  ->get('buku')
							  ->row()
							  ->harga;
				;
				$datadetail = array(
					'id_transaksi' => $this->session->userdata('idTrans'),
					'id_buku' => $this->input->post('id_buku'),
					'jumlah' => $this->input->post('jumlah')*$harga );
				$this->db->insert('detil_transaksi', $datadetail);
				if ($this->db->affected_rows()>0) {
					return TRUE;
				}else{
					return FALSE;
				}
			}

			public function getDetail()
			{
				return $this->db->join('
					buku', 'buku.id_buku = detil_transaksi.id_buku')
							->where('detil_transaksi.id_transaksi', $this->session->userdata('idTrans'))
							->get('detil_transaksi')
							->result();
			}

			public function beli(){
				$total = $this->db->select_sum('jumlah')
							  ->from('detil_transaksi')
							  ->where('id_transaksi', $this->session->userdata('idTrans'))
							  ->get()
							  ->row()
							  ->jumlah;
				$data = array(
					'total' => $total, 
				);
				$this->db->where('id_transaksi',$this->session->userdata('idTrans'))
					 ->update('transaksi', $data);
			if ($this->db->affected_rows()>0) {
				$detail = $this->db->where('id_transaksi',$this->session->userdata('idTrans'))
							   ->get('detil_transaksi')
							   ->result();
			$updateStockBerhasil = false;
			foreach ($detail as $detail) {
				$hargaBuku = $this->db->where('id_buku', $detail->id_buku)
								  ->get('buku')
								  ->row()
								  ->harga;
				$stok = $this->db->where('id_buku', $detail->id_buku)
							 ->get('buku')
							 ->row()
							 ->stok;
				$updateStok = array(
					'stok' => $stok - ($detail->jumlah/$hargaBuku) );
				$this->db->where('id_buku', $detail->id_buku)
						 ->update('buku', $updateStok);
				if ($this->db->affected_rows()>0) {
					$updateStockBerhasil = TRUE;
				}else{
					$updateStockBerhasil = false;
				}
			}
			if ($updateStockBerhasil) {
				$this->session->unset_userdata('idTrans');
				$this->session->unset_userdata('namaPembeli');
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}

	public function hapusDetil($id)
	{
		$this->db->where('id_detil', $id)
				 ->delete('detil_transaksi');
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return false;
		}
	}


	public function hapusTransaksi()
	{
		$this->db->where('id_transaksi',$this->session->userdata('idTrans'))
				 ->delete('transaksi');
		if ($this->db->affected_rows()>0) {
			$this->session->unset_userdata('idTrans');
			$this->session->unset_userdata('namaPembeli');
			return TRUE;
		}else{
			return false;
		}
	}

	public function deltran($id)
	{
		$this->db->where('id_transaksi', $id)
				 ->delete('transaksi');
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}



?>