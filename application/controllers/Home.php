<?php

defined('BASEPATH') OR exit('No direct srcipt access allowed');

/**
* 
*/
class Home extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
	}

	/*public function index(){
	
			$this->load->view('login');
		
	}
		public function do_login(){
		
		if($this->home_model->check_user() == true){
			$data['main_view'] = 'dashboard';
			$this->load->view('template', $data);
				
				}else{
					$this->session->set_flashdata('notif', 'username anda salah!!!');
					redirect('home/index');
				}
	}*/

	public function index(){
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'dashboard';
			$this->load->view('template', $data);
			//$this->output->enable_profiler(TRUE);
		}else{
			$this->load->view('login');
		}
	}
	public function do_login(){
		/*if ($this->input->post('submit')) {
			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');

			if ($this->form_falidation->run() == TRUE) {
				if($this->home_model->check_user() == true){
					redirect('home/index');
				}else{
					$this->session->set_flashdata('notif', 'username  salah');
					redirect('home');
				}
			}else{
				$this->session->flashdata('notif',validation_errors());
			}
		}else{
			redirect('home');
		}*/ 
		if($this->home_model->check_user() == true){
					redirect('home/index');
				}else{
					$this->session->set_flashdata('notif', 'username anda salah!!!');
					redirect('home');
				}
	}



	public function admin(){
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'admin';
			$data['admin'] = $this->home_model->get_admin();
			$this->load->view('template', $data);
			//$this->output->enable_profiler(TRUE);
		}else{
			$this->load->view('home/index');
		}
	}
	/*public function buku(){
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'buku';
			$data['buku'] = $this->home_model->get_buku();
			$data['kategori'] = $this->home_model->select_kategori();
			$this->load->view('template', $data);
			//$this->output->enable_profiler(TRUE);
		}else{
			$this->load->view('home/index');
		}
	}
*/
	public function buku_up(){
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'buku';
	
			$data['kategori'] = $this->home_model->select_kategori();
			$data['buku'] = $this->home_model->select_kat_buku();
			$this->load->view('template', $data);
			//$this->output->enable_profiler(TRUE);
		}else{
			$this->load->view('home/index');
		}
	}


	public function kategori(){
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'kategori';
			$data['kategori'] = $this->home_model->select_kategori();	
			$this->load->view('template', $data);
			//$this->output->enable_profiler(TRUE);
		}else{
			$this->load->view('home/index');
		}
	}
//transaksi
	public function transaksi(){
		if ($this->session->userdata('logged_in')==TRUE) {
			$data['main_view'] = 'transaksi';
			$data['buku'] = $this->home_model->get_buku();
			$data['kategori'] = $this->home_model->select_kategori();
			$data['detil_transaksi'] = $this->home_model->getDetail();
			$data['admin'] = $this->home_model->get_admin_a();
			$data['admin'] = $this->home_model->get_admin ();
			$this->load->view('template', $data);
		}else{
			$this->load->view('home/index');
		}
	}

	public function tran(){
		if ($this->session->userdata('logged_in') ==TRUE) {
			$data['main_view'] = 'tran';
			$data['tran'] = $this->home_model->get_transaksi();
			$this->load->view('template', $data);
		}else{
			$this->load->view('home/index');
		}
	}

	public function tran_buku(){
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'list_buku_tran';
			$data['kategori'] = $this->home_model->select_kategori();
			$data['buku'] = $this->home_model->select_kat_buku();
			$this->load->view('template', $data);
			//$this->output->enable_profiler(TRUE);
		}else{
			$this->load->view('home/index');
		}
	}
	

	

public function logout(){
	$this->session->sess_destroy();
	redirect('home');
}


//admin
	public function get_admin_id($id_admins){
		if ($this->session->userdata('logged_in')==TRUE) {
			$admin = $this->home_model->get_admin_id($id_admins);
			echo json_encode($admin);
		}else{
			redirect('home/admin');
		}
	}

	public function get_buku_id($id_bukus){
		if ($this->session->userdata('logged_in')==TRUE) {
			$buku = $this->home_model->get_buku_id($id_bukus);
			echo json_encode($buku);
		}else{
			redirect('home/index');
		}
	}

	public function get_kategori_id($id_kategoris){
		if ($this->session->userdata('logged_in') == TRUE) {
			$kategori = $this->home_model->get_kategori_id($id_kategoris);
			echo json_encode($kategori);
			# code...
		}else{
			redirect('home/index');
		}
	}

	public function get_tran_id($id)
	{	
		if ($this->session->userdata('logged_in') == TRUE) {
			$tran = $this->home_model->get_tran_id($id);
			echo json_encode($tran);
		}else{
			redirect('home/index');
		}
	}
	

