<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Man_key extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('man_key_mod');
	}

	public function index() {
		$data['title'] = 'Kunci ODC';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

		$data['keyTampil'] = $this->man_key_mod->tampil();

		if ($this->input->post('keyword')) {
			$data['keyTampil'] = $this->man_key_mod->cariAlamatODC();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('man_key/index',$data);
		$this->load->view('templates/footer');
	}

	public function tambah() {
		$data['title'] = 'Kunci ODC';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

		$this->form_validation->set_rules('kodeODC', 'Kode ODC', 'required');
		$this->form_validation->set_rules('kunciODC', 'Kunci ODC', 'required|numeric|min_length[4]|max_length[4]',[
					'min_length' => 'Kunci ODC harus 4 digit!',
					'max_length' => 'Kunci ODC harus 4 digit!'
			]);
		$this->form_validation->set_rules('tempatSTO', 'Tempat STO', 'required');
		$this->form_validation->set_rules('alamatODC', 'Alamat ODC', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('man_key/tambah',$data);
			$this->load->view('templates/footer');
		} else {
			$this->man_key_mod->tambahKunci();
			$this->session->set_flashdata('flash', 'Kunci Berhasil Ditambahkan');
			redirect('Man_key');
		}
	}

	public function hapus($id) {
		$this->man_key_mod->hapus($id);
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('man_key');
	}


	public function ubah($id) {
		$data['title'] = 'Kunci ODC';
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$data['kunci'] = $this->man_key_mod->getKeyById($id);

		$this->form_validation->set_rules('kodeODC', 'Kode ODC', 'required');
		$this->form_validation->set_rules('kunciODC', 'Kunci ODC', 'required|numeric|min_length[4]|max_length[4]',[
					'min_length' => 'Kunci ODC harus 4 digit!',
					'max_length' => 'Kunci ODC harus 4 digit!'
			]);
		$this->form_validation->set_rules('tempatSTO', 'Tempat STO', 'required');
		$this->form_validation->set_rules('alamatODC', 'Alamat ODC', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('man_key/ubah',$data);
			$this->load->view('templates/footer');
		} else {
			$this->man_key_mod->ubahKunci();
			$this->session->set_flashdata('flash', 'Kunci Berhasil Diubah');
			redirect('Man_key');
		}
	}

}