//admin
	public function tambah_admin(){
		if($this->session->userdata('logged_in')==TRUE)	{
				$data = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'level' => $this->input->post('level'),);
				if ($this->home_model->add_admin($data) == TRUE) {
					$this->session->set_flashdata('notif1','Anda Berhasil Insert Buku');
					redirect('home/admin');

				}else{
					$this->session->set_flashdata('notif2', 'insert gagal');
					redirect('home/admin');
				}
			}else{
				redirect('home/index');
			}
		
	}


	public function hapus_admin($id_admins){
		if ($this->session->userdata('logged_in')==TRUE) {
			if ($this->home_model->delete_admin($id_admins )==TRUE) {
				$this->session->set_flashdata('notif1', 'Delete Berhasil');
				redirect('home/admin');
			}else{
				$this->session->set_flashdata('notif2', 'Delete Gagal');
				redirect('home/index');
			}
		}else{
			redirect('home/index');
		}
	}


	public function ubah_admin(){
		if ($this->session->userdata('logged_in')==TRUE) {
			if ($this->home_model->update_admin() ==TRUE) {
				$this->session->set_flashdata('notif1', 'Update Success');
				redirect('home/admin');
			}else{
				$this->session->set_flashdata('notif2', 'Update gagal');
				redirect('home/admin');
			}
		}else{
			redirect('home/index');
		}
	}

//buku
	public function tambah_buku(){
		if ($this->session->userdata('logged_in')==TRUE) {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '50000';
		
			//$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('foto_cover')){
				$this->session->set_flashdata('notif', $this->upload->display_errors());
				redirect('home/buku_up/'.$this->input->post('buku'),'refresh');
			}
			else{
				$data = array(
				//'id_buku' =>   $this->input->post('id_buku'),
				'id_kategori' => $this->input->post('id_kategori'),
				'judul' => $this->input->post('judul'),
				'tahun' => $this->input->post('tahun'),
				'foto_cover' => $this->upload->data('file_name'),
				'harga' => $this->input->post('harga'),
				'penerbit' => $this->input->post('penerbit'),
				'penulis' => $this->input->post('penulis'),
				'stok' => $this->input->post('stok')
			);
			
			
			if ($this->home_model->add_buku($data) == TRUE) {
				$this->session->set_flashdata('notif', 'insert buku berhasil');
				redirect('home/buku_up');
			}else{
				$this->session->set_flashdata('notif', 'insert gagal');
				redirect('home/buku_up');
				}
			}

		}else{
			redirect('home/index');
		}
	}


	public function FunctionName($value='')
	{
		$array = array(
			'key' => 'value'
		);
		
		$this->session->set_userdata( $array );
		if ($this->home_model->addbuku($array) == ture) {
			$this->session->set_flashdata('name', 'value');
			redirect('','refresh');
			# code...
		}else{
			$this->session->set_flashdata('name', 'value');
			redirect('','refresh');
		}
	}
	/*public function tambah_buku(){
		if ($this->session->userdata('logged_in')==TRUE) {
			
			
				$data = array(
				//'id_buku' =>   $this->input->post('id_buku'),
				'id_kategori' => $this->input->post('id_kategori'),
				'judul' => $this->input->post('judul'),
				'tahun' => $this->input->post('tahun'),
				//'foto_cover' => $this->upload->data('file_name'),
				'foto_cover' => $this->input->post('foto_cover'),
				'harga' => $this->input->post('harga'),
				'penerbit' => $this->input->post('penerbit'),
				'penulis' => $this->input->post('penulis'),
				'stok' => $this->input->post('stok')
			);
			
			
			if ($this->home_model->add_buku($data) == TRUE) {
				$this->session->set_flashdata('notif', 'insert buku berhasil');
				redirect('home/buku');
			}else{
				$this->session->set_flashdata('notif', 'insert gagal');
				redirect('home/buku');
				}
			

		}else{
			redirect('home/index');
		}
	}*/

		public function ubah_buku(){
		if ($this->session->userdata('logged_in')==TRUE) {
			if ($this->home_model->update_buku() ==TRUE) {
				$this->session->set_flashdata('notif', 'Update Success');
				redirect('home/buku_up');
			}else{
				$this->session->set_flashdata('notif', 'Update gagal');
				redirect('home/buku_up');
			}
		}else{
			redirect('home/index');
		}
	}

	public function hapus_buku(){
		if ($this->session->userdata('logged_in')==TRUE) {
			if ($this->home_model->delete_buku($id_bukus )==TRUE) {
				$this->session->set_flashdata('notif', 'Delete Berhasil');
				redirect('home/buku_up');
			}else{
				$this->session->set_flashdata('notif', 'Delete Gagal');
				redirect('home/buku_up');
			}
		}else{
			redirect('home/index');
		}
	}

//kategori
public function tambah_kategori(){
	if ($this->session->userdata('logged_in') == TRUE) {
		$data = array(
			'id_kategori' => $this->input->post('id_kategori'),
			'nama_kategori' => $this->input->poSt('nama_kategori')
			 );
		if ($this->home_model->add_kategori($data) == true) {
			$this->session->set_flashdata('notif', 'berhasil');
			redirect('home/kategori');
		}else{
			$this->session->set_flashdata('notif', 'gagal');
			redirect('home/kategori');
		}
			# code...
		}else{
				redirect('home/index');
		}
	}

	public function ubah_kategori(){
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->home_model->update_kategori() == true) {
				$this->session->set_flashdata('notif', 'Berhasil ubah');
				redirect('home/kategori');
			}else{$this->session->set_flashdata('notif', 'gagal');
			redirect('home/kategori');

			}
			# code...
		}else{
			redirect('home/index');
		}
	}

	public function hapus_kategori($id_kategoris){
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->home_model->delete_kategori($id_kategoris) == true) {
				$this->session->set_flashdata('notif', 'Berhasil hapus');
				redirect('home/kategori');

			}else{
				$this->session->set_flashdata('notif', 'Gagal hapus');
				redirect('home/kategori');
			}
		}else{
			redirect('home/index');
		}
	}


//DATA TRANSAKSI

	public function addTransaksi()
	{
		if ($this->session->has_userdata('idTrans')) {
			if ($this->home_model->insertDetailTransaksi()) {
				redirect('home/transaksi');
			}else{
				$this->session->set_flashdata('notif', 'detil gagal');
				redirect('home/transaksi');
			}
		}else{
			if ($this->home_model->insertTransaksi()) {
				if ($this->home_model->insertDetailTransaksi()) {
					redirect('home/transaksi');
				}else{
					$this->session->set_flashdata('notif', 'detil transaksi gagal');
					redirect('home/transaksi');
				}
			}else{
				$this->session->set_flashdata('notif', 'transaksi gagal');
				redirect('home/transaksi');
			}
		}
	}

	public function beli()
	{
		if ($this->home_model->beli()) {
			redirect('home/transaksi');
		}else{
			$this->session->set_flashdata('notif', 'Beli gagal');
			redirect('home/transaksi');
		}
	}

	public function hapusDetil($id){
		if ($this->home_model->hapusDetil($id)) {
			redirect('home/transaksi');
		}else{
			$this->session->set_flashdata('notif', 'hapus detil gagal');
			redirect('home/transaksi');
		}
	}


public function cancelBeli()
{
	if ($this->home_model->hapusTransaksi()) {
		redirect('home/transaksi');
	}else{
		$this->session->set_flashdata('notif', 'cancel gagal');
		redirect('home/transaksi');
	}
}

public function deltran($id)
{
	if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->home_model->deltran($id) == true) {
				$this->session->set_flashdata('notif', 'Berhasil hapus');
				redirect('home/tran');

			}else{
				$this->session->set_flashdata('notif', 'Gagal hapus');
				redirect('home/tran');
			}
		}else{
			redirect('home/index');
		}
}
	

}





?